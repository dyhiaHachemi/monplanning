<?php include("includes/db.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Planning</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <script src="https://kit.fontawesome.com/a6c1691723.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include("includes/header.php"); ?>
    <main>
        <h1>Liste des taches pour aujourd'hui</h1>
        <?php
            // Obtenir le jour actuel (ex: "Mon", "Tue", ...)
            $jour_court = date("D");
            // Correspondance en français
            $jours_fr = [
                "Sun" => "Dim",
                "Mon" => "Lun",
                "Tue" => "Mar",
                "Wed" => "Mer",
                "Thu" => "Jeu",
                "Fri" => "Ven",
                "Sat" => "Sam"
            ];
            // Convertir le jour actuel en français
            $jour_aujourdhui = $jours_fr[$jour_court];

            $result = $conn->query("
                SELECT tr.*, c.nom AS nom_categorie, c.couleur, c.icone
                FROM tache_recurrente tr
                JOIN categorie c ON tr.id_categorie = c.id_categorie
            ");

            if ($result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {
                    $jours = explode(",", $row['jours']); // reccuperer les jours ex: ['Lun','Mar','Mer']
                    // Affiche uniquement si le jour correspond à aujourd'hui
                    if (in_array($jour_aujourdhui, $jours)) {
                        $titre = $row['titre'];
        ?>
        <div class="task-card" >
            <input type="checkbox" id="tache<?= $row['id_tache_recurrente']; ?>">
            <label for="tache<?= $row['id_tache_recurrente']; ?>">
                <div class="task-header">
                    <strong>
                        <?php echo $titre ?>
                    </strong> 
                    — 
                    <!-- Affichage de la categorie selon son ID-->
                    <span class="categorie" style="background-color: <?= $row['couleur']; ?>">
                        <i class="fa-solid <?= $row['icone']; ?>"></i>
                        <?= $row['nom_categorie']; ?>
                    </span>
                </div>
                <div class="task-info">
                    <span class="heure"> <?php echo $heure = $row['heure'] ?></span> 
                    | 
                    <span class="jours"><?php echo $jours = $row['jours'] ?></span>
                </div>
                <div class="task-desc">
                    <p> <?php echo $description_tache = $row['description_tache'] ?> </p>
                </div>
                <div class="task-points">
                    <strong><?php echo $points = $row['points'] ?> </strong>
                </div>
            </label>
        </div>
        <?php 
                
            }}} else {
                echo "<script> alert('Il n y a pas encore de tache'</script>";
            }
            $conn->close();
        ?>
    </main>    
    <?php include("includes/footer.php"); ?>
</body>
</html>