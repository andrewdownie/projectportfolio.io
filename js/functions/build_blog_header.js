function build_blog_header(blogNum, name, created, faClass){
    var html = "";

    //TODO: tidy this up (so it has proper html indenting)

    html += "<div class='row blog-header-row page-header'>";
    html += "    <h3 class='col-md-6'>";
    html += "        <a href='#!' id='head-" + blogNum + "' class='blog-header'>";
    html += "            <i class='fa " + faClass + "' aria-hidden='true'></i>";
    html += "            &nbsp;";
    html +=              name;
    html += "        </a>";



    html += "    </h3>";
    //html += "    <div style='float:right;'>meow</div>";



    html += "    <h3 class='col-md-6'>";
    html += "        <div class='row'>";
    html += "            <div class='col-md-6 col-xs-12 btn-col'>";
    html += "                <button id='blog-btn-" + blogNum + "' class='btn btn-primary simple-button blog-btn'><i class='fa fa-file' aria-hidden='true'></i>&nbsp;View Full Entry</button>";
    html += "            </div>";
    html += "            <div class='col-md-3 col-xs-6 btn-col'>";
    html += "                <button class='btn simple-button blog-btn'><i class='fa fa-pencil' aria-hidden='true'></i>&nbsp;Edit</button>";
    html += "            </div>";
    html += "            <div class='col-md-3 col-xs-6 btn-col'>";
    html += "                <button class='btn simple-button blog-btn'> <i class='fa fa-times-circle' aria-hidden='true'></i>&nbsp;Delete</button>";
    html += "            </div>";
    html += "        </div>";//Close row
    html += "    </h3>";
    html += "</div>";//close row

    /////
    ///// BUILD BLOG DATE ROW
    /////
    html += "<div class='row date-row'>";
//    html += "    <div class='col-md-6'> </div>";
    html += "    <div class='col-md-6' style='float:right;'>";
    html += "        <strong>";
    html += "        <span class='date-created'>";
    html += "            Created: ";
    html +=              created;
    html += "        </span>";

    html += "        <span class='space-dates'>&nbsp;&nbsp;&nbsp;</span>";

    html += "        <span id='date-modified-" + blogNum + "' class='date-modified'>";
    html += "            &nbsp;";
    html += "        </span>";
    html += "        </strong>";
    html += "    </div>";
    html += "</div>";//close row



    return html;
}
