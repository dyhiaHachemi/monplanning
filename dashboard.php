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
        <h1>Liste des taches</h1>
        <div class="task-card">
            <input type="checkbox" id="tache1">
            <label for="tache1">
                <div class="task-header">
                    <strong>Prière du fadjr</strong> 
                    — 
                    <span class="categorie" id="Spiritualite">
                        <i class="fa-solid fa-mosque icon"></i>
                        Spiritualité
                    </span>
                </div>
                <div class="task-info">
                    <span class="heure">03:30</span> | <span class="jours">Tous les jours</span>
                </div>
                <div class="task-desc">
                    <p>Effectuer la prière à l’heure avec les adhkar du matin et des prières supplémentaires si c'est possible.</p>
                </div>
                <div class="task-points">
                    <strong>5 points</strong>
                </div>
            </label>
        </div>
        <div class="task-card">
            <input type="checkbox" id="tache2">
            <label for="tache2">
                <div class="task-header">
                    <strong>Cours informatique IA</strong> 
                    — 
                    <span class="categorie" id="Etudes">
                        <i class="fa-solid fa-school icon"></i>
                        Informatique
                    </span>
                </div>
                <div class="task-info">
                    <span class="heure">09:30</span> | <span class="jours">Lun Jeu</span>
                </div>
                <div class="task-desc">
                    <p>jhhjhjhfjhjhjhjhjhjhfgfgfgfgjh</p>
                </div>
                <div class="task-points">
                    <strong>5 points</strong>
                </div>
            </label>
        </div>
        <div class="task-card">
            <input type="checkbox" id="tache3">
            <label for="tache3">
                <div class="task-header">
                    <strong>cours d'anglais</strong> 
                    — 
                    <span class="categorie" id="langue">
                        <i class="fa-solid fa-language"></i>
                        Langue
                    </span>
                </div>
                <div class="task-info">
                    <span class="heure">14:30</span> | <span class="jours">Dim Mer</span>
                </div>
                <div class="task-desc">
                    <p>jhjhjhjhgfgfgsdsdertyijejh</p>
                </div>
                <div class="task-points">
                    <strong>3 points</strong>
                </div>
            </label>
        </div>
        <div class="task-card">
            <input type="checkbox" id="tache4">
            <label for="tache4">
                <div class="task-header">
                    <strong>cours d'anglais</strong> 
                    — 
                    <span class="categorie" id="langue">
                        <i class="fa-solid fa-language"></i>
                        Langue
                    </span>
                </div>
                <div class="task-info">
                    <span class="heure">18:30</span> | <span class="jours">Ven</span>
                </div>
                <div class="task-desc">
                    <p>jhjhjhjhgfgfgsdsdertyijejh</p>
                </div>
                <div class="task-points">
                    <strong>3 points</strong>
                </div>
            </label>
        </div>
    </main>    
    <?php include("includes/footer.php"); ?>
</body>
</html>