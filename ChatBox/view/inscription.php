<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form_connect.css">
    <title>Inscription</title>
</head>
<body>
    <div class="center">
        <h1>INSCRIPTION</h1>
        <form method="post" action="http://localhost/projet/chatbox/?page=inscription&action=inscription">
          <div class="inputbox">
            <input type="text" id="nom" name="nom" required="required">
            <span>Nom</span>
          </div>
          <div class="inputbox">
            <input type="text" id="prenom" name="prenom" required="required">
            <span>Prenom</span>
          </div>
          <div id="messageemail" class="col-6 offset-3 text-center text-danger"></div>
          <div class="inputbox">
            <input type="email" id="email" name="email" required="required">
            <span>Email</span>
          </div>
          <div class="inputbox">
            <input type="password" id="mdp" name="mdp" required="required">
            <span>Mot de passe</span>
          </div>
          <div class="row">
            <button type="button" class="btn btn-sm btn-success col-4 offset-1" id="inscription" name="inscription">S'inscrire</button>
            <a href="http://localhost/projet/chatbox/?page=connexion" class="btn btn-sm btn-primary col-6 offset-1">j'ai deja un compte</a>
          </div>
        </form>
      </div>
</body>
</html>

<script>
  btn = document.querySelector("#inscription");

  btn.onclick = function(){
    if(($("#nom").val() && $("#prenom").val() && $("#email").val() && $("#mdp").val())!=""){
      btn.setAttribute("type","submit");
    }else{
      btn.setAttribute("type","button");
    }
  
  }

  $("#messageemail").hide();
  $("#email").blur(
    function() {
      if ($("#email").val() != '') {
        $.ajax({
          url: "http://localhost/projet/ChatBox/api/connexion.php?action=email&email=" + $("#email").val(),
          method: "GET",
          dataType: "JSON",
          success: function(data) {
            if (data.email == $("#email").val()) {
              $("#messageemail").html("<p>Email incorrect</p>");
              $("#messageemail").show();
              $("#email").val("");
            } else {
              $("#messageemail").hide();
            }
          }
        });
      }
    }
  );
  
</script>