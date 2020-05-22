function getScriptures(){
  var _book = $("#selectBook").val();

  $(document).ready(function(){
    $.post("getScriptures.php",
    {
      book: _book
    },
    function(response){
      if ( $("#response").text().length > 0 ){
        $("#response").remove();
      }
      var text = $("<p id='response'></p>").html(response);
      $( "body" ).append( text );
    });
  });

  return false;
}
