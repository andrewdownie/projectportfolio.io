function validUsername(username){
    var fourToFifteen = new RegExp("(^(.{4,15}$))")
    var underDotStart = new RegExp("(^([_.]))")
    var doubleUnderDot = new RegExp("(.*[_.]{2})")
    var underDotEnd = new RegExp("(([_.])$)")
    var illegalCharacters = new RegExp("(^(([^a-zA-Z0-9._]))$)")

    if(illegalCharacters.test(username) == true){
        return "Username contains invalid characters"
    }

    if(underDotStart.test(username) == true){
        return "Username starts with dot or underscore"
    }

    if(doubleUnderDot.test(username) == true){
        return "Username has two dots / underscores in a row"
    }

    if(underDotEnd.test(username) == true){
        return "Username ends with dot or underscore"
    }

    if(fourToFifteen.test(username) == false){
        if(username.length < 4){
            return "Username too short"
        }
        return "Username too long"
    }


    return true
}
