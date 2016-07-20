//pure functions should be moved into this file



/* URL NAME TO APRROX NAME ====================|Downie    |2016-07-19|2016-07-19
_______________________________________________|AUTHOR    |CREATED   |MODIFIED
DESCRIPTION: this function takes an elements urlname, and tries to guess what
             it's name was. It will replace underscores with spaces, and upper
             case every letter before a space. This should be used to fill in a
             title as a place holder. It is assumed the actual name will be
             loaded in shortly after this.
    RETURNS: the approximate name of the project.
       TODO: N/A-ATM
--------------------------------------------------------------------------------
urlName: the url name to try to convert back to the original name
*/
function urlNameToApproxName(urlName){
    var nameArr = urlName.replace("_", " ").split("");
    nameArr[0] = nameArr[0].toUpperCase();

    for(var i = 1; i < nameArr.length-1; i++){
        if(nameArr[i] == " "){
            nameArr[i+1] = nameArr[i+1].toUpperCase();
        }
    }

    return nameArr.join("");
}
