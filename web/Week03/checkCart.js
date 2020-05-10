function checkCart(){
    $(document).ready(function(){
      $.post("checkCart.php",{},
      function(response){
        console.log(response);
        if (response == true){
          document.getElementById("viewCart").src = "HasItems.png";
        }
      });
    });
}
