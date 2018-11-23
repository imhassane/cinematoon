-- PREPARATION DES REQUETES SQL-DML POUR L'APPLICATION WEB
-- Exo 1.
UPDATE t_profil_prf
SET prf_valide = 'D' WHERE usr_pseudo='jean';

-- Exo 2.
DELETE FROM t_profil_prf WHERE usr_pseudo='jean';
DELETE FROM t_utilisateur_usr WHERE usr_pseudo='jean';

-- Exo 3.
UPDATE t_profil_prf
SET prf_nom = 'Courtois' WHERE usr_pseudo = 'chris';

-- Exo 4.
SELECT prf_nom, prf_prenom, prf_statut
FROM t_profil_prf
ORDER BY prf_nom;

-- Exo 5.
SELECT prf_nom, prf_prenom, prf_email
FROM t_profil_prf
WHERE prf_statut = 'M'
ORDER BY prf_prenom DESC;

-- Exo 6.
SELECT prf_nom, prf_prenom, prf_valide
FROM t_profil_prf
WHERE prf_nom LIKE '%u%' OR prf_prenom LIKE '%u%';

-- Exo 7.
SELECT prf_nom, prf_prenom, prf_statut
FROM t_profil_prf
ORDER BY prf_statut;

-- Exo 8.
SELECT prf_nom, prf_prenom
FROM t_profil_prf
WHERE YEAR(prf_date_aj) = 2016;

-- Exo 9;
SELECT act_numero, act_text
FROM t_actualite_act
WHERE act_numero = (SELECT MAX(act_numero) FROM t_actualite_act);

-- Exo 10.


-- Exo 11.
SELECT *
FROM t_sujet_sjt
WHERE YEAR(sjt_date_sjt) BETWEEN 2016 AND 2018;

-- Exo 12.
SELECT COUNT(prf_nom) FROM t_profil_prf WHERE prf_statut = 'M';
SELECT COUNT(prf_nom) FROM t_profil_prf WHERE prf_statut = 'G';

-- Exo 13.
SELECT DISTINCT prf_statut
FROM t_profil_prf;

-- Exo 14.
SELECT *
FROM t_utilisateur_usr
WHERE usr_pseudo='jean' AND usr_mpasse=MD5('jean');

-- Exo 15.
UPDATE t_utilisateur_usr
SET usr_mpasse=MD5('jean')
WHERE usr_pseudo = (
    SELECT usr_pseudo
    FROM t_profil_prf
    WHERE LOWER(prf_nom)='bosh' AND LOWER(prf_prenom)='chris'
);

