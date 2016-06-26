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
    $sql2 = "INSERT INTO project_info (project, name, spec_link, img_link, created, modified)";
    $sql2 .= "VALUES ($last_id, 'New Project $time', null, null, $time, $time)";
    $result2 = query($sql2);

    if(!$result2){
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


function load_projects($amount, $start){
    $username = $_COOKIE['LOGGED_IN'];
    $sql = "SELECT * FROM ";
    //TODO: do a join on project_head and project_info where username is owner of the projects

    echo $username;
}
?>
