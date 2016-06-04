//SOURCE: http://www.drupalden.co.uk/get-values-from-url-query-string-jquery
// Read a page's GET URL variables and return them as an associative array.
function get_url_vars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');

    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        //if hash.length > 2, then we have more than one equals for that hash,
        //and we need to glue the values past the first equals back on
        if(hash.length > 2){
            for(var j = 2; j < hash.length; j++){
                hash[1] = hash[1] + "=" + hash[j]
            }
        }
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}
