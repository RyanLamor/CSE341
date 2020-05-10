function updateCart(item){
  buttons = document.querySelectorAll("button");
  //console.log(buttons[item].name + " " + buttons[item].value);

  if (item >= 0){
    $(document).ready(function(){
      $.post("store.php",
      {
        name: buttons[item].name,
        cost: buttons[item].value
      },
      function(response){
      });
    });
  }

    document.getElementById("viewCart").src = "HasItems.png";
}
