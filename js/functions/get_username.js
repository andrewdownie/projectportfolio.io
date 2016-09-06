//gets the user name from the current URL
//the username must come before a /user in the
function get_username(){
    var url = window.location.href;

    var urlSplit = url.split("/");

    var user = urlSplit[3];
    var username = urlSplit[4];


    if(user.trim() == "user"){
        return username.trim();
    }

    return false;

}
