function build_project_card(name, url_name, img_link, modified){
    var card = ""

    //alert(url_name)//use this to test the project_name_to_url_name php function

    card += "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12'>"
    card += "<a href='' class='thumbnail project-thumbnail'>"
    card += "<img src='" + "https://picjumbo.imgix.net/HNCK0852.jpg?q=40&w=1650&sharp=30" + "'/>"
    card += "<span class='info info-top project-name'>"
    card += name
    card += "</span>"
    card += "<span class='info info-bottom'>"
    card += time_stampify(modified)
    card += "<a href='#' class='editButton' style='display:none;'>"
    card += "edit"
    card += "</a>"
    card += "</span>"
    card += "</a>"
    card += "</div>"

    return card
}
//href='/user/username/projects/"+name+"'
