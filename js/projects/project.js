$(document).ready(function(){
    load_project();


    $("#project #view-all-blogs").click(function(){
       var cleanUrl = clean_url_end(window.location.href); 
       window.location.href = cleanUrl + "/blogs";
    });

    $("#project").on("click", ".blog-header", function(){
        var blogId = this.id.split("-")[1];

        
        var visible = toggle_elements($("#project #head-" + blogId + " i"), "fa fa-plus-square", "fa fa-minus-square", $("#project #body-" + blogId));

    });

    $("#project").on("click", ".view-blog", function(){
        var blogId = this.id.split("-")[2];

        var blogUrlName = $("#project #url-name-" + blogId).text();
        var cleanUrl = clean_url_end(window.location.href);
        window.location.href = cleanUrl + "/blogs/" + blogUrlName;
    });
});


//=====
//===== LOAD PROJECT -----------------------------------------------------------
//=====
function load_project(){
    var resourceName = get_resource_name();
    var urlParts = resourceName.split("/");

    $("#all-projects #loading-projects").show();
    $.ajax({
        url: '/ajax_api',
        type: "GET",
        data: {
            "function": "load-project",
            "username": urlParts[4],
            "projectname": clean_url_end(urlParts[6]),
            "amount": 12,
            "start": 1
        },
        success: function(data) {
            //alert(data)

            if(data == "project-not-found"){
                alert("project not found... :(");
                return;
            }
            else{
                var projectInfo = jQuery.parseJSON( data )[0];

                loadMostRecentBlogs(projectInfo.project);
                
                addProjectToPage(projectInfo);
            }
        },
        error: function(xhr, desc, err) {
            alert('No response from server >:( ');
        },
        complete: function(){

        }
    });
}


//=====
//===== LOAD MOST RECENT BLOGS
//=====
function loadMostRecentBlogs(projectNum){
    
    $.ajax({
        url: '/ajax/project',
        type: "GET",
        data: {
            "function": "load-recent-blogs",
            "project_num": projectNum 
        },
        success: function(data) {
            //alert(data)

            if(data === "no-recent-blogs"){
                $("#project #blogs-insert-point").text(" >> This project does not have any blogs");
            }
            else{
                var blogInfo = jQuery.parseJSON(data);
                addBlogsToPage(blogInfo[0]);
                addBlogsToPage(blogInfo[1]);

                
            }
        },
        error: function(xhr, desc, err) {
            alert('No response from server >:( ');
        },
        complete: function(){
        
        }
    });
}

//=====
//===== ADD BLOGS TO PAGE ------------------------------------------------------
//=====
function addBlogsToPage(blogInfo){
   var blogHead = build_blog_skeleton(blogInfo.blog, blogInfo.url_name, blogInfo.name, time_stampify(blogInfo.created), "fa-minus-square"); 

   $("#project #blogs-insert-point").before(blogHead);

   fill_blog_body(blogInfo.blog, blogInfo.img_link, blogInfo.first_snippet, time_stampify(blogInfo.modified));


}

//=====
//===== ADD PROJECT TO PAGE ----------------------------------------------------
//=====
function addProjectToPage(projectInfo){

    if(projectInfo === null){
        console.warn("There was no project to load.");
        return;
    }


    $("#project #page-title").text(projectInfo.name);
    $("#project #created").text(time_stampify(projectInfo.created));
    $("#project #modified").text(time_stampify(projectInfo.modified));


    if(projectInfo.spec_link !== ""){
        $("#project #spec-link a").attr("href", projectInfo.spec_link);
        $("#project #spec-link a").text(projectInfo.spec_link);
    }
    else{
        $("#project #spec-link").hide();
    }




}


