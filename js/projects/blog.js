$(document).ready(function(){
    var blogUrlName = getBlogUrlName();
    var blogProjectUrlName = getBlogProjectUrlName();
    var blogUserName = getBlogUserName();


    loadBlogContents(blogUrlName, blogProjectUrlName, blogUserName);
});


function getBlogUrlName(){
    var url = window.location.href;
    var blogUrlName = url.split("/")[8];

    return blogUrlName;
}

function getBlogProjectUrlName(){
    var url = window.location.href;
    var blogProjectUrlName = url.split("/")[6];

    return blogProjectUrlName;
}

function getBlogUserName(){
    var url = window.location.href;
    var blogUserName = url.split("/")[4];

    return blogUserName;
}

/* LOAD BLOG CONTENTS =========================|Downie    |2016-09-06|2016-09-06
_______________________________________________|AUTHOR    |CREATED   |MODIFIED
DESCRIPTION: send an ajax request to get the blog contents for the blog page
             that is currently being viewed
--------------------------------------------------------------------------------
blogUrlName: the url name of the blog
blogProjectUrlName: the url name of the project, that the blog is a part of
blogUserName: the user name of the user who owns the project that the blog is in
*/
function loadBlogContents(blogUrlName, blogProjectUrlName, blogUserName){
$.ajax({
        url: '/ajax/blog',
        type: "GET",
        data: {
            "function": "load-blog-contents",
            "blogUrlName": blogUrlName,
            "blogProjectUrlName": blogProjectUrlName,
            "blogUserName": blogUserName
        },
        success: function(data) {
            //alert(data);

            var json = jQuery.parseJSON(data);
            //alert(json.result);
            $("#blog #content-area").html(json.result);

        },
        error: function(xhr, desc, err) {
            alert('No response from server >:( ');
        },
        complete: function(){

        }
    });
}



