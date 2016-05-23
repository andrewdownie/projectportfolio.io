//Simple function that checks to make sure the user inclues one @ symbol
//and characters both before and after the @ symbol.
function validEmail(email){
    charsBeforeAfter = false
    atCount = 0

    for(i = 0; i < email.length; i++){
        if(email.charAt(i) == '@'){
            atCount = atCount + 1

            if(i > 0 && i < email.length - 1){
                charsBeforeAfter = true
            }
        }
    }

    if(atCount == 1 && charsBeforeAfter){
        return true
    }
    return false
}


//
function validPassword(password){
    //i'm not really sure what I should require the user to input here

    //10 characters or more, one capital, one number, one symbol, one space
    //the above is probably too strict, but it is the ideal password requirements
    return true
}
