<?php
function create_project($owner_id){
    if(!valid_login($owner_id)){
        return;
    }

    $sql = "INSERT INTO project_head ()";
    $sql .= "VALUES ();";
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
//once the above five functions are working, I can start to make the sitepoint
//pull projects from the database dynamically
?>
