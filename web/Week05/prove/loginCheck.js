function checkLogin() {
  var username = $('#userName').value;
  var password = $('#userPass').value;

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
