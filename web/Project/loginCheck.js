function checkLogin() {
  var username = $('#userName').val();
  var password = $('#userPass').val();

  $(document).ready(function(){
    $.post("loginCheck.php",
    {
      username: username,
      password: password
    },
    function(response){
      console.log(response);
      if (response == 'true' ){
        var form = $('<form action="main.php" method="post"></form>');
        $('body').append(form);
        form.submit();
      }
      else{
        alert("No user found with username/password combination!");
      }
    });
  });

  return false;
}
