<form action="upload.php" method="post" enctype="multipart/form-data">
  <input type="file" name="pdfFile">
  <input type="submit" value="Upload PDF">
</form>
<?php 
$targetDirectory = "uploads/"; // Répertoire de destination pour enregistrer les fichiers
$targetFile = $targetDirectory . basename($_FILES["pdfFile"]["name"]);

// Déplacer le fichier téléchargé vers le répertoire de destination
if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFile)) {
  // Le fichier a été téléchargé avec succès, vous pouvez maintenant l'insérer dans la base de données
  // Utilisez la variable $targetFile pour obtenir le chemin complet du fichier PDF
} else {
  // Une erreur s'est produite lors du téléchargement du fichier
}

?>