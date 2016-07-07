function build_blog_header(name, created){
    var html = ""

    //TODO: for some reason the bootstrap columns are not being obeyed

    html += "<h3 class='col-md-10'>"
    html += "    <a href='#'>"
    html += "        <i class='fa fa-plus-square' aria-hidden='true'></i>"
    html += "        &nbsp;"
    html +=          name
    html += "    </a>"
    html += "</h3>"


    html += "<div class='col-md-2 blog-created'>"
    html +=     created
    html += "</div>"




    return html
}
