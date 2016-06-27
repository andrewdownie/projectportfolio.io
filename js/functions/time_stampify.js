function time_stampify(epochSeconds){
    var date = new Date(epochSeconds * 1000)
    var output = "";

    var month
    var date

    output += date.getFullYear()
    month = date.getMonth() + 1
    day = date.getDate()

    if(month < 10){
        output = output + "-0" + month
    }
    else{
        output = output + "-" + month
    }

    if(day < 10){
        output = output + "-0" + day
    }
    else{
        output = output + "-" + day
    }


    return output
}
