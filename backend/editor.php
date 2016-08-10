<?php

function save_blog($projectUrlName, $blogUrlName){
    //1. get the blog that matches the user and project url name
    //2. once that is had... update the blog contents, 
    //3. then update the blog title, the blog desciption, the blog image, and the blog modified date
    
   // echo "You sent " . $projectUrlName . " and " . $blogUrlName . " to SaveBlog";
    $currentUser = current_account();

    //1----
    // get the blog number for the project with the blogUrlName, and the current user as the owner
    $selectProjectNum = "SELECT * FROM project_head WHERE owner=$currentUser, url_name=$projectUrlName";
    $resultProjectNum = query($selectBlogNum);
    echo $resultProjectNum;

    if(mysqli_num_rows($resultProjectNum != 1){
        echo "{'result': 'error-saving-blog-1'}";
        return;
    }

    $projectHeadRow = mysqli_fetch_assoc($resultProjectNum);
    $projectNum = $projectHeadRow['project'];

    $selectBlogNum = "SELECT * FROM blog_head WHERE project=$projectNum, url_name=$blogUrlName";
    $resultBlogNum = query($resultBlogNum);

    //if this number isnt null, then we found the blog the user is currently editing

    //2----
    // user the blog number from above to update stuff

}

?>
