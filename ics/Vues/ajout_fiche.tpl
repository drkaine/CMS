<!-- Formulaire d'ajout de fiche métier -->

<h1 class ="titre">Ajout de fiches métiers</h1>  


<div class="container">

  <form enctype="multipart/form-data" 
   action="interface.php" method="post">
    <label for="titre">Titre</label>
    <input type="text" id="Titre" name="Titre" placeholder="Entrez un titre..">

    <label for="rom">Code ROM</label>
    <input type="text" id="ROM" name="Code_ROM" placeholder="Entrez le code ROM..">

    <label for="descric">Description courte</label>
    <input type="text" id="Description_Courte" name="Description_Courte" placeholder="Entrez une description courte..">

    <label for="descrid">Description Détaillée</label>
    <input type="text" id="Description_Detaille" name="Description_Detaille" placeholder="Entrez une description détaillée..">

    <label for="photo">Téléchargez une photo</label>
    <input type="file" id="Photo" name="Photo1"><br>

    <label for="photo">Téléchargez une photo</label>
    <input type="file" id="Photo2" name="Photo2"><br>

    <label for="photo">Téléchargez une photo</label>
    <input type="file" id="Photo3" name="Photo3"><br>

    <label for="fichier">Téléchargez un fichier</label>
    <input type="file" id="File" name="File"><br>

<input  name="ajout"  type="hidden">
    <input type="submit" value="Valider">
  </form>
</div>