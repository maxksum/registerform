$(document).ready(function() {
  $('#loginbtn').click(function(e){
    e.preventDefault();

    var login = $("#login").val();
    var psw = $("#psw").val();

    var userdata = {
      login: login,
      psw: psw
    }

    var logged = false;

    $.ajax({
      type: "POST",
      dataType: "text",
      async: false,
      url: "./functions/authorizeUser.php",
      data: { userdata: JSON.stringify(userdata) },
      success: function(response){
        var res = $.parseJSON(response);
        if (!res.iserror) {
          logged = response;
        } else {
          $('#autherror').html(res.iserror);
        }
      }
    });
    if (logged) {
      window.location.href = 'welcome.php';
    }
  });
});
