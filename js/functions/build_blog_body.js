function build_blog_body(blogNum, imgLink, firstSnippet, modified){
    //alert(imgLink + " - " + firstSnippet + " - " + modified)
    var html = ""

    html += "<div class='blog-body' id='body-" + blogNum + "'>"

    html += "    <div class='col-md-5'>"
    html += "        <div class='img-container'>"
    html += "            <img src='" + imgLink + "' class='blog-img'/>"
    html += "        </div>"
    html += "        <div class='modified'>"
    html += "            Last modified: "
    html +=              modified
    html += "        </div>"
    html += "    </div>"

    html += "    <div class='col-md-5'>"
    html += "        <button id='blog-btn-" + blogNum + "' class='btn btn-failure view-blog-btn'> View Full Entry </button>"
    html += "        <br/> <br/>"
    html +=          firstSnippet
    html += "    </div>"

    html += "<br/><br/>"
    html += "</div>"

    return html
}
