//
function validPassword(password){
    //var invalidCharacters = new RegExp("[^A-Za-z0-9!()$%^&*+=.?\[\]_`~@# |,<>:;{}-]")
    var invalidCharacters = new RegExp("[^A-Za-z0-9!()$%^&*+=.?\\[\\]_`~@# |,<>:;{}-]")
    var eightToTwenty = new RegExp("^(.{8,20}$)")
    var uppercase = new RegExp("[A-Z]")
    var lowercase = new RegExp("[a-z]")
    var number = new RegExp("[0-9]")
    var symbol = new RegExp("[^A-Za-z0-9]")

    if(invalidCharacters.test(password) == true){
        return false
    }

    /*if(eightToTwenty.test(password) == false){
        return false
    }

    if(uppercase.test(password) == false){
        return false
    }

    if(lowercase.test(password) == false){
        return false
    }

    if(number.test(password) == false){
        return false
    }

    if(symbol.test(password) == false){
        return false
    }*/

    return true
}
