<div class="center">
  <h1>Connexion</h1>
  <form method="post" action="http://localhost/projet/chatbox/?action=connexion">
    <div id="messageemail" class="col col-6 offset-3 text-center text-danger mb-3">Email incorrect</div>
    <div class="inputbox">
      <input type="text" id="email" name="email" required="required">
      <span>Email</span>
    </div>
    <div class="inputbox">
      <input type="password" id="mdp" name="mdp" required="required">
      <span>Mot de passe</span>
    </div>
    <div class="row">
      <button type="submit" id="btn" class="btn btn-sm btn-success col-4 offset-1" hidden name="connexion">Se connecter</button>
      <button type="button" id="connexion" class="btn btn-sm btn-success col-4 offset-1" name="">Se connecter</button>
      <a href="http://localhost/projet/chatbox/?page=inscription" class="btn btn-sm btn-success col-4 offset-2">S'inscrire</a>
    </div>
  </form>
</div>

<script>
  var button = document.querySelector("#connexion");
  var btn = document.querySelector("#btn");
  button.setAttribute('type', 'button');
  $("#messageemail").hide();
  $("#email").blur(
    function() {
      let email = $("#email").val();
      if (email != '') {
        $.ajax({
          url: "http://localhost/projet/ChatBox/api/connexion.php?action=email&email=" + email,
          method: "GET",
          dataType: "JSON",
          success: function(data) {
            if (data.email != email) {
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

  $("#connexion").click(
    function() {
      if (($("#email").val() && $("#mdp").val()) != "") {
        $.ajax({
          url: "http://localhost/projet/ChatBox/api/connexion.php",
          data: {
            email: $("#email").val(),
            mdp: $("#mdp").val()
          },
          dataType: 'JSON',
          method: 'POST',
          success: function(data) {
            if (data) {
              btn.click();
            } else {

              $("#messageemail").html("<p>Email et/ou mot de passe incorrect</p>");
              $("#messageemail").show();
              // button.setAttribute('type','button');
            }
          }
        });
      }
    }
  );
</script>