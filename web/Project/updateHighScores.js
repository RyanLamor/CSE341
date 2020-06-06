function updateHighScores() {
    $.ajax({
        url: 'updateHighScores.php',
        error: function(xhr, statusText, err) {
          console.log("error"+xhr.status);
        },
        success: function(data) {
          console.log(data);
        },
        type: 'POST'
    });

  return false;
}
