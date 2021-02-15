$(document).ready(function() {
  $.ajax({
    type: "POST",
    dataType: "text",
    async: false,
    url: "./functions/getName.php",
    success: function(response){
      var res = $.parseJSON(response);
      $('#username').html(res);
    }
  });
});
