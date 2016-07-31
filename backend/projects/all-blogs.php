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
    if($numBlogs == 0 || $numBlogs > 2){
        echo '{"result": "load-recent-blogs-failure-2"}';
        return;
    }


    $blogHead1 = mysqli_fetch_assoc($recentBlogs);
    $blog1 = $blogHead1['blog'];
    $blog1Array = array("created"=>$blogHead1['created'],"name"=>$blogHead1['name']);

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
        $blog2Array = array("created"=>$blogHead2['created'],"name"=>$blogHead2['name']);

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
        echo $project_id." ";
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



/* CREATE NEW BLOG ============================|Downie    |2016-07-31|2016-07-31
_______________________________________________|AUTHOR    |CREATED   |MODIFIED
DESCRIPTION: creates a new blog in the project the owning user is currently
             editing.
    RETURNS: success or failure message about whether or not the new blog was
             created. 
--------------------------------------------------------------------------------
$project_id: the id of the proeject to create the blog in 
*/
function create_new_blog($project_id){
    echo "create-new-blog:failure";

}



// HELPER FUNCTIONS
//==============================================================================
?>
