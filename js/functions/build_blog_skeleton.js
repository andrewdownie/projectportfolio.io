function build_blog_skeleton(blogNum, name, created, faClass){
    var html = "";


    //// BLOG HEAD
    html += "<div class='row blog-header-row page-header'>";
    //---------  BLOG NAME / TOGGLE LINK  --------------------------- 
    html += "    <h3 class='col-md-6'>";
    html += "        <a href='#!' id='head-" + blogNum + "' class='blog-header'>";
    html += "            <i class='fa " + faClass + "' aria-hidden='true'></i>";
    html += "            &nbsp;";
    html +=              name;
    html += "        </a>";
    html += "    </h3>";
    //-----  BLOG BUTTONS (VIEW, EDIT DELETE)  ----------------------
    html += "    <h3 class='col-md-6'>";
    html += "        <div class='row'>";
    html += "            <div class='col-md-6 col-xs-12 btn-col'>";
    html += "                <button id='view-btn-" + blogNum + "' class='btn btn-primary simple-button blog-btn'><i class='fa fa-file' aria-hidden='true'></i>&nbsp;View Full Entry</button>";
    html += "            </div>";
    html += "            <div class='col-md-3 col-xs-6 btn-col'>";
    html += "                <button id='edit-btn-" + blogNum + "' class='btn simple-button blog-btn'><i class='fa fa-pencil' aria-hidden='true'></i>&nbsp;Edit</button>";
    html += "            </div>";
    html += "            <div class='col-md-3 col-xs-6 btn-col'>";
    html += "                <button id='delete-btn-" + blogNum + "' class='btn simple-button blog-btn delete-blog'> <i class='fa fa-times-circle' aria-hidden='true'></i>&nbsp;Delete</button>";
    html += "            </div>";
    html += "        </div>";//Close row
    html += "    </h3>";
    html += "</div>";//close row


    //// BLOG BODY
    html += "<div class='row' id='body-" + blogNum + "' >";
    html += "    <div class='col-md-6'>";
    html += "        <div class='row'>";
    //-------------  DATE CREATED  ----------------------------------
    html += "            <div class='col-md-6'>";
    html += "                <strong>";
    html += "                    <span class='date-created'>";
    html += "                        Created: ";
    html +=                          created;
    html += "                    </span>";
    html += "                </strong>";
    html += "            </div>";  
    //-------------  DATE MODIFIED  ---------------------------------
    html += "            <div class='col-md-6'>";
    html += "                <strong>";
    html += "                    <span id='blog-modified-" + blogNum + "' class='date-modified'>";
    html += "                    </span>";
    html += "                </strong>";
    html += "            </div>";
    //-----------------  IMAGE  -------------------------------------
    html += "            <div class='col-md-12' id='blog-img-" + blogNum + "'>";
    html += "            </div>";
    html += "        </div>";
    html += "    </div>";
    //----------  DESCRIPTION  --------------------------------------
    html += "    <div class='col-md-6' id='blog-desc-" + blogNum + "'>";
    html += "    </div>";
    html += "</div>";



    return html;
}
