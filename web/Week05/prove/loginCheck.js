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
  });
});
}
