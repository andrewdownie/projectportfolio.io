/* CLEAN URL END ==============================|Downie    |2016-07-14|2016-07-23
_______________________________________________|AUTHOR    |CREATED   |MODIFIED
DESCRIPTION: removes unwanted characters from the end of the url
  */
function clean_url_end(url){
    var newUrl = url;
    var lastChar = newUrl[newUrl.length - 1];

    while(lastChar == "/" || lastChar == "#" || lastChar == "!"){
        newUrl = newUrl.substr(0, newUrl.length - 1);
        lastChar = newUrl[newUrl.length - 1];
    }

    return newUrl;

}

