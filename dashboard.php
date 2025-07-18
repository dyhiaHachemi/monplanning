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
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
    <?php include("includes/header.php"); ?>
    <main>
        <h1>Liste des taches pour aujourd'hui</h1>
        <?php
            // Obtenir le jour actuel (ex: "Mon", "Tue", ...)
            $jour_court = date("D");
            $date_auj = date("Y-m-d");

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
            $jour_aujourdhui = $jours_fr[$jour_court];

            // Récupérer les ID des tâches déjà réalisées aujourd’hui
            $realisees = [];
            $sql_real = $conn->prepare("SELECT id_tache FROM tache_realisee WHERE type_tache = 'recurrente' AND date_realisation = ?");
            $sql_real->bind_param("s", $date_auj);
            $sql_real->execute();
            $res_real = $sql_real->get_result();
            while ($row_real = $res_real->fetch_assoc()) {
                $realisees[] = $row_real['id_tache'];
            }
            $sql_real->close();

            // Récupérer les tâches récurrentes + catégories
            $result = $conn->query("
                SELECT tr.*, c.nom AS nom_categorie, c.couleur, c.icone
                FROM tache_recurrente tr
                JOIN categorie c ON tr.id_categorie = c.id_categorie
            ");

            // Tâches accomplies aujourd’hui
            $stmt = $conn->prepare("SELECT COUNT(*) FROM tache_realisee WHERE type_tache = 'recurrente' AND date_realisation = ?");
            $stmt->bind_param("s", $date_auj);
            $stmt->execute();
            $stmt->bind_result($tachesRealisees);
            $stmt->fetch();
            $stmt->close();
            $conn->close();

            if ($result->num_rows > 0){
                $totalTaches = 0;
                while ($row = $result->fetch_assoc()) {
                    $jours = explode(",", $row['jours']);
                    if (in_array($jour_aujourdhui, $jours)) {
                        $totalTaches++;
                        $id_tache = $row['id_tache_recurrente'];
                        $est_realisee = in_array($id_tache, $realisees);
        ?>
        <div class="task-card <?= $est_realisee ? 'realisee' : '' ?>">
            <input 
                type="checkbox" 
                id="tache<?= $id_tache ?>" 
                class="checkbox-tache" 
                data-id="<?= $id_tache ?>" 
                data-type="recurrente"
                <?= $est_realisee ? 'checked' : '' ?>
            >
            <label for="tache<?= $id_tache ?>">
                <div class="task-header">
                    <strong><?= $row['titre'] ?></strong> — 
                    <span class="categorie" style="background-color: <?= $row['couleur']; ?>">
                        <i class="fa-solid <?= $row['icone']; ?>"></i>
                        <?= $row['nom_categorie']; ?>
                    </span>
                </div>
                <div class="task-info">
                    <span class="heure"><?= $row['heure'] ?></span> | 
                    <span class="jours"><?= $row['jours'] ?></span>
                </div>
                <div class="task-desc">
                    <p><?= $row['description_tache'] ?></p>
                </div>
                <div class="task-points">
                    <strong><?= $row['points'] ?> points</strong>
                </div>
            </label>
        </div>
        <?php 
                }
            }
        ?>
        <!-- Résumé de la journée ici -->
        <div class="resume-jour">
            <h2>Résumé de la journée</h2>
            <p>
                <i class="fa-solid fa-square-check"></i>
                <?php echo $tachesRealisees; ?> / <?php echo $totalTaches; ?> tâches accomplies
            </p>
            <?php
                // Calcul du taux de réussite
                $taux = ($totalTaches > 0) ? round(($tachesRealisees / $totalTaches) * 100) : 0;
            ?>
            <p>Taux de réussite : <?php echo $taux; ?> %</p>
        </div>

        <?php
        } else {
            echo "<p style='text-align: center; margin-top: 20px;'>Aucune tâche prévue aujourd’hui.</p>";
        }
        ?>

    </main>    
    <?php include("includes/footer.php"); ?>
    <script src="assets/js/enregistrer_realisation_tache.js"></script>
</body>
</html>
