$(document).ready(function(){
    var url = window.location.href;
    var projectUrlName = url.split("/")[6];
    var blogUrlName = url.split("/")[8];

    //Load this blog asap after startup
    LoadBlog(projectUrlName, blogUrlName);


    /*Blogpad buttons*/
    $("#blogpad #blogpad-save").click(function(){
        this.blur();

        var blogContents = $("#content-area").html();
        var imgLink = "";
        var firstSnippet = "";
        var newBlogName = "";

        firstSnippet = $("#content-area").find(".text").eq(0).text();
        newBlogName = $("#content-area #blog-title").text();
        images = $("#content-area").find("img").eq(0);

        if(images.length > 0){
            imgLink = images.eq(0).attr("src");
        }
  

        SaveBlog(projectUrlName, blogUrlName, newBlogName, imgLink, firstSnippet, blogContents);

    });


    $("#blogpad #blogpad-exit").click(function(){
        this.blur();
        alert("this is the exit button");

    });


    /*Toggle pads when not in xs mode*/
    $("#editor-tools").click(function(){
        //LinkToggle($("#editor-tools i"), "fa fa-folder", "fa fa-folder-open", $("#editor-pads"))
        toggle_elements($("#editor-tools i"), "fa fa-folder", "fa fa-folder-open", $("#addpad"), $("#stylepad"), $("#blogpad") )
        $("#moveremovepad").hide()
    });

    /*Toggle pads when in xs mode*/
    $("#minimize-pads").click(function() {
        var visible = toggle_elements($("#minimize-pads i"), "fa fa-plus-square-o", "fa fa-minus-square-o", $("#addpad #content"), $("#stylepad #content"), $("#blogpad table") )
        if(visible){
            $(".editortools-topspace").css("padding-top", "90px")

        }
        else{
            $(".editortools-topspace").css("padding-top", "30px")
        }
        $("#moveremovepad").hide()

    });


    //Keep track of the current bootstrap screen size, and if the screen size changes, toggle our pads to be shown
    var inXsMode
    if($(this).width() < 768){//initialize inXsMode
        inXsMode = true
    }else{
        inXsMode = false
    }

    window.onresize = function(){
        if($(this).width() < 768 && inXsMode == false){
            //this code will be run when entering xs mode
            WindowSizeChanged()
            $(".editortools-topspace").css("padding-top", "90px")
            inXsMode = true
        }
        else if($(this).width() >= 768 && inXsMode == true){
            //this code will be run when leaving xs mode
            WindowSizeChanged()
            $(".editortools-topspace").css("padding-top", "30px")
            inXsMode = false
        }
    };
    function WindowSizeChanged(){
        ShowElements($("#editor-tools i"), "fa fa-folder-open", $("#addpad"), $("#stylepad"), $("#blogpad") )
        ShowElements($("#minimize-pads i"), "fa fa-minus-square-o", $("#addpad #content"), $("#stylepad #content"), $("#blogpad table") )
    }

});


/* SAVE BLOG ==================================|Downie   |2016-08-09|2016-08-09
_______________________________________________|AUTHOR   |CREATED   |MODIFIED
Description: saves the current snapshot of the blog
*/
function SaveBlog(projectUrlName, curBlogUrlName, newBlogName, imgLink, firstSnippet, blogContents){

     $.ajax({
         url: '/ajax/editor',
         type: "POST",
         data: {
             "function": "save-blog",
             "project_url_name": projectUrlName,
             "cur_blog_url_name": curBlogUrlName,
             "new_blog_name": newBlogName,
             "img_link": imgLink,
             "first_snippet": firstSnippet,
             "blog_contents": blogContents
         },
         success: function(data) {
              alert(data);

              

              var json = jQuery.parseJSON(data);
              if(json.result == "blog-save-success"){
                if(json.new_url_name != curBlogUrlName){
                
                  var urlFront = GetUrlFront(window.location.href);
                  
                  var newUrl = urlFront + "/" + json.new_url_name + "/edit";
                  window.location.href = newUrl;

                }
              }
              else{
                alert("blog was not saved successfully");
              }
     
         },
         error: function(xhr, desc, err) {
             alert('No response from server >:( ');
         },
          complete: function(){
     
         }
    });

}

/* LOAD BLOG ==================================|Downie   |2016-08-14|2016-08-14
_______________________________________________|AUTHOR   |CREATED   |MODIFIED
Description: loads the current blog from the database 
*/
function LoadBlog(projectUrlName, blogUrlName){

     $.ajax({
         url: '/ajax/editor',
         type: "GET",
         data: {
             "function": "load-blog",
             "project_url_name": projectUrlName,
             "blog_url_name": blogUrlName
         },
         success: function(data) {
           //alert(data);

              

            var json = jQuery.parseJSON(data);

            if(json.result == "blog-load-success"){
                if(json.blog_load_status == "content-not-found"){
                    $("#content-area").html("<p id='blog-title' contenteditable='true'> Page Title </p>");       

                } else if(json.blog_load_status == "content-found"){
                    $("#content-area").html(json.blog_content);

                }
            }
            else{
                alert("blog was not able to be loaded");

            }
     
         },
         error: function(xhr, desc, err) {
             alert('No response from server >:( ');
         },
          complete: function(){
     
         }
    });
}



//HELPER FUNCTIONS ============================================================

/* GET URL FRONT ==============================|Downie   |2016-08-14|2016-08-14
_______________________________________________|AUTHOR   |CREATED   |MODIFIED
Description: gets the front of the url up to right before the current blog name 
*/
function GetUrlFront(blogUrl){

    var urlPieces = window.location.href.split("/");
    var urlFront = "";
    
    urlFront += urlPieces[0];
    urlFront += "//";
    urlFront += urlPieces[2];
    urlFront += "/";
    urlFront += urlPieces[3];
    urlFront += "/";
    urlFront += urlPieces[4];
    urlFront += "/";
    urlFront += urlPieces[5];
    urlFront += "/";
    urlFront += urlPieces[6];
    urlFront += "/";
    urlFront += urlPieces[7];


    return urlFront;
    
}
