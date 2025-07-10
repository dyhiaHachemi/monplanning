<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Planning Hebdomadaire</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <script src="https://kit.fontawesome.com/a6c1691723.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include("includes/header.php"); ?>
    <h1>
        <i class="fa-solid fa-star"></i>    
        Mon Planning Hebdomadaire
    </h1>
    <p id="motivation">Planifie avec sagesse, agis avec constance, et laisse Allah bénir ton effort </p>


    <div class="btn-container">
        <a href="dashboard.php" class="btn">
            <i class="fa-solid fa-list-check"></i>
            Voir mes tâches
        </a>
        <a href="ajout_tache.php" class="btn">
            <i class="fa-solid fa-plus"></i> 
            Ajouter une tâche</a>
    </div>
    <?php include("includes/footer.php"); ?>
</body>
</html>
