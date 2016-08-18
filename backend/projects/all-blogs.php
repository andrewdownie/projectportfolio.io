<?php
// MAIN FUNCTIONS
//==============================================================================


/* LOAD RECENT BLOGS ==========================|Downie    |2016-07-14|2016-07-14
_______________________________________________|AUTHOR    |CREATED   |MODIFIED
DESCRIPTION: loads the blog_head and blog_info rows for the two most recent blog
             entries of a project.
    RETURNS: prints the selected blog headers / info to buffer, which will be
             picked up by client that sent the AJAX call.
--------------------------------------------------------------------------------
$project_id: the project number to use to load from the blog_header table
$start_index: blog_head rows are sorted DESC, by date created, $start_index
              determines starting row. (Useful for html pagers)
*/
function load_recent_blogs($projectTitle){
    $idName = project_id_name_from_url_name($projectTitle);
    $projectNumber = $idName[0];
    $nameArray = array("project_name"=>$idName[1], "project_id"=>$projectNumber);

    $output[] = $nameArray;

    $sqlTwoRecentBlogs = "SELECT * FROM blog_head WHERE project=$projectNumber";
    $sqlTwoRecentBlogs .= " ORDER BY created DESC LIMIT 2;";
    $recentBlogs = query($sqlTwoRecentBlogs);

    if($recentBlogs === false){
        echo '{"result": "load-recent-blogs-failure-1"}';
        return;
    }

    $numBlogs = mysqli_num_rows($recentBlogs);
    if($numBlogs == 0){
        echo '{"result": "no-recent-blogs"}';
        return;
    }

    if($numBlogs > 2){
        echo '{"result": "load-recent-blogs-failure-2"}';
        return;
    }

    $blogHead1 = mysqli_fetch_assoc($recentBlogs);
    $blog1 = $blogHead1['blog'];
    $blog1Array = array("created"=>$blogHead1['created'],"name"=>$blogHead1['name'],"url_name"=>$blogHead1['url_name']);

    $sqlBlogInfo1 = "SELECT * FROM blog_info WHERE blog=$blog1";
    $blogInfo1 = query($sqlBlogInfo1);

    $blog1Rows = mysqli_num_rows($blogInfo1);
    if($blog1Rows == 0){
        echo '{"function": "load-recent-blogs", "error-message": "no blog info found, blog 1"}';
        return;
    }
    else if ($blog1Rows > 1){
        //TODO: log db consistency error
    }

    $output[] = array_merge(mysqli_fetch_assoc($blogInfo1), $blog1Array);


    if($numBlogs == 2){
        $blogHead2 = mysqli_fetch_assoc($recentBlogs);
        $blog2 = $blogHead2['blog'];
        $blog2Array = array("created"=>$blogHead2['created'],"name"=>$blogHead2['name'],"url_name"=>$blogHead2['url_name']);

        $sqlBlogInfo2 = "SELECT * FROM blog_info WHERE blog=$blog2";
        $blogInfo2 = query($sqlBlogInfo2);

        $blog2Rows = mysqli_num_rows($blogInfo2);
        if($blog2Rows == 0){
            echo '{"function": "load-recent-blogs", "error-message": "no blog info found, blog 2"}';
            return;
        }
        else if ($blog2Rows > 1){
            //TODO: log db consistency error
        }

        $output[] = array_merge(mysqli_fetch_assoc($blogInfo2), $blog2Array);
    }

    if(count($output) != 2 && count($output) != 3){
        echo '{"result": "load-recent-blogs-failure-3"}';
        return;
    }



    print_r(json_encode($output));
}


/* LOAD BLOG HEADERS ==========================|Downie    |2016-07-14|2016-07-14
_______________________________________________|AUTHOR    |CREATED   |MODIFIED
DESCRIPTION: loads rows from table: blog_header, for the project_id.
    RETURNS: prints the select blog headers to buffer, which will be picked up by
         client that sent the AJAX call.
       TODO: Make it so $start_index actually works, expected that 50
             blog_headers will be selected at a time.
--------------------------------------------------------------------------------
$project_id: the project number to use to load from the blog_header table
$start_index: blog_head rows are sorted DESC, by date created, $start_index
              determines starting row. (Useful for html pagers)
*/
function load_blog_headers($project_id, $start_index){

    $sql = "SELECT * FROM blog_head WHERE project=$project_id";
    $sql .= " ORDER BY created DESC;";
    $result = query($sql);


    if($start_index == 1 && mysqli_num_rows($result) < 3){
       // echo $project_id." ";
        echo '{"result": "less-than-three-blogs"}';
        return;
    }

    if($start_index == 1){//or does it start at zero?
        //_If we are getting headers starting at the first, then we already have
        //_   the first two, so we should not return them.
        $rowRow = mysqli_fetch_assoc($result);
        $rowRow = mysqli_fetch_assoc($result);
    }

    print_r(sql_to_json($result));//TODO: make this Work
    //TODO: why is this returning zero rows?
}

/* LOAD BLOG BODY =============================|Downie    |2016-07-19|2016-07-19
_______________________________________________|AUTHOR    |CREATED   |MODIFIED
DESCRIPTION: loads the blog body for a single blog.
    RETURNS: prints the select blog body to buffer, which will be picked up by
         client that sent the AJAX call.
       TODO: N/A-ATM
--------------------------------------------------------------------------------
$project_id: the project number to use to load from the blog_header table
$start_index: blog_head rows are sorted DESC, by date created, $start_index
              determines starting row. (Useful for html pagers)
*/
function load_blog_body($blog_id){
    $sqlBlogInfo = "SELECT * FROM blog_info WHERE blog=$blog_id";
    $result = query($sqlBlogInfo);

    if(mysqli_num_rows($result) != 1){
        echo '{"result": "load-blog-body-error"}';
        return;
    }
    echo sql_to_json($result);
}



/* CREATE NEW BLOG ============================|Downie    |2016-07-31|2016-08-14
_______________________________________________|AUTHOR    |CREATED   |MODIFIED
DESCRIPTION: creates a new blog in the project the owning user is currently
             editing.
    RETURNS: success or failure message about whether or not the new blog was
             created. 
--------------------------------------------------------------------------------
$project_id: the id of the proeject to create the blog in 
*/
function create_new_blog($projectUrlName){
    //TODO: include more error checking

    $currentUser = current_account();
    if($currentUser == -1){
        echo '{"result": "not-signed-in"}';
    }

    $projectNum = _getProjectNum($projectUrlName, $currentUser);



    $time = time();
    $blogName = "new blog ".$time;
    $blogUrl = name_to_url_name($blogName);
      
    $createBlog = "INSERT INTO blog_head values(null, $projectNum, '$blogName', '$blogUrl', $time)";
    $result = query($createBlog);

    $createdBlog = last_insert_id();

    $createBlogInfo = "INSERT INTO blog_info values($createdBlog, 'http://i.imgur.com/WtDPZp7.png', '', $time)";
    $result2 = query($createBlogInfo);

    $blogTitle = "<p id='blog-title' contenteditable='true'> BlogTitle </p>";
    $createBlogContent = "INSERT INTO blog_contents VALUES($createdBlog, \"$blogTitle\");";
    $result3 = query($createBlogContent);

    echo '{"result": "create-new-blog-success"}';

}

/* DELETE BLOG ================================|Downie    |2016-07-31|2016-07-31
_______________________________________________|AUTHOR    |CREATED   |MODIFIED
DESCRIPTION: Deletes a blog for the owning user 
    RETURNS: a json message, containing whether or not the deletion was successful. 
--------------------------------------------------------------------------------
$project_id: the id of the proeject to create the blog in 
*/
function delete_blog($blog_id){
    //3. delete the blog,

    $curAccount = current_account(); 
    if($curAccount == -1){
        echo '{"result": "not-logged-in"}';
        return;
    } 
    
    //--  get the project that the blog to be deleted belongs to --------------
    $selectProject = "SELECT project FROM blog_head WHERE blog=$blog_id";
    $projectResult = query($selectProject);

    if(mysqli_num_rows($projectResult) != 1){
        echo '{"result": "error-finding-project"}';
    }
    $row = mysqli_fetch_assoc($projectResult); 
    $project = $row['project'];


    //-- get the owner of the project, that the blog is in -------------------- 
    $selectOwner = "SELECT owner FROM project_head WHERE project=$project";
    $ownerResult = query($selectOwner);

    if(mysqli_num_rows($ownerResult) != 1){
        echo '{"result": "error-finding-owner"}';
        return;
    }
    $row = mysqli_fetch_assoc($ownerResult);
    $owner = $row['owner'];

    if($owner === $curAccount){
        $deleteContents = "DELETE FROM blog_contents WHERE blog=$blog_id";
	$contentsResult = query($deleteContents);

        $deleteInfo = "DELETE FROM blog_info WHERE blog=$blog_id";
        $infoResult = query($deleteInfo);

        $deleteHead = "DELETE FROM blog_head WHERE blog=$blog_id";
        $headResult = query($deleteHead);


        echo '{"result": "delete-blog-success"}';
        return;
    }

    echo '{"result": "not-blog-owner"}';

}


// HELPER FUNCTIONS
//==============================================================================





/* GET PROJECT NUM ===========================|Downie     |2016-08-12|2016-08-12
______________________________________________|AUTHOR     |CREATED   |MODIFIED
Description: gets the unique project identifier (aka project number) for a project that has the given
             projectUrlName, and is owned by the given user
Returns: the project number if successful, false in all other cases
NOTE: this is a duplicate from the editor.php backend file
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





?>
