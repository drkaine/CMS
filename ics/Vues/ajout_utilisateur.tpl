<h1 class ="titre">Ajout d'utilisateur</h1>  




<div class="container">
  <form action="utilisateur.php" method="post">
    <label for="fname">Nom</label>
    <input type="text" id="fname" name="Nom" placeholder="Nom..">

    <label for="lname">Prénom</label>
    <input type="text" id="lname" name="Prenom" placeholder="Prénom..">

    <label for="lname">Mail</label>
    <input type="text" id="mail" name="Mail" placeholder="Mail..">


   
    <input id="Mot_De_Passe" name="Mot_De_Passe" type="hidden">

    <label for="lname">Super Admin</label>
    <input type="checkbox" id="scales" name="Niveau" value="1" checked><br>

    <input type="submit" value="Valider">
  </form>
</div>