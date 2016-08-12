<?php

function save_blog($projectUrlName, $blogUrlName){
    //1. get the project number for the blog the user is currently editing
    //2. once that is had... update the blog contents, 
    //3. then update the blog title, the blog desciption, the blog image, and the blog modified date
    
    $currentUser = current_account();


    // 1 ----- Get the project number for the blog the user is currently editing
    $selectProjectNum =  "SELECT project_head.project FROM project_head INNER JOIN project_info ON project_head.project = project_info.project"; 
    $selectProjectNum .= " WHERE project_head.owner = $currentUser AND project_info.url_name = '$projectUrlName'";

    $resultProjectNum = query($selectProjectNum);

    if($resultProjectNum == false || mysqli_num_rows($resultProjectNum) != 1){
        print_r($resultProjectNum);
        echo "{'result': 'error-saving-blog'}";
        return;

    }

    $row = mysqli_fetch_assoc($resultProjectNum);

    $projectNum = $row['project'];


    // 2 ----- Get the blog number the user is currently editing
    $selectBlogNum = "SELECT blog FROM blog_head WHERE project=$projectNum AND url_name='$blogUrlName';";
    $resultBlogNum = query($selectBlogNum);


    if($resultBlogNum == false || mysqli_num_rows($resultBlogNum) != 1){
        echo "{'result': 'error-saving-blog'}";
        return;
    }

    $row = mysqli_fetch_assoc($resultBlogNum);
    $blogNum = $row['blog'];


    echo "blog num is: " . $blogNum;







}

?>
