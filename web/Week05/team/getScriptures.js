function getScriptures(){
  var _book = $("#selectBook").val();

  $(document).ready(function(){
    $.post("getScriptures.php",
    {
      book: _book
    },
    function(response){
      var text = $("<p></p>").text(response)
      $( "body" ).append( text );
    });
  });
  
  return false;
}
