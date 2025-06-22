-- Base de données : planning_db

-- Table : tache_recurrente
create table tache_recurrente (
    id_tache_recurrente int AUTO_INCREMENT PRIMARY KEY NOT NULL,
    titre varchar(255) NOT NULL,
    description_tache TEXT,
    jours varchar(20) NOT NULL, 
    heure TIME, 
    categorie varchar(50), 
    points int DEFAULT 0
 );
-- Table : tache_ponctuelle
create table tache_ponctuelle (
    id_tache_ponctuelle int AUTO_INCREMENT PRIMARY KEY NOT NULL,
    titre varchar(255) NOT NULL,
    date_tache date NOT NULL, 
    heure_tache TIME, 
    categorie varchar(50), 
    points int DEFAULT 0
 );

-- Table : tache_realisee
create table tache_realisee (
    id_tache_realisee int AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_tache int NOT NULL,
    type_tache ENUM('recurrente', 'ponctuelle') NOT NULL,
    date_realisation date NOT NULL, 
    accomplie boolean DEFAULT FALSE 
 );

-- Table : journal_hebdomadaire
create table journal_hebdomadaire (
    id int AUTO_INCREMENT PRIMARY KEY NOT NULL,
    semaine varchar(10) NOT NULL,
    total_points int DEFAULT 0, 
    taux_succès float DEFAULT 0, 
    date_eval date NOT NULL
 );

-- Table : niveau
create table niveau (
    niveau INT PRIMARY KEY,
    seuil_points int not null, 
    titre varchar(50)
 );