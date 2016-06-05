//TODO: make it not accept special characters
function validUsername(username){
    if(username.length > 15){
        return false
    }
    else if(username.length < 4){
        return false
    }
    else if(username.length == 0){
        return false
    }
    return true
}
