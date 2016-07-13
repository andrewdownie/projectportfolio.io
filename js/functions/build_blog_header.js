function build_blog_header(blogNum, name, created, faClass){
    var html = "";

    //TODO: for some reason the bootstrap columns are not being obeyed

    html += "<h3 class='col-md-10'>";
    html += "    <a href='#!' id='head-" + blogNum + "' class='blog-header'>";
    html += "        <i class='fa " + faClass + "' aria-hidden='true'></i>";
    html += "        &nbsp;";
    html +=          name;
    html += "    </a>";
    html += "</h3>";


    html += "<div class='col-md-2 blog-created'>";
    html += "   Created: ";
    html +=     created;
    html += "</div>";




    return html;
}
