function build_project_card(name, img_link, modified){
    var output = ""

    output += name
    output += "<br/>"
    output += img_link
    output += "<br/>"
    output += modified
    output += "<br/>"

    return output
}
