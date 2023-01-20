/**
TABLES Articles - SESSION 2 - TP2
**/
CREATE TABLE s2tp2_articles(
    id SMALLINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(150) NOT NULL,
    date date NOT NULL,
    texte VARCHAR(7000),
    visuel VARCHAR(30),
    idJournaliste VARCHAR(10) NOT NULL,
    rubrique VARCHAR(20) NOT NULL,
    FOREIGN KEY(idJournaliste) REFERENCES s2tp2_journalistes(identifiant),
    FOREIGN KEY(rubrique) REFERENCES s2tp2_rubriques(rubrique)
);
CREATE TABLE s2tp2_journalistes(
    identifiant VARCHAR(10) PRIMARY KEY,
    motDePasse VARCHAR(200) NOT NULL,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL
);
CREATE TABLE s2tp2_rubriques(
    rubrique VARCHAR(20) PRIMARY KEY
);
