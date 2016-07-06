function build_blog_header(name, created){
    var html = ""

    //TODO: for some reason the bootstrap columns are not being obeyed
    html += "<a href='#'>"
    html += "    <div class='col-md-10'>"
    html += "        <i class='fa fa-plus-square' aria-hidden='true'></i>"
    html += "        &nbsp;"
    html +=          name
    html += "    </div>"
    html += "    <div class='col-md-2'>"
    html +=          created
    html += "    </div>"
    html += "</a>"



    return html
}
