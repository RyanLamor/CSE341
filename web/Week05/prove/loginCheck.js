function checkLogin() {
  var username = $('#userName').val();
  var password = $('#userPass').val();

  $(document).ready(function(){
  $.post("getScriptures.php",
  {
    username: username,
    password: password
  },
  function(response){
  });
});
}
