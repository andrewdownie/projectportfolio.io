function build_project_card(name, url_name, img_link, modified){
    var card = ""

    card += "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12'>"
    card += "    <a href='' class='thumbnail project-thumbnail'>"
    card += "        <span class='url_name' style='display:none;'>"
    card += url_name
    card += "        </span>"
    card += "        <img src='" + img_link + "'/>"
    card += "        <span class='info info-top project-name'>"
    card += name
    card += "        </span>"
    card += "        <span class='info info-bottom'>"
    card += time_stampify(modified)
    card += "        </span>"
    card += "        <a href='#' class='editButton' style='display:none;'>"
    card += "            Edit"
    card += "        </a>"
    card += "    </a>"
    card += "</div>"

    return card
}
//href='/user/username/projects/"+name+"'
