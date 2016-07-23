$(document).ready(function(){
    load_project();

});


//=====
//===== LOAD PROJECT -----------------------------------------------------------
//=====
function load_project(){
    var resourceName = get_resource_name();
    var urlParts = resourceName.split("/");

    $("#all-projects #loading-projects").show();
    $.ajax({
        url: '/ajax_api',
        type: "GET",
        data: {
            "function": "load-project",
            "username": urlParts[4],
            "projectname": urlParts[6],
            "amount": 12,
            "start": 1
        },
        success: function(data) {
            //alert(data)

            if(data == "project-not-found"){
                alert("project not found... :(");
            }
            else{
                add_project_to_page(data);
            }
        },
        error: function(xhr, desc, err) {
            alert('No response from server >:( ');
        },
        complete: function(){

        }
    });
}

//=====
//===== ADD PROJECT TO PAGE ----------------------------------------------------
//=====
function add_project_to_page(data){
    var obj = jQuery.parseJSON( data );

    for(i = 0; i < obj.length; i++){
        if(obj[i] === null){
            continue;
        }
        var row = obj[i];
        $("#test-insert-point").after(row.project + " " + row.name + " " + row.url_name + " " + row.spec_link + " " + row.img_link + " " + row.created + " " + row.modified);
    }
}
