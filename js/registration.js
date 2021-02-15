$(document).ready(function() {
  $('#registerbtn').click(function(e){
    e.preventDefault();

    var login = $("#login").val();
    var psw = $("#psw").val();
    var psw_repeat = $("#psw-repeat").val();
    var email = $("#email").val();
    var name = $("#name").val();

    var userdata = {
      login: login,
      psw: psw,
      psw_repeat: psw_repeat,
      email: email,
      name: name
    };

    var registration = false;
    var logged = false;

    $.ajax({
      type: "POST",
      dataType: "text",
      async: false,
      url: "functions/checkFields.php",
      data: { userdata: JSON.stringify(userdata) },
      success: function(response){
        var res = $.parseJSON(response);
        $('#forlogin').html(res.login);
        $('#forname').html(res.name);
        $('#forpassword').html(res.psw);
        $('#foremail').html(res.email);
        $('#forpasswordrepeat').html(res.psw_repeat);
        registration = !res.iserror;
      }
    });

    if (registration) {
      $.ajax({
        type: "POST",
        dataType: "text",
        async: false,
        url: "functions/registerUser.php",
        data: { userdata: JSON.stringify(userdata) },
        success: function(response){
          logged = response;
        }
      });
    }
    if (logged) {
      window.location.href = 'welcome.php';
    }
  });
});
