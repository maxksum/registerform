$(document).ready(function() {
  $('#logoutbtn').click(function(e){
    e.preventDefault();

    var logout = false;

    $.ajax({
      type: "POST",
      dataType: "text",
      async: false,
      url: "./functions/logoutUser.php",
      success: function(response){
        var res = $.parseJSON(response);
        logout = res;
      }
    });

    if (logout) {
      window.location.href='auth.php';
    }
  });
});
