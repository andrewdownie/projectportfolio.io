function fill_blog_body(blogNum, imgLink, firstSnippet, dateModified){
    var blogModified = "blog-modified-" + blogNum;
    var blogDesc = "blog-desc-" + blogNum;
    var blogImg = "blog-img-" + blogNum;


    $("#all-blogs #" + blogModified).text("Modified: " + dateModified);
    $("#all-blogs #" + blogDesc).text(firstSnippet);
    $("#all-blogs #" + blogImg).html("<img src='" + imgLink + "' class='blog-img' >");
}
