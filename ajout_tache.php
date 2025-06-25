<?php
    if ( $_SERVER ["REQUEST_METHOD"] == "POST") {
        $titre = htmlspecialchars( $_POST['titre']);
        $description_tache =htmlspecialchars( $_POST['description']);
        $jours_array = isset($_POST['jours']) ? $_POST['jours'] : [];
        $jours = implode(",", $jours_array); 
        $heure = htmlspecialchars($_POST['heure']);
        $id_categorie = (int)$_POST['id_categorie'];
        $points = (int)$_POST['points'];

    }
    // verifier que tous les champs sont  remplis
    if ( !empty ($titre) &&  !empty ($description_tache) && !empty ($heure) && !empty ($id_categorie) && !empty ($points) && !empty ($jours)) {

        //connexion
        $servernme = "localhost";
        $username = "root";
        $password = "";
        $dbname = "planning_db";
        $conn = new mysqli ($servernme ,$username,$password ,$dbname );
        if ( $conn -> connect_error){
            die ("echec de la connexion :" .$conn -> connect_error);
        } else {
            // Insertion de la tache dans la base de données
            $stmt = $conn -> prepare ("INSERT INTO tache_recurrente (titre , description_tache ,jours,heure,id_categorie, points ) VALUES (?,?,?,?,?,?)");
            $stmt -> bind_param ("sssssi" , $titre, $description_tache,$jours,$heure, $id_categorie ,$points);
                    
            if ($stmt->execute()) {
                // on reccupere tacheID de la tache nouvellement crée
                $tacheID = $stmt -> insert_id;
                echo "<script> alert ('Tache ajoutée avec succée'); </script>";
            } else {
                echo "Erreur : " . $stmt->error; 
            }


            $stmt -> close();
            $conn -> close ();
        }
    }  else {
        echo "<script> alert ('Tous les champs obligatoires doivent etre remplis'); </script>";
    }
  
?>

<!-- Formualire d'ajout d'une tache -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout tache</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/ajouter_tache.css">
    <script src="https://kit.fontawesome.com/a6c1691723.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include("includes/header.php"); ?>
    <main>
        <h1>Ajouter une tache </h1>
        <form action="ajout_tache.php" method="post">
            <label for="titre" id="titreLable" >Titre de la tache:</label>
            <br>
            <input type="text" name="titre" id="titre" required>
            <br>

            <label for="description" id="descriptionLabel">Description de la tache:</label>
            <br>
            <textarea name="description" rows="3" cols="40"></textarea>
            <br>
        
            <label id="checkboxLabel">Jours :</label><br>
            <input type="checkbox" id="checkbox" name="jours[]" value="Lun"> Lun
            <input type="checkbox" id="checkbox" name="jours[]" value="Mar"> Mar
            <input type="checkbox" id="checkbox" name="jours[]" value="Mer"> Mer
            <input type="checkbox" id="checkbox" name="jours[]" value="Jeu"> Jeu
            <input type="checkbox" id="checkbox" name="jours[]" value="Ven"> Ven
            <input type="checkbox" id="checkbox" name="jours[]" value="Sam"> Sam
            <input type="checkbox" id="checkbox" name="jours[]" value="Dim"> Dim
            <br>

            <label for="heure" id="heureLabel"> Heure:</label>
            <br>
            <input type="time" name="heure" id="heure">
            <br>

            <label for="categorie" id="categorieLabel">Categorie de la tache:</label>
            <br>
            <select name="id_categorie" required>
                <option value="0" selected> </option>
                <option value="1">Études</option>
                <option value="2">Spiritualité</option>
                <option value="3">Langue</option>
                <option value="4">Maison</option>
                <option value="5">Loisirs</option>
            </select>
            <br>

            <label for="points" id="pointsLabel">Points :</label>
            <br>
            <input type="number" name="points" value="0" min="0">
            <br>

            <input type="submit" id="ajouterBtn" value="Ajouter la tache">
        </form>
    </main>
    <?php include("includes/footer.php"); ?>
</body>
</html>