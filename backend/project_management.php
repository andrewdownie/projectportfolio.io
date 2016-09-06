<?php
function create_project(){
    $creator_account = current_account();
    if($creator_account == -1){
        return;
    }


    $sql = "INSERT INTO project_head (project, owner)";
    $sql .= "VALUES (null, $creator_account);";
    $result = query($sql);
    //TODO: verify the above sql worked
    if(!$result){
        echo '{"result": "create-project-success"}';
        return;
    }

    $last_id = last_insert_id();

    //TODO: get the created project number from the above sql somehow
    $time = time();
    $project_name = 'New Project '.$time;
    $project_url = name_to_url_name($project_name);
    $default_spec = "docs.google.com/project-spec-here";
    $default_imglink = "https://picjumbo.imgix.net/HNCK0852.jpg";

    $sql2 = "INSERT INTO project_info (project, name, url_name, spec_link, img_link, created, modified)";
    $sql2 .= "VALUES ($last_id, '$project_name', '$project_url', '$default_spec', '$default_imglink', $time, $time)";
    $result2 = query($sql2);



    if(!$result2){
        //TODO: if the project_info insert fails, delete  the project_head entry
        echo '{"result": "create-project-success"}';
        return;
    }


    echo '{"result": "create-project-success", "project_url_name": "'.$project_url.'"}';

}

function delete_project($project_url_name){
    $deletor_account = current_account();
    if($deletor_account == -1){
        return;
    }

    $sql = "SELECT project FROM project_info WHERE url_name='$project_url_name';";
    $result = query($sql);

    if($result == false || mysqli_num_rows($result) < 1){
        echo 'delete-project-failure';
        return;
    }

    $row = mysqli_fetch_assoc($result);
    $project_id = $row['project'];

    $sql2 = "SELECT owner FROM project_head WHERE project=$project_id;";
    $result2 = query($sql2);

    if($result == false || mysqli_num_rows($result2) != 1){
        echo 'delete-project-failure';
        return;
    }

    $row = mysqli_fetch_assoc($result2);
    $owner = $row['owner'];

    if($owner != $deletor_account){
        echo 'delete-project-failure';
        return;
    }

    $sql3 = "DELETE FROM project_info WHERE project=$project_id;";
    $result3 = query($sql3);

    if($result3 == false){
        echo 'delete-project-failure';
        return;
    }

    $sql4 = "DELETE FROM project_head WHERE project=$project_id;";
    $result4 = query($sql4);

    if($result4 != false){
        echo 'delete-project-success';
        return;
    }

    echo 'delete-project-failure';
}

function save_project_name($project_id, $new_value){
    $deletor_account = current_account();
    if($deletor_account == -1){
        echo '{"result": "save-project-failure"}';
        return;
    }

    //TODO: make sure the project name validation works -----------------------------<<
    if(!valid_item_name($new_value)){
        echo '{"result": "invalid-item-name"}';
        return;
    }

    $name = $new_value;
    $url_name = name_to_url_name($name);

    $sql = "UPDATE project_info SET name='$name', url_name='$url_name' WHERE project=$project_id;";
    $result = query($sql);

    if(!$result){
        echo '{"result": "save-project-failure"}';
        return;
    }
    echo '{"result": "save-project-success", "url_name": "'.$url_name.'"}';

}
function save_project_image($project_id, $new_value){
    $deletor_account = current_account();
    if($deletor_account == -1){
        echo '{"result": "save-project-failure"}';
        return;
    }

    $sql = "UPDATE project_info SET img_link='$new_value' WHERE project=$project_id;";
    $result = query($sql);

    if(!$result){
        echo '{"result": "save-project-failure"}';
        return;
    }
    echo '{"result": "save-project-success", "url_name": ""}';

}
function save_project_spec($project_id, $new_value){
    $deletor_account = current_account();
    if($deletor_account == -1){
        echo '{"result": "save-project-failure"}';
        return;
    }

    $sql = "UPDATE project_info SET spec_link='$new_value' WHERE project=$project_id;";
    $result = query($sql);

    if(!$result){
        echo '{"result": "save-project-failure"}';
        return;
    }
    echo '{"result": "save-project-success", "url_name": ""}';

}

function load_projects($username, $amount, $start){
    $sql = "SELECT account FROM account_credentials WHERE username='$username';";
    $result = query($sql);

    if(mysqli_num_rows($result) != 1){
        //TODO: log error
        echo "load-projects-failure";
    }

    $row = mysqli_fetch_assoc($result);
    $account_num = $row["account"];

    $sql2 = "SELECT name, url_name, img_link, created";
    $sql2 .= " FROM project_info";
    $sql2 .= " INNER JOIN project_head";
    $sql2 .= " ON project_info.project=project_head.project";
    $sql2 .= " WHERE project_head.owner=$account_num;";

    $result2 = query($sql2);

    if($result2 == false || mysqli_num_rows($result2) <= 0){
        echo "no-projects";
        return;
    }

    print_r(sql_to_json($result2));
}//echo "load-projects-failure";

//Loads info about the given project owned by the given user.
//This info is loaded from the tables project_head and project_info.
function load_project($username, $project_url_name){
    $account = account_id_from_username($username);

    $sql = "SELECT project_head.project, name, spec_link, img_link, created, modified";
    $sql .= " FROM project_info";
    $sql .= " INNER JOIN project_head";
    $sql .= " ON project_head.project = project_info.project";
    $sql .= " WHERE project_head.owner=$account";
    $sql .= " AND project_info.url_name='$project_url_name'";

    $result = query($sql);

    if($result == false || mysqli_num_rows($result) <= 0){
        echo "project-not-found";
        return;
    }

    print_r(sql_to_json($result));
}

//Returns json containing how many: blogs, builds, goals, and team members a
//project has.
function load_project_counts($project_id){
    //$countMembers = "SELECT COUNT(*) FROM project_blogs;";
    //$resultMembers = query($countMembers);

    //$countGoals = "SELECT COUNT(*) FROM project_goals;";
    //$resultGoals = query($countGoals);

    //$countBuilds = "SELECT COUNT(*) FROM project_builds;";
    //$resultBuilds = query($countBuilds);

    $countBlogs = "SELECT COUNT(*) AS blog_count FROM blog_head where project = $project_id;";
    $resultBlogs = query($countBlogs);
   
    if($resultBlogs == false || mysqli_num_rows($resultBlogs) != 1){
        echo '{"result": "error-counting-blogs"}';
        return;
    }

    $row = mysqli_fetch_assoc($resultBlogs);
    $blogCount = $row['blog_count'];

    //TODO: how do I get values out of the above queries?
    //      will the count be put into a column called count?

    echo '{"build_count": "0", "goal_count": 0, "member_count": 0, "blog_count": '.$blogCount.'}';
}


?>
