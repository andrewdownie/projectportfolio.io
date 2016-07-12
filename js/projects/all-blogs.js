$(document).ready(function(){
    var projectTitle = getProjectTitle();
    setPageTitle(projectTitle);
    loadRecentBlog(projectTitle);

    loadBlogHeaders();



    $('#all-blogs').on('click', '.blog-header', function() {
        var id = this.id.split("-")[1];
        //alert(id)

        toggle_elements($("#head-" + id + " i"), "fa fa-plus-square", "fa fa-minus-square", $("#all-blogs #body-" + id));
    });

    //onclick:
    //loadBlogBody(clickIdentifier) //could i pass info about the element click to figure out what body to load
});

//=====
//===== GET PROJECT TITLE
//=====
function getProjectTitle(){
    return get_resource_name().split("/")[6];
}

//=====
//===== SET THE TITLE OF THE PAGE
//=====
function setPageTitle(title){
    $("#all-blogs #project-title").text(title);
}

//TODO:
// - load everything about the most recent blog entry
// - for every blog entry older than the most recent, just load the title and date
//   -> so don't load the most recent when loading info about all the blogs

//TODO:
// - get javascript setup to poop a blog entry to the page
// - get javascript to poop a blog title and creation date to the page
// - get javascript to load info about a project when you open it

//TODO:
// - do the php to load the stuff you need in the first TODO

//=====
//===== AJAX - LOAD RECENT BLOG ------------------------------------------------
//=====
function loadRecentBlog(projectTitle){
    //TODO: loading icon??

    $.ajax({
        url: '/ajax_api',
        type: "GET",
        data: {
            "function": "load-recent-blog",
            "project-title": projectTitle,
        },
        success: function(data) {
            //alert(data);
            //    $("#blog-insertion-point").text(data)

            var json = jQuery.parseJSON(data);



            if(json.length === 0){
                alert("Unable to find this project");
            }

            if(json.length == 1){
                alert("No blogs found for this project");
            }

            if(json.length >= 1){
                setPageTitle(json[0].project_name);
            }

            if(json.length >= 2){
                createRecentBlog(json[1]);
            }

            if(json.length == 3){
                createRecentBlog(json[2]);
            }

            //begin loading blog headers here
        },
        error: function(xhr, desc, err) {
            alert('No response from server >:( ');
        },
        complete: function(){

        }
    });
}

//=====
//===== CREATE FIRST BLOG ------------------------------------------------------
//=====
function createRecentBlog(json){
    var blogHead = build_blog_header(1, json.name, time_stampify(json.created));
    $("#blog-insertion-point").before(blogHead);
    var blogBody = build_blog_body(1, json.img_link, json.first_snippet, time_stampify(json.modified));
    $("#blog-insertion-point").before(blogBody);

}

//=====
//===== AJAX - LOAD BLOG HEADERS -----------------------------------------------
//=====
function loadBlogHeaders(){
    // this will load just the headers of anything older than the most recent blog entry
}

//=====
//===== AJAX - LOAD PROJECT BODY -----------------------------------------------
//=====
function loadBlogBody(identifierHere){
    //this will load the body of a single blog entry
}
