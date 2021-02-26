<!-- Formulaire d'ajout de fiche métier -->

<h1 class ="titre">Ajout de fiches métiers</h1>  


<div class="container">

  <form action="interface.php" method="post">
    <label for="titre">Titre</label>
    <input type="text" id="Titre" name="Titre" placeholder="Entrez un titre..">

    <label for="rom">Code ROM</label>
    <input type="text" id="ROM" name="Code_ROM" placeholder="Entrez le code ROM..">

    <label for="descric">Description courte</label>
    <input type="text" id="Description_Courte" name="Description_Courte" placeholder="Entrez une description courte..">

    <label for="descrid">Description Détaillée</label>
    <input type="text" id="Description_Detaille" name="Description_Detaille" placeholder="Entrez une description détaillée..">

    <label for="photo">Téléchargez une photo (max 3)</label>
    <input type="file" id="Photo" name="Photo"><br>

    <label for="fichier">Téléchargez un fichier</label>
    <input type="file" id="Fichier" name="Fichier"><br>


    <input type="submit" value="Valider">
  </form>
</div>