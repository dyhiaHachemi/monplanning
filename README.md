# 📅 Mon Planning Hebdomadaire

Ce projet est une application web personnelle de gestion de tâches quotidiennes récurrentes, développée dans le but de m'aider à m'organiser efficacement durant mes vacances et au-delà.

---

## 🧠 Objectif du projet

> **Planifie avec sagesse, agis avec constance, et laisse Allah bénir ton effort.**

L'application permet de :
- Créer des tâches hebdomadaires personnalisées
- Cocher les tâches accomplies chaque jour
- Voir une liste filtrée selon le jour actuel
- Suivre un résumé quotidien du taux de réalisation

---

## 🛠️ Technologies utilisées

- HTML / CSS (avec une palette douce personnalisée)
- PHP (programmation côté serveur)
- MySQL (base de données)
- JavaScript (pour l'interaction dynamique des tâches)
- Font Awesome (icônes)
- WAMP (en local)

---

## 📂 Structure du projet

/monplanning
│
├── index.php # Page d'accueil
├── dashboard.php # Affichage dynamique des tâches du jour
├── ajout_tache.php # Formulaire d'ajout de tâche
├── apropos.php # Présentation du projet
├── favicon.ico
│
├── includes/
│ ├── header.php
│ └── footer.php
│ └── db.php
│
├── assets/
│ ├── css/
│ │ ├── style.css
│ │ ├── dashboard.css
│ │ └── index.css
│ │ ├── ajouter_tache.css
│ │ ├── header.css
│ │ └── apropos.css
│ ├── js/
│ │ ├── enregistrer_realisation_tache.js
|
└── database
  ├── init.sql # Script de création de la base de données


---

## 🧪 Fonctionnalités principales

- ✅ Création de tâches récurrentes avec titre, description, heure, jours, points, catégorie
- ✅ Affichage dynamique des tâches selon le jour
- ✅ Système de coche (enregistrement en base + style conditionnel)
- ✅ Persistance des tâches accomplies même après rafraîchissement
- ✅ Résumé journalier : nombre de tâches réussies / totales

---

## 💻 Installation en local

1. Cloner ce dépôt dans le dossier `www` de WAMP :
   ```bash
   git clone https://github.com/votre-utilisateur/mon-planning.git
2. Importer la base de données :

    Ouvrir phpMyAdmin

    Créer une base nommée planning_db

    Importer le fichier init.sql

3. Démarrer WAMP et accéder à :

http://localhost/mon-planning/index.php
