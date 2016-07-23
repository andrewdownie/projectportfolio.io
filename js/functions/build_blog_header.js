function build_blog_header(blogNum, name, created, faClass){
    var html = "";

    //TODO: for some reason the bootstrap columns are not being obeyed


    html += "<h3 class='col-md-9'>";
    html += "    <a href='#!' id='head-" + blogNum + "' class='blog-header'>";
    html += "        <i class='fa " + faClass + "' aria-hidden='true'></i>";
    html += "        &nbsp;";
    html +=          name;
    html += "    </a>";
    html += "</h3>";


    html += "<h3 class='col-md-3' style='float:right;'>";
    html += "   <button class='btn btn-primary'> Edit </button>";
    html += "   <button class='btn btn-danger'> Delete </button>";
    html += "</h3>";

    html += "<div class='col-md-3'>";
    html += "   Created: ";
    html +=     created;
    html += "</div>";

    /*html += "<div class='col-md-2 blog-created' id='modified" + blogNum + "'>";
    html += "   Modified: ";
    html +=     created;
    html += "</div>";*/

    //html += "<div class='col-md-10'>&nbsp;</div>";
    //html += "</div>";


    return html;
}
