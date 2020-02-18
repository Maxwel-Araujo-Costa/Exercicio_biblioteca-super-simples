var $btn = $("#request");
$(document).ready(function() {
    $("#btn").click(function() {
        $.post("/Api/UserController/add", null, function(data) {
            $("#add").html(data);
            console.log("Deu certo?");
        });
    });
});
