function checkLogin() {
  var username = $('#userName').val();
  var password = $('#userPass').val();
  var valid = false;

  $(document).ready(function(){
    $.post("mapHighScores.php",
    {
      username: username,
      password: password
    },
    function(response){
      console.log(response);
      if (response == true){
        valid = true;
      }
    });
  });

  return valid;
}
