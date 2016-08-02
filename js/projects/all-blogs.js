$(document).ready(function(){
    var urlTitle = getProjectUrlTitle();
    var approxTitle = urlNameToApproxName(urlTitle);
    setPageTitle(approxTitle);
    loadRecentBlogs(urlTitle);



    $('#all-blogs').on('click', '.blog-header', function() {
        var blogID = this.id.split("-")[1];
        //alert(blogID)


        if($("#body-" + blogID).length === 0){
            //alert("clicked element: " + blogID + " and it's body does not exist");
            loadBlogBody(blogID);
            //TODO: how the hell do I save the projectID?
        }

        var visible = toggle_elements($("#all-blogs #head-" + blogID + " i"), "fa fa-plus-square", "fa fa-minus-square", $("#all-blogs #body-" + blogID));

        if(visible){
            $("#all-blogs #date-modified-" + blogID).show();
        }
        else{
            $("#all-blogs #date-modified-" + blogID).hide();
        }
    });

    $('#all-blogs #create-blog').click(function() {
	createNewBlog(getProjectID());
    });
     
    $('#all-blogs .delete-blog').click(function() {
        alert('delete this blog (not setup yet)');
        //TODO: figure out what blog to delete, based on the number of the button
        var blogID = getBlogID(this);
	createNewBlog(getProjectID(), blogID);
    });

    //onclick:
    //loadBlogBody(clickIdentifier) //could i pass info about the element click to figure out what body to load
});

// GET PROJECT TITLE ==========================|Downie    |2016-07-14|2016-07-14
//_____________________________________________|AUTHOR    |CREATED   |MODIFIED
function getProjectUrlTitle(){
    return get_resource_name().split("/")[6];
}

// SET PAGE TITLE =============================|Downie    |2016-07-14|2016-07-14
//_____________________________________________|AUTHOR    |CREATED   |MODIFIED
function setPageTitle(title){
    $("#all-blogs #project-title").text(title);
}

// SET PROJECT ID =============================|Downie    |2016-07-14|2016-07-14
//_____________________________________________|AUTHOR    |CREATED   |MODIFIED
function setProjectID(projectID){
    $("#all-blogs #project-ID").text(projectID);
}

// GET PROJECT ID =============================|Downie    |2016-07-14|2016-07-14
//_____________________________________________|AUTHOR    |CREATED   |MODIFIED
function getProjectID(){
    return $("#all-blogs #project-ID").text();
}

// SET DATE MODIFIED ==========================|Downie    |2016-07-23|2016-07-23
//_____________________________________________|AUTHOR    |CREATED   |MODIFIED
function setDateModified(blogNum, date){
    $("#all-blogs #date-modified-" + blogNum).text("Modified: " + date);
}

/* LOAD RECENT BLOGS ==========================|Downie    |2016-07-14|2016-07-14
_______________________________________________|AUTHOR    |CREATED   |MODIFIED
DESCRIPTION: send an ajax request to get the blog header blog info rows for the
             first two most recent blog entries for the current project*/
function loadRecentBlogs(projectTitle){
    //TODO: loading icon??

    $.ajax({
        url: '/ajax/all-blogs',
        type: "GET",
        data: {
            "function": "load-recent-blogs",
            "project-title": projectTitle,
        },
        success: function(data) {
            //alert(data);


            var json = jQuery.parseJSON(data);
            loadBlogHeaders(json[0].project_id, 1);

            //setProjectID(json[0].project_id);//TODO: do I still need this, since each blog has a unique number?


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
                createRecentBlogs(json[1]);
            }

            if(json.length == 3){
                createRecentBlogs(json[2]);
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


/* LOAD BLOG HEADERS ==========================|Downie    |2016-07-14|2016-07-14
_______________________________________________|AUTHOR    |CREATED   |MODIFIED
DESCRIPTION: send an ajax request to get the blog header information for the
             current project */
function loadBlogHeaders(projectID, startIndex){

    $.ajax({
        url: '/ajax/all-blogs',
        type: "GET",
        data: {
            "function": "load-blog-headers",
            "project_id": projectID,
            "start_index": startIndex
        },
        success: function(data) {
            //alert(data);

            var json = jQuery.parseJSON(data);
            createBlogHeaders(json);

        },
        error: function(xhr, desc, err) {
            alert('No response from server >:( ');
        },
        complete: function(){

        }
    });
}




/* CREATE NEW BLOG ============================|Downie    |2016-07-31|2016-07-31
_______________________________________________|AUTHOR    |CREATED   |MODIFIED
DESCRIPTION: creates a new blog under the project the user is currently editing 
--------------------------------------------------------------------------------
projectID: the id of the project, that the user wants to add a new blog to 
*/
function createNewBlog(projectID){
    $.ajax({
        url: '/ajax/all-blogs',
        type: "POST",
        data: {
            "function": "create-new-blog",
            "project_id": projectID
        },
        success: function(data) {
          //alert(data);

            var json = jQuery.parseJSON(data);
            if(json.result === "create-new-blog-success"){
                alert("create blog: success");
                window.location.href = "";      
            } 
            else{
                alert("create blog: failed");          
            }
        },
        error: function(xhr, desc, err) {
            alert('No response from server >:( ');
        },
        complete: function(){

        }
    });

}






/* DELETE BLOG ================================|Downie    |2016-07-31|2016-07-31
_______________________________________________|AUTHOR    |CREATED   |MODIFIED
DESCRIPTION: deletes a blog from project 
---------------------------------------------------------------------------
projectID: the id of the project, that the user wants to delete 
*/
function deleteBlog(projectID){
    $.ajax({
        url: '/ajax/all-blogs',
        type: "POST",
        data: {
            "function": "delete-blog",
            "project_id": projectID
        },
        success: function(data) {
          //alert(data);

            var json = jQuery.parseJSON(data);
            if(json.result === "delete-blog-success"){
                alert("delete blog: success");
                //window.location.href = "";      
            } 
            else{
                alert("delete blog: failed");          
            }
        },
        error: function(xhr, desc, err) {
            alert('No response from server >:( ');
        },
        complete: function(){

        }
    });
}





/* LOAD BLOG BODY =============================|Downie    |2016-07-14|2016-07-23
_______________________________________________|AUTHOR    |CREATED   |MODIFIED
DESCRIPTION: send an ajax request to get the blog body info for the blog-header
             that got clicked.
       TODO: add a loading icon at start of function, remove loading icon in ajax complete
             - show error message under blog head, if error loading blog body
--------------------------------------------------------------------------------
blogID: the unique id of the blog_info (aka. blog body) to load
*/
function loadBlogBody(blogID){

    $.ajax({
        url: '/ajax/all-blogs',
        type: "GET",
        data: {
            "function": "load-blog-body",
            "blog_id": blogID
        },
        success: function(data) {
            //alert(data);

            var json = jQuery.parseJSON(data)[0];
            var blogBody = build_blog_body(json.blog, json.img_link, json.first_snippet);

            $("#head-" + blogID).parent().parent().next().after(blogBody);
            setDateModified(blogID, time_stampify(json.modified));
        },
        error: function(xhr, desc, err) {
            alert('No response from server >:( ');
        },
        complete: function(){

        }
    });
}


/* CREATE BLOG HEADERS ========================|Downie    |2016-07-14|2016-07-23
_______________________________________________|AUTHOR    |CREATED   |MODIFIED
DESCRIPTION: create the blog headers for all the blog, except the first two,
             which should already be on the page, by the time this runs */
function createBlogHeaders(json){

    for(var i = 0; i < json.length; i++){
        if(json[i] !== null){
            var blogHead = build_blog_header(json[i].blog, json[i].name, time_stampify(json[i].created), "fa-plus-square");

            $("#blog-insertion-point").before(blogHead);
        }

    }
}


/* CREATE RECENT BLOGS ========================|Downie    |2016-07-14|2016-07-23
_______________________________________________|AUTHOR    |CREATED   |MODIFIED
DESCRIPTION: create the first two blog on the page, with their info being shown
             by default */
function createRecentBlogs(json){
    var blogHead = build_blog_header(json.blog, json.name, time_stampify(json.created), "fa-minus-square");
    $("#blog-insertion-point").before(blogHead);
    var blogBody = build_blog_body(json.blog, json.img_link, json.first_snippet);
    $("#head-" + json.blog).parent().parent().next().after(blogBody);
    setDateModified(json.blog, time_stampify(json.modified));
}
