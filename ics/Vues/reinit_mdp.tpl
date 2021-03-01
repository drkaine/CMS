
<h1 class ="titre">Réinitialisation du mot de passe</h1>  


<div class="container">

    <form action="<--!action_page.php-->" method = "POST">
        <label for="Mot_De_Passe_Ancien">Ancien mot de passe</label>
        <input type="text" id="Mot_De_Passe_Ancien" name="Mot_De_Passe_Ancien" placeholder="Entrez le mot de passe..">

        <label for="Mot_De_Passe">Nouveau mot de passe</label>
        <input type="text" id="Mot_De_Passe" name="Mot_De_Passe" placeholder="Entrez le nouveau mot de passe..">

        <label for="Mot_De_Passe2">Confirmation du mot de passe</label>
        <input type="text" id="Mot_De_Passe2" name="Mot_De_Passe2" placeholder="Confirmez le nouveau mot de passe..">

        <input type="submit" value="Valider">
    </form>