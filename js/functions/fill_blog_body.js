function fill_blog_body(blogNum, imgLink, firstSnippet, dateModified){
    var blogModified = "blog-modified-" + blogNum;
    var blogDesc = "blog-desc-" + blogNum;
    var blogImg = "blog-img-" + blogNum;


    if(firstSnippet === ""){
        firstSnippet = "The first snippet is blank.";
    }



    $("#" + blogModified).text("Modified: " + dateModified);
    $("#" + blogDesc).text(firstSnippet);
    $("#" + blogImg).html("<img alt='No Image Found' src='" + imgLink + "' class='blog-img' >");
}
