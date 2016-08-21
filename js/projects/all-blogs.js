$(document).ready(function(){
    var urlTitle = getProjectUrlTitle();
    var approxTitle = urlNameToApproxName(urlTitle);
    setPageTitle(approxTitle);
    loadRecentBlogs(urlTitle);



    $('#all-blogs').on('click', '.blog-header', function() {
        var blogID = this.id.split("-")[1];
        // alert(blogID)


        if($("#blog-img-" + blogID + " img").length === 0){
           // alert("clicked element: " + blogID + " and it's body does not exist");
            loadBlogBody(blogID);
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
    	createNewBlog(getProjectUrlTitle());
    });
     
    $('#all-blogs').on('click', '.delete-blog', function() {
        var blogID = this.id.split("-")[2];//_Delete buttons have id in form of: delete-btn-<blogID>
        //alert("Blog for deletion has id: " + blogID);

        deleteBlog(blogID);
    });

    $('#all-blogs').on('click', '.edit-blog', function() {
        
        var blogID = this.id.split("-")[2];


        var url_name = $("#all-blogs #url-name-" + blogID).text();
       // alert(url_name);
       
        var href = _cleanUrlEnd(window.location.href);

        
        window.location.href = href + "/" + url_name + "/edit";      
        //TODO: get the id of this button (the number from the form edit-btn-<number>)
        // use the above number to do... things
        // need to somehow get the url name to do the redirect here.... Do I send the url name and store it? or will I have to add it?

        
      
    
    
    });

});


// GET PROJECT OWNER ==========================|Downie    |2016-08-18|2016-08-18
//_____________________________________________|AUTHOR    |CREATED   |MODIFIED
function getProjectOwner(){
    return get_resource_name().split("/")[4];
}

// SHOW EDIT DELETE BUTTONS ===================|Downie    |2016-08-18|2016-08-18
//_____________________________________________|AUTHOR    |CREATED   |MODIFIED
function showEditDeleteButtons(projectOwner){
    var cookieUser = read_cookie("LOGGED_IN");


    if(cookieUser == projectOwner){
        alert("matches");
        //TODO: for some reason I am currently unable to select these css selectors, even though I can do so fine in css using the same selector
        $(".delete-blog").show();
        $(".edit-blog").show();
    }

}

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
            

            //TODO: this does not work
            setProjectID(json.project_id);


            if(json.result === "no-recent-blogs"){
                alert('no recent blogs'); 
                return;
            }



            var projectOwner = getProjectOwner();


            loadBlogHeaders(json[0].project_id, 1);

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

            showEditDeleteButtons(projectOwner);

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
          // alert(data);

            var json = jQuery.parseJSON(data);
            if(json.result == "less-than-three-blogs"){
                return; 
            }
            
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
*/
function createNewBlog(projectUrlName){
    $.ajax({
        url: '/ajax/all-blogs',
        type: "POST",
        data: {
            "function": "create-new-blog",
            "project_url_name": projectUrlName 
        },
        success: function(data) {
            alert(data);

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
blogID: the id of the blog, that the user wants to delete 
*/
function deleteBlog(blogID){
    $.ajax({
        url: '/ajax/all-blogs',
        type: "POST",
        data: {
            "function": "delete-blog",
            "blog_id": blogID
        },
        success: function(data) {
       //  alert(data);

            var json = jQuery.parseJSON(data);
            if(json.result === "delete-blog-success"){
                alert("delete blog: success");
                window.location.href = "";      
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
            fill_blog_body(json.blog, json.img_link, json.first_snippet, time_stampify(json.modified));

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
            var blogHead = build_blog_skeleton(json[i].blog, json.url_name, json[i].name, time_stampify(json[i].created), "fa-plus-square");

            $("#blog-insertion-point").before(blogHead);
        }

    }
}


/* CREATE RECENT BLOGS ========================|Downie    |2016-07-14|2016-07-23
_______________________________________________|AUTHOR    |CREATED   |MODIFIED
DESCRIPTION: create the first two blog on the page, with their info being shown
             by default */
function createRecentBlogs(json){
    var blogHead = build_blog_skeleton(json.blog, json.url_name, json.name, time_stampify(json.created), "fa-minus-square");
    $("#blog-insertion-point").before(blogHead);
    fill_blog_body(json.blog, json.img_link, json.first_snippet, time_stampify(json.modified));
}


/* CLEAN URL END ==============================|Downie    |2016-07-14|2016-07-23
_______________________________________________|AUTHOR    |CREATED   |MODIFIED
DESCRIPTION: removes unwanted characters from the end of the url
  */
function _cleanUrlEnd(url){
    var newUrl = url;
    var lastChar = newUrl[newUrl.length - 1];

    while(lastChar == "/" || lastChar == "#" || lastChar == "!"){
        newUrl = newUrl.substr(0, newUrl.length - 2);
        lastChar = newUrl[newUrl.length - 1];
    }
        
    return newUrl;

}
