<?php
// MAIN FUNCTIONS
//==============================================================================


/* LOAD RECENT BLOGS ==========================|Downie    |2016-09-05|2016-09-05
_______________________________________________|AUTHOR    |CREATED   |MODIFIED
DESCRIPTION: loads the blog_head and blog_info rows for the two most recent blog
             entries of a project.
    RETURNS: prints the selected blog headers / info to buffer, which will be
             picked up by client that sent the AJAX call.
--------------------------------------------------------------------------------
$project_id: the project number to use to load from the blog_header table
*/
function load_recent_blogs($projectNumber){
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







// HELPER FUNCTIONS
//==============================================================================





?>
