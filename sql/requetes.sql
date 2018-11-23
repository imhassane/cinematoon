-- 1
INSERT INTO t_utilisateur_usr
VALUES ('rimk', md5('rimk'));

INSERT INTO t_profil_prf (prf_nom, prf_prenom, usr_pseudo, prf_email, prf_valide, prf_statut, prf_date_aj)
VALUES ('now', 'rimk', 'rimk', 'rimk@gmail.com', 'D', 'M', now());

-- 2
SELECT * FROM t_utilisateur_usr WHERE usr_pseudo = 'rimk' AND usr_mpasse = md5('rimk');

-- 3
SELECT *
FROM t_profil_prf
WHERE usr_pseudo = 'rimk';

-- 4
SELECT prf_statut
FROM t_profil_prf
WHERE usr_nom = 'now' AND usr_prenom = 'rimk';

-- 5
UPDATE t_profil_prf
SET
    prf_nom = 'Rozuel',
    prf_prenom = 'Tanguy',
    prf_valide = 'V',
    prf_statut = 'M',
    prf_email = 'rozuel.tanguy@outlook.fr'
WHERE usr_pseudo = 'rimk';

-- 6
UPDATE t_utilisateur_usr
SET usr_mpasse = md5('tanguy')
WHERE usr_pseudo = 'rimk';

-- 7
SELECT *
FROM t_profil_prf
JOIN t_utilisateur_usr USING (usr_pseudo);

-- 8
UPDATE t_profil_prf
SET prf_valide = 'A'
WHERE usr_pseudo = 'rimk';

-- 9
UPDATE t_profil_prf
SET prf_valide = 'D'
WHERE usr_pseudo = 'rimk';

-- RECUPERATION DES DONNEES D'UN TAG
-- 10
SELECT *
FROM t_tag_tag
WHERE tag_numero = 1;

SELECT *
FROM t_hyperlien_hln
JOIN tj_tag_lien USING (tag_numero)
WHERE tag_numero = 1;

-- 11
SELECT *
FROM t_tag_tag
WHERE tag_label = '';

-- 12
INSERT INTO t_actualite_act(act_numero, act_titre, act_text, act_date_aj, act_etat, usr_pseudo)
VALUES (
    (SELECT MAX(act_numero) + 1 FROM t_actualite_act),
    "La saison 3 de The Last Kingdom disponible",
    "Dépuis ce Lundi 19 Novembre 2018, la sasion 3 de la série The Last kingdom est disponible dans notre cinéma.
    Vous pourrez la voir en 3D et en version originale. Elle est également disponible sur Netflix.", now(), "V", "rimk"
);

-- 13
SELECT *
FROM t_actualite_act
WHERE act_numero = (SELECT MAX(act_numero) FROM t_actualite_act);

-- 14
SELECT *
FROM t_actualite_act
JOIN t_profil_prf USING (usr_pseudo)
WHERE prf_statut = 'M';

-- 15
SELECT *
FROM t_actualite_act
JOIN t_profil_prf USING (usr_pseudo)
WHERE prf_statut = 'M'
ORDER BY act_date_aj DESC
LIMIT 5;

-- 16
UPDATE t_actualite_act
SET
    act_titre = '',
    act_text = '',
    act_numero = '',
    act_date_aj = NOW(),
WHERE act_numero = 3;

-- 17
DELETE
FROM t_actualite_act
WHERE act_numero = 3;

-- 18
UPDATE t_actualite_act
SET act_etat = 'C'
WHERE YEAR(NOW()) - YEAR(act_date_aj) > 5;

-- AJOUT D'UN SUJET
-- 19
INSERT INTO t_sujet_sjt
VALUES ();

-- 20
SELECT *
FROM t_sujet_sjt
JOIN t_tag_tag USING (sjt_numero)
LEFT JOIN tj_tag_lien USING (tag_numero)
LEFT JOIN t_hyperlien_hln USING (hln_numero);

-- 21
UPDATE t_sujet_sjt
SET
    sjt_intitule = '',
    sjt_date_aj = NOW()
WHERE sjt_numero = 1;

-- 22
DELETE
FROM t_sujet_sjt
WHERE sjt_numero = 3;

-- 23
SELECT *
FROM t_sujet_sjt
LEFT JOIN t_tag_tag USING (sjt_numero)
WHERE tag_numero IS NULL;

-- 24
SELECT *
FROM t_tag_tag
WHERE sjt_numero = 1;

-- 25
INSERT INTO t_tag_tag
VALUES (7, "", "", "", "", 4);

-- 26
DELETE
FROM t_tag_tag
WHERE tag_numero = 7;

-- 27
UPDATE t_tag_tag
SET
    tag_label = "",
    tag_contenu = "",
    tag_image = "",
    tag_etat = ""
WHERE tag_numero = 7;

-- 28
DELETE
FROM t_tag_tag
WHERE sjt_numero = 4;

-- 29
DELETE
FROM t_sujet_sjt
WHERE sjt_numero IN
(
    SELECT sjt_numero
    FROM t_sujet_sjt
    LEFT JOIN t_tag_tag USING (sjt_numero)
    WHERE tag_numero IS NULL
);

-- 30
UPDATE t_tag_tag
SET
    tag_etat = 'D'
WHERE tag_numero = 7;

-- 31
UPDATE t_tag_tag
SET
    tag_etat = 'D'
WHERE tag_numero IN (
    SELECT tag_numero
    FROM t_tag_tag
    JOIN t_sujet_sjt USING (sjt_numero)
    JOIN t_utilisateur_usr USING (usr_pseudo)
    WHERE usr_pseudo = 'jean'
);

-- 32
SELECT DISTINCT hln_nom, hln_url
FROM t_hyperlien_hln;

-- 33
SELECT *
FROM t_tag_tag
JOIN tj_tag_lien USING (tag_numero)
JOIN t_hyperlien_hln USING (hln_numero);

-- 34
SELECT *
FROM t_hyperlien_hln
JOIN tj_tag_lien USING (hln_numero)
WHERE tag_numero = 2;

-- 35
SELECT *
FROM t_tag_tag
LEFT JOIN tj_tag_lien USING (tag_numero)
WHERE hln_numero IS NULL;

-- 36
SELECT *
FROM t_hyperlien_hln
WHERE hln_nom = "Acces cinéma liberté";

-- 37
SELECT *
FROM t_hyperlien_hln
LEFT JOIN tj_tag_lien USING (hln_numero)
WHERE tag_numero IS NULL;

-- 38
INSERT INTO t_hyperlien_hln
VALUES (1, "Acces cinéma liberté", "http://www.multiplexeliberte.fr/accessibilite/");

INSERT INTO tj_tag_lien
VALUES (2, 1);

-- 39
DELETE
FROM tj_tag_lien
WHERE hln_numero = (SELECT hln_numero FROM t_hyperlien_hln WHERE hln_nom="Acces cinéma liberté");

DELETE 
FROM t_hyperlien_hln
WHERE hln_nom="Acces cinéma liberté";

