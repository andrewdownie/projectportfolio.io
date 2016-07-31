function build_blog_body(blogNum, imgLink, firstSnippet){
    var html = "";

    html += "<div class='row' style='margin-bottom:60px';>";
    html += "    <div class='blog-body' id='body-" + blogNum + "'>";

    html += "        <div class='col-md-6'>";
    html += "            <div class='img-container'>";
    html += "                <img src='" + imgLink + "' class='blog-img'/>";
    html += "            </div>";
    html += "        </div>";

    html += "        <div class='col-md-6'>";
    //html += "        <button id='blog-btn-" + blogNum + "' class='btn btn-primary simple-button view-blog-btn'> View Full Entry </button>";
    html +=              firstSnippet;
    html += "        </div>";

    html += "    <br/><br/>";
    html += "    </div>";

    html += "</div>";//Close row

    return html;
}
