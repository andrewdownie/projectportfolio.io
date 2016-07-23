function build_blog_header(blogNum, name, created, faClass){
    var html = "";

    //TODO: tidy this up (so it has proper html indenting)

    html += "<div class='row'>";
    html += "    <h3 class='col-md-6'>";
    html += "        <a href='#!' id='head-" + blogNum + "' class='blog-header'>";
    html += "            <i class='fa " + faClass + "' aria-hidden='true'></i>";
    html += "            &nbsp;";
    html +=              name;
    html += "        </a>";
    html += "    </h3>";

    html += "    <h3 class='col-md-3'>";
    //html += "        <button id='blog-btn-" + blogNum + "' class='btn btn-primary simple-button blog-btn'><i class='fa fa-file' aria-hidden='true'></i>&nbsp;View Full Entry </button>";
    //html += "        <button class='btn btn-warning simple-button blog-btn'><i class='fa fa-pencil' aria-hidden='true'></i>&nbsp;Edit </button>";
    //html += "        <button class='btn btn-danger simple-button blog-btn'> <i class='fa fa-times-circle' aria-hidden='true'></i>&nbsp;Delete </button>";
    html += "    </h3>";
    html += "</div>";//close row


    html += "<div class='row date-row'>";
    html += "    <div class='col-md-12'>";
    html += "        <span class='date-created'>";
    html += "            Created: ";
    html +=              created;
    html += "        </span>";

    html += "        <span class='space-dates'>&nbsp;&nbsp;&nbsp;</span>";

    html += "        <span id='date-modified-" + blogNum + "' class='date-modified'>";
    html += "            &nbsp;";
    html += "        </span>";
    html += "    </div>";
    html += "</div>";//close row


    return html;
}
