<?php
//MAIN FUNCTIONS ==============================================================




/* SAVE BLOG =================================|Downie     |2016-08-12|2016-08-14
______________________________________________|AUTHOR     |CREATED   |MODIFIED
Description: using the project url name, the blog url name, and the currently signed in users ID,
             this funciton will find the blog being edited and update this blog using the: 
             new blog name, imgage link, first snippet and blog contents provided
*/
function save_blog($projectUrlName, $curBlogUrlName, $newBlogName, $imgLink, $firstSnippet, $blogContents){
    //TODO: escape all other variables

    $eBlogContents = str_replace("\"", "'", $blogContents);
    $eBlogContents = escape($eBlogContents);
    //TODO: makes sure the escape function is doing what it is supposed to do... the \ are not showing up in the db
    
    

    $currentUser = current_account();
    if($currentUser < 0){
        echo '{"result": "user-not-signed-in"}';
        return;
    }


    // 1 - Get the blog num of the blog to save
    $blogNum = _getBlogNumFromNothing($projectUrlName, $curBlogUrlName, $currentUser);

    if($blogNum == false){
        return;
    }



    // 2 - Update the tables related to the blog the user is editing
    $updateBlogResult = _updateBlogInfo($blogNum, $imgLink, $firstSnippet);

    if($updateBlogResult == false){
        //probably also need to do database cleanup
        return;
    }

   
    
    $newUrlName = name_to_url_name(trim($newBlogName));
    _updateBlogHead($blogNum, $newBlogName, $newUrlName);
    //TODO: error handling
    

    _updateBlogContents($blogNum, $eBlogContents);
    //TODO: error handling



    echo '{"result": "blog-save-success", "new_url_name": "' . $newUrlName . '"}';
    
}



/* LOAD BLOG =================================|Downie     |2016-08-14|2016-08-14
______________________________________________|AUTHOR     |CREATED   |MODIFIED
Description: using the project url name, the blog url name, and the currently signed in users ID,
             this funciton will find the blog being edited and load its contents to the page 
*/
function load_blog($projectUrlName, $blogUrlName){

    $currentUser = current_account();
    if($currentUser < 0){
        echo '{"result": "user-not-signed-in"}';
        return;
    }

    $blogNum = _getBlogNumFromNothing($projectUrlName, $blogUrlName, $currentUser);

    if($blogNum == false){
        return;
    }
    
    $selectContents = "SELECT contents FROM blog_contents WHERE blog=$blogNum;";
    $contentsResult = query($selectContents);
    
    if($contentsResult == false || mysqli_num_rows($contentsResult) != 1){
       echo '{"result": "blog-load-success", "blog_load_status": "content-not-found"}'; 
       return;
    }

    $row = mysqli_fetch_assoc($contentsResult);
    $content = $row['contents'];
    echo '{"result": "blog-load-success", "blog_load_status": "content-found", "blog_content": "'.$content.'"}'; 

    //TODO:
    //load the blog contents

}


//HELPER FUNCTIONS ============================================================


/* GET BLOG NUM FROM NOTHING =================|Downie     |2016-08-14|2016-08-14
______________________________________________|AUTHOR     |CREATED   |MODIFIED
Description: gets the unique blog identifier (aka project number) for a project that has the given
             projectUrlName, the given blogUrlName and is owned by the given user
             (by from nothing meaning get blog num from absolute minimum amount required)
Returns: the blog number if successful, false in all other cases
*/
function _getBlogNumFromNothing($projectUrlName, $blogUrlName, $currentUser){
    //NOTE: error messages are put to buffer via the functions called

    // 1 - get the project number for the blog the user is currently editing
    $projectNum = _getProjectNum($projectUrlName, $currentUser);

    if($projectNum == false){ return false; }


    // 2 - Get the blog number the user is currently editing
    $blogNum = _getBlogNum($blogUrlName, $projectNum);

    if($blogNum == false){ return false; }

   return $blogNum;

}


/* GET PROJECT NUM ===========================|Downie     |2016-08-12|2016-08-12
______________________________________________|AUTHOR     |CREATED   |MODIFIED
Description: gets the unique project identifier (aka project number) for a project that has the given
             projectUrlName, and is owned by the given user
Returns: the project number if successful, false in all other cases
*/
function _getProjectNum($projecturlname, $currentuser){

    $selectprojectnum =  "select project_head.project from project_head inner join project_info on project_head.project = project_info.project"; 
    $selectprojectnum .= " where project_head.owner = $currentuser and project_info.url_name = '$projecturlname'";

    $resultprojectnum = query($selectprojectnum);

    if($resultprojectnum == false || mysqli_num_rows($resultprojectnum) != 1){
        echo '{"result": "error-get-project-num"}';
        return false;
    }

    $row = mysqli_fetch_assoc($resultprojectnum);

    return $row['project'];

}


/* GET BLOG NUM ==============================|Downie     |2016-08-12|2016-08-12
______________________________________________|AUTHOR     |CREATED   |MODIFIED
Description: gets the unique blog identifier (aka blog number) for a blog that has the given
             blogUrlName, and is in the given project
Returns: the blog number if successful, false in all other cases
*/
function _getBlogNum($blogUrlName, $projectNum){

    $selectBlogNum = "SELECT blog FROM blog_head WHERE project=$projectNum AND url_name='$blogUrlName';";
    $resultBlogNum = query($selectBlogNum);


    if($resultBlogNum == false || mysqli_num_rows($resultBlogNum) != 1){
        echo '{"result": "error-get-blog-num"}';
        return false;
    }

    $row = mysqli_fetch_assoc($resultBlogNum);
    return $row['blog'];

}


/* UPDATE BLOG INFO ==========================|Downie     |2016-08-12|2016-08-12
______________________________________________|AUTHOR     |CREATED   |MODIFIED
Description: updates the info table for a single blog
             updates the following columns: img_link, first_snippet, modified
             
Returns: true if successful, false otherwise
*/
function _updateBlogInfo($blogNum, $imgLink, $firstSnippet){
    $modified = time();
    $updateHead = "UPDATE blog_info SET img_link='$imgLink', first_snippet='$firstSnippet', modified='$modified' WHERE blog=$blogNum;";
    $updateResult = query($updateHead);
    
    //TODO: error checking
    //if(errors){
    //  echo "there was err";
    //  return false;
    //}

    return true;
}


/* UPDATE BLOG CONTENTS ======================|Downie     |2016-08-12|2016-08-12
______________________________________________|AUTHOR     |CREATED   |MODIFIED
Description: updates the contents table for a single blog
             updates the following columns: contents 
             
Returns: true if successful when trying to update blog contents, false otherwise
*/
function _updateBlogContents($blogNum, $newContents){

    //check for existance,
    //if it does not exisit create it.
    $updateContents = "UPDATE blog_contents SET contents='$newContents' WHERE blog=$blogNum;";
    $contentsResult = query($updateContents);
    //TODO: error checking

    return true;

}


/* UPDATE BLOG HEAD  =========================|Downie     |2016-08-13|2016-08-13
______________________________________________|AUTHOR     |CREATED   |MODIFIED
Description: updates the head table for a single blog
             updates the following columns: name, url_name
             uses the <to_url_name> function to derive the new url_name from the
             given new name
             
Returns: true if successful when trying to update blog head, false in all other cases 
*/
function _updateBlogHead($blogNum, $newBlogName, $newUrlName){


    $updateHead = "UPDATE blog_head SET name='$newBlogName', url_name='$newUrlName' WHERE blog=$blogNum;";
    $updateResult = query($updateHead);

    //TODO: error checking
    


    return true;
}
?>
