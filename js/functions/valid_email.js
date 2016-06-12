function validEmail(email){
    var invalidCharacters = new RegExp("[^a-zA-Z0-9._@]");
    var singleAt = new RegExp("^([A-Za-z0-9._]+@[A-Za-z0-9._]+)$");

    if(invalidCharacters.test(email)){
        return false
    }

    if(singleAt.test(email)){
        return true
    }

    return false
}
