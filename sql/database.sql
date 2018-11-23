CREATE TABLE t_utilisateur_usr (
usr_pseudo  VARCHAR(50) PRIMARY KEY,
usr_mpasse  VARCHAR(50) NOT NULL
) engine=InnoDB;

CREATE TABLE t_profil_prf (
prf_nom  VARCHAR(20),
prf_prenom  VARCHAR(50),
prf_email  VARCHAR(250) UNIQUE NOT NULL,
prf_valide CHAR(1),
prf_statut  CHAR(1),
prf_date_aj DATETIME NOT NULL,
usr_pseudo VARCHAR(50) PRIMARY KEY
) engine=InnoDB;

CREATE TABLE t_actualite_act (
act_numero INTEGER PRIMARY KEY,
act_titre VARCHAR(250),
act_text TEXT,
act_date_aj DATETIME NOT NULL,
act_etat CHAR(1),
usr_pseudo VARCHAR(50)
) engine=InnoDB;

CREATE TABLE t_sujet_sjt (
sjt_numero INTEGER PRIMARY KEY,
sjt_intitule VARCHAR(250),
sjt_date_aj DATETIME NOT NULL,
usr_pseudo VARCHAR(50)
) engine=InnoDB;

CREATE TABLE t_tag_tag (
tag_numero INTEGER PRIMARY KEY,
tag_label  VARCHAR(250),
tag_contenu TEXT,
tag_image VARCHAR(250),
tag_etat CHAR(1),
sjt_numero INTEGER
) engine=InnoDB;

CREATE TABLE t_hyperlien_hln (
hln_numero INTEGER PRIMARY KEY,
hln_nom  VARCHAR(250),
hln_url  VARCHAR(250)
) engine=InnoDB;

CREATE TABLE tj_tag_lien (
tag_numero INTEGER,
hln_numero INTEGER
) engine=InnoDB;

ALTER TABLE tj_tag_lien ADD CONSTRAINT pk_tag_hln PRIMARY KEY (tag_numero, hln_numero);

-- CREATION DES CLES ETRANGERES.
-- Pour le pseudo de l'utilisateur.
ALTER TABLE t_actualite_act ADD CONSTRAINT fk_usr_pseudo FOREIGN KEY (usr_pseudo) REFERENCES t_utilisateur_usr (usr_pseudo);
ALTER TABLE t_profil_prf ADD CONSTRAINT fk_prf_pseudo FOREIGN KEY (usr_pseudo) REFERENCES t_utilisateur_usr (usr_pseudo);
ALTER TABLE t_sujet_sjt  ADD CONSTRAINT fk_sjt_pseudo FOREIGN KEY (usr_pseudo) REFERENCES t_utilisateur_usr (usr_pseudo);

-- Pour le numero du sujet.
ALTER TABLE t_tag_tag ADD CONSTRAINT fk_sjt_numero FOREIGN KEY (sjt_numero) REFERENCES t_sujet_sjt (sjt_numero);

-- Pour les tags et les liens.
ALTER TABLE tj_tag_lien ADD CONSTRAINT fk_tag_tag  FOREIGN KEY (tag_numero) REFERENCES t_tag_tag (tag_numero);
ALTER TABLE tj_tag_lien ADD CONSTRAINT fk_tag_lien FOREIGN KEY (hln_numero) REFERENCES t_hyperlien_hln (hln_numero);

-- Jeu de données

INSERT INTO t_utilisateur_usr (usr_pseudo, usr_mpasse) VALUES
('imhassane', MD5('imhassane'),
('jean', MD5('jean')),
('chris', MD5('chris')),
('malik', MD5('malik')),
('thibault', MD5('thibault')),
('marc', MD5('marc')),
('alpha', MD5('alpha'));

INSERT INTO t_profil_prf (prf_nom, prf_prenom, prf_email, prf_valide, prf_statut, prf_date_aj, usr_pseudo) VALUES
('Sow', 'Thierno Hassane', 'thsow.pro@gmail.com', 'A', 'M', CURRENT_DATE(), 'imhassane'),
('Pema', 'Jean', 'jean@yahoo.com', 'A', 'M', CURRENT_DATE(), 'jean'),
('Bosh', 'Chris', 'chris@yahoo.com', 'A', 'M', CURRENT_DATE(), 'chris'),
('Musa', 'Thibault', 'thibault@yahoo.com', 'A', 'M', CURRENT_DATE(), 'thibault'),
('Barry', 'ALpha', 'alpha@yahoo.com', 'A', 'M', CURRENT_DATE(), 'alpha'),
('Jean', 'Marc', 'marc@yahoo.com', 'A', 'M', CURRENT_DATE(), 'marc'),
('Mejri', 'Malik', 'malik@yahoo.com', 'A', 'M', CURRENT_DATE(), 'malik');


INSERT INTO t_sujet_sjt (sjt_numero, sjt_intitule, sjt_date_aj, usr_pseudo) VALUES
(1, 'Place cinéma', CURRENT_DATE(), 'imhassane'),
(2, 'Film', CURRENT_DATE(), 'imhassane'),
('3', 'Boutique du cinéma', CURRENT_DATE(), 'jean');

INSERT INTO t_tag_tag (tag_numero, tag_label, tag_contenu, tag_image, tag_etat, sjt_numero) VALUES
(1, "Réserver sa place en ligne", "Grâce au service de vente en ligne vous pouvez acheter et éditer votre e-billet de chez vous.\nIl vous suffira de présenter une édition papier de votre e-billet ou même votre téléphone (ouvrez la pièce jointe reçue avec le mail de réservation) directement au contrôle des billets, avant l\'accès en salle, sans avoir à passer par les caisses.\nAttention tout de même de ne pas arriver à la dernière minute. Votre e-billet garantit votre place dans la salle, mais pas le fauteuil. \r\nN\'OUBLIEZ PAS...\r\nLes justificatifs de réduction ou d\'âge, pour les films marqués d\'une interdiction, seront demandés lors de l\'accès à la salle.", "https://images.pexels.com/photos/109669/pexels-photo-109669.jpeg?cs=srgb&dl=architecture-auditorium-chairs-109669.jpg&fm=jpg", 'A', 1),
(2, "Réserver sa place à l\'accueil", "Vous pouvez acheter votre place à l\'accueil du cinéma, il vous suffit de venir muni d\'un moyen de paiement (espèces, carte bancaire, chèque). N\'arrivez surtout pas à la dernière minute car vous risquez d\'avoir une mauvaise place, l\'achat d\'un ticket vous garantit l\'accès à la salle, pas la place.", "https://www.cgrcinemas.fr/montauban/fichier/image/cap-cinema-Montauban-sd-1604074501-S-6436B.jpg", '1', 1),
(3, "Catégorie de films", "Les différentes catégories de films sont disponibles en ligne.\nSelon votre compagnie, il est impératif de choisir la catégorie du film, la catégorie jeunesse lorsque vous êtes en compagnie des enfants, la catégorie romantique lorsque vous êtes avec votre âme soeur et frisson pour défier vos peurs.", "https://www.filmsite.org/images/other-major-film-categories.jpg", "A", 2),
(4, "Voir un film en 3D", "Si un film est disponible en 3D vous pourrez le voir lors de l\'achat de votre ticket ou de votre réservation en ligne. Notez que les tarifs sont plus élévés et ces films sont souvent visibles après leur version normale, un peu plus tard.", "https://www.erenumerique.fr/wp-content/uploads/2016/07/3d-cin%C3%A9ma.jpg", "A", 2),
(5, "Les moyens de paiement acceptés à la boutique", "A la boutique du cinéma, les chèques sont acceptés ainsi que les paiements par carte bleu puis les règlements en espèce", "http://cine-arts-plaisance.fr/public/contenu/images/visuel-ccu3-300x300.png", "A", 3),
(6, "Vente de lunettes 3D", "Les lunettes 3D sont disponibles en vente à la boutique du cinéma pour un prix de 5€ à regler selon le moyen de paiement de votre choix (voir la liste des moyens de paiement acceptés).", "http://blog.lefigaro.fr/electronique/prod_contentEyewear.jpg", "A", 3);


INSERT INTO t_actualite_act (act_numero, act_titre, act_text, act_date_aj, act_etat, usr_pseudo) VALUES
(1, "Games of thrones disponible en Avril 2019", "HBO a juste publié le teaser de la derniere saison de Game Of thrones, la série reviendra en Avril 2019", CURRENT_DATE(), "A", "jean"),
(2, "X-Men Dark Phoenix", "La série X-Men Dark Phoenix a officiellement été annoncée pour Juin 2019 et sera disponible dans notre cinéma dès sa sortie", CURRENT_DATE(), "A", "imhassane");