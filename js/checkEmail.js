var lbl = document.getElementById("emailerror");
var frm = document.getElementById("signupform");

$('#signupform').on('submit',function () { //callback function
    var that = $(this),                               // current form we're working with
        contents = that.serialize();                    // grab the content of the form
    console.log(contents);
    $.ajax({
        url: 'php/signUp.php',
        dataType: 'json',
        type: 'post',
        data: contents,
        success: function (data) {
            renderHtml1(data);
        }
    });
    return false;
});

function renderHtml1(data){
    if(data.status == "exist"){
        //email exist
        lbl.style.display = "block";
        frm.className = "validation";
    }else{
        //if successfully added forward to the next page
        window.location.assign("http://localhost/jsonAjaxRequestResponse/redirect.html");
    }

}