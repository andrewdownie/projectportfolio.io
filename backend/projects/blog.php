<?php
// MAIN FUNCTIONS
//==============================================================================


/* LOAD BLOG CONTENTS =========================|Downie    |2016-09-06|2016-09-06
_______________________________________________|AUTHOR    |CREATED   |MODIFIED
DESCRIPTION: loads the blog contents for the blog with the project name, owner,
             and blog name
    RETURNS: prints the blog contents to buffer, which will be
             picked up by client that sent the AJAX call.
--------------------------------------------------------------------------------
$project_id: the project number to use to load from the blog_header table
*/
function load_blog_contents($blogUrlName, $projectUrlName, $ownerName){
    $owner = getOwnerFromOwnerName($ownerName);
    if($owner === null){
        return;
    }

    $project = getProjectFromOwnerAndName($owner, $projectUrlName);
    if($project === null){
        return;
    }

    $contents = getContentsFromProjectAndName($project, $blogUrlName); 
    if($contents === null){
        return;
    }


    
}

function getContentsFromProjectAndName($project, $blogUrlName){
    $sqlContents = "SELECT blog_contents.contents FROM blog_head INNER JOIN ";
    $sqlContents .= "blog_contents on blog_head.blog = blog_contents.blog ";
    $sqlContents .= "WHERE blog_head.project=$project ";
    $sqlContents .= "AND blog_head.url_name='$blogUrlName'";
    $resultContents = query($sqlContents);

    if($resultContents === false || mysqli_num_rows($resultContents) != 1){
        echo '{"result": "error-loading-contents"}';
        return null;
    }

    $rowContents = mysqli_fetch_assoc($resultContents);
    $contents = $rowContents['contents'];
    $contents = str_replace("contenteditable='true'", "", $contents);
    echo '{"result": "'.$contents.'"}';

}

function getProjectFromOwnerAndName($owner, $projectUrlName){
    $sqlBlogContents  = "SELECT project_head.project FROM project_head ";
    $sqlBlogContents .= "INNER JOIN project_info ";
    $sqlBlogContents .= "ON  project_head.project = project_info.project ";
    $sqlBlogContents .= "AND project_info.url_name='$projectUrlName' ";
    $sqlBlogContents .= "AND project_head.owner=$owner ";
    $resultContents = query($sqlBlogContents);

    if($resultContents == false || mysqli_num_rows($resultContents) != 1){
        echo'{"result": "error-finding-project"}';
        return null;
    }

    $contentsRow = mysqli_fetch_assoc($resultContents);
    return $contentsRow['project'];
}

function getOwnerFromOwnerName($ownerName){
    $sqlOwner = "SELECT account FROM account_credentials WHERE username='$ownerName'";
    $resultOwner = query($sqlOwner);

    if(mysqli_num_rows($resultOwner) != 1){
        echo '{"result": "error-finding-user"}';
        return null;
    }
    
    $ownerRow = mysqli_fetch_assoc($resultOwner);
    return $ownerRow['account'];
}





// HELPER FUNCTIONS
//==============================================================================





?>
