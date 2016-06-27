function build_project_card(name, img_link, modified){
    var card = ""

    card += "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12'>"
    card += "<a href='#' class='thumbnail project-thumbnail'>"
    card += "<img src='" + "https://picjumbo.imgix.net/HNCK0852.jpg?q=40&w=1650&sharp=30" + "'/>"
    /*card += name
    card += "<br/>"
    card += img_link
    card += "<br/>"
    card += modified
    card += "<br/>"*/
    card += "</a>"
    card += "</div>"

    return card
}
