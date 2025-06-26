// Sélectionner toutes les cases à cocher ayant la classe .checkbox-tache
document.querySelectorAll('.checkbox-tache').forEach(function(checkbox) {
    // À chaque fois que l’utilisateur change l’état de la case, on lance une fonction.
    checkbox.addEventListener('change', function() {
        if (this.checked) {
            // On récupère :l’identifiant de la tâche (stocké dans data-id="...") et le type (stocké dans data-type="...")
            const tacheID = this.dataset.id;
            const tacheType = this.dataset.type;
            
            // envoyer une requête HTTP POST vers le fichier enregistrer_realisation_tache.php 
            fetch('\enregistrer_realisation_tache.php', {
                method: 'POST',
                headers: {
                    // indique le format des données envoyées (comme un formulaire classique).
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                // Envoie des données (le body de la requette)
                body: `id_tache=${tacheID}&type_tache=${tacheType}`
            })
            
            // Quand PHP a fini de traiter la requête, on récupère la réponse
            .then(response => response.text())
            // modification de l'affichage de la tache cochée dans la page dashboard
            .then(data => {
                console.log(data); // debug
                // styler la tâche cochée
                this.closest('.task-card').classList.add("done");
            })
            .catch(error => {
                alert("Erreur lors de l'enregistrement !");
                console.error(error);
            });
        }
    });
});