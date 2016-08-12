<?php
//MAIN FUNCTIONS ==============================================================




/* SAVE BLOG =================================|Downie     |2016-08-12|2016-08-12
______________________________________________|AUTHOR     |CREATED   |MODIFIED
*/
function save_blog($projectUrlName, $blogUrlName, $imgLink, $firstSnippet, $blogContents){
    //1. Get the project number for the blog the user is currently editing
    //2. Get the blog number the user is currently editing (using info from step 1)
    //3. Update the tables related to the blog the user is editing (using info from step 2)
    

    $currentUser = current_account();


    // 1 - get the project number for the blog the user is currently editing
    $projectNum = _getProjectNum($projectUrlName, $currentUser);

    if($projectNum == false){ return; }




    // 2 - Get the blog number the user is currently editing
    $blogNum = _getBlogNum($blogUrlName, $projectNum);

    if($blogNum == false){ return; }




    // 3 - Update the tables related to the blog the user is editing
    $updateBlogResult = _updateBlogInfo($blogNum, $imgLink, $firstSnippet);

    if($updateBlogResult == false){
        //probably also need to do database cleanup
        return;
    }

   

    //_updateBlogContents();




    //update the blog header table
    //update the blog info table

    //update the blog contents table (is this just a straight overwrite?)(this will require adding another parameter to this function)
    echo "{'result': 'blog-save-success'}";
}



//HELP FUNCTIONS ==============================================================




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
        print_r($resultprojectnum);
        echo "{'result': 'error-saving-blog'}";
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
        echo "{'result': 'error-saving-blog'}";
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

}

?>
