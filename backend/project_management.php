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
        echo "create-project-failure";
        return;
    }

    $last_id = last_insert_id();

    //TODO: get the created project number from the above sql somehow
    $time = time();
    $project_name = 'New Project '.$time;
    $project_url = project_name_to_url_name($project_name);

    $sql2 = "INSERT INTO project_info (project, name, url_name, spec_link, img_link, created, modified)";
    $sql2 .= "VALUES ($last_id, '$project_name', '$project_url', null, null, $time, $time)";
    $result2 = query($sql2);



    if(!$result2){
        //TODO: if the project_info insert fails, delete  the project_head entry
        echo "create-project-failure";
        return;
    }


    echo "create-project-success";

}

function delete_project($project_id, $owner_id){
    if(!valid_login($owner_id)){
        return;
    }

}
function changeName_project($project_id, $owner_id, $new_name){
    if(!valid_login($owner_id)){
        return;
    }

}
function changeImage_project($project_id, $owner_id, $new_image){
    if(!valid_login($owner_id)){
        return;
    }

}
function changeSpec_project($project_id, $owner_id, $new_spec){
    if(!valid_login($owner_id)){
        return;
    }

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
?>
