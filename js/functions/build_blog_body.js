function build_blog_body(imgLink, firstSnippet, modified){
    //alert(imgLink + " - " + firstSnippet + " - " + modified)
    var html = ""

    html += "<div class='blog-body'>"

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
    html += firstSnippet
    html += "    </div>"

    html += "<br/><br/>"
    html += "</div>"

    return html
}
