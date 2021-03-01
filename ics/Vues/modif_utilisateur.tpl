<h1 class ="titre">Modifier  l'utilisateur:  <!--Nom-->  <!--Prenom--></h1>  




<div class="container">
  <form action="utilisateur.php" method="post">
    <label for="fname">Nom</label>
    <input class="formulaire" type="text" id="fname" name="Nom" value="<!--Nom-->" placeholder="Nom..">

    <label for="lname">Prénom</label>
    <input  class="formulaire"type="text" id="lname" name="Prenom" value="<!--Prenom-->" placeholder="Prénom..">

    <label for="lname">Mail</label>
    <input  class="formulaire" type="text" id="mail" name="Mail" value="<!--Mail-->" placeholder="Mail..">


   


    <label for="lname">Super Admin</label>
    <input type="checkbox" id="scales" name="Niveau" value="1"><br>

     <input  name="modif_user"  type="hidden">
    <input  name="Id_Utilisateur"  value="<!--ID-->" type="hidden">
    <input  name="Mot_De_Passe"  value="<!--MDP-->" type="hidden">
    <input type="submit" value="Valider">
  </form>
</div>