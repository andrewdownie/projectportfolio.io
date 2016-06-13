//
function validPassword(password){
    var invalidCharacters = new RegExp("[^A-Za-z0-9!()$%^&*+=.?\\[\\]_`~@# |,<>:;{}-]")
    var eightToTwenty = new RegExp("^(.{8,20}$)")
    var uppercase = new RegExp("[A-Z]")
    var lowercase = new RegExp("[a-z]")
    var number = new RegExp("[0-9]")
    var symbol = new RegExp("[^A-Za-z0-9]")

    if(invalidCharacters.test(password) == true){
        return "Password contains invalid characters"
    }

    if(eightToTwenty.test(password) == false){
        if(password.length < 8){
            return "Password too short"
        }
        return "Password too long"
    }

    if(uppercase.test(password) == false){
        return "Password missing uppercase letter"
    }

    if(lowercase.test(password) == false){
        return "Password missing lowercase letter"
    }

    if(number.test(password) == false){
        return "Password missing number"
    }

    if(symbol.test(password) == false){
        return "Password missing symbol"
    }

    return true
}
