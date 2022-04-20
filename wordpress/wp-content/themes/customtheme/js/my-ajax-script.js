
function clickedit(){

    //alert('iam clicked');

    jQuery.ajax({
        type: "post",
        url: my_ajax_object.ajax_url,
        data: {action: "ajaxcall", message: "hi"},
        success: function (msg) {

            //alert("jihklij");

            // $('.show').val(msg);
            console.log(msg);
            // console.log(msg);
        }
});

}
