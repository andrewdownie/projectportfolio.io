function valid_item_name(itemName){
    var invalidCharacters = new RegExp("([^a-zA-Z0-9 -])");

    if(invalidCharacters.test(itemName) === true){
        return false;
    }

    return true;
}
