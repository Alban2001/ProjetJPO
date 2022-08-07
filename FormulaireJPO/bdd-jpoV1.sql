DROP DATABASE IF EXISTS `bdd-jpoV1-AV-LL`;

CREATE DATABASE `bdd-jpoV1-AV-LL`;

USE `bdd-jpoV1-AV-LL`;


CREATE TABLE `ETABLISSEMENT`(
codeEtablissement INTEGER NOT NULL AUTO_INCREMENT,
nomEtablissement VARCHAR(50) NOT NULL,
villeEtablissement VARCHAR(50) NOT NULL,
CONSTRAINT pk_codeEtablissement PRIMARY KEY(codeEtablissement)
);

CREATE TABLE `SPECIALITE`(
codeSpecialite VARCHAR(20) NOT NULL,
nomSpecialite VARCHAR(20) NOT NULL,
CONSTRAINT pk_codeSpecialite PRIMARY KEY(codeSpecialite)
);

CREATE TABLE `FORMATION`(
sigleFormation VARCHAR(20) NOT NULL,
nomFormation VARCHAR(100) NOT NULL,
CONSTRAINT pk_formation PRIMARY KEY(sigleFormation)
);

CREATE TABLE `OPTIONS`(
codeOptions INTEGER NOT NULL AUTO_INCREMENT,
nomOptions VARCHAR(20) NULL,
codeSpecialite VARCHAR(20) NOT NULL,
CONSTRAINT pk_codeOptions PRIMARY KEY(codeOptions),
CONSTRAINT fk_codeSpecialiteOptions FOREIGN KEY(codeSpecialite) REFERENCES SPECIALITE(codeSpecialite)
);

CREATE TABLE `VISITEUR`(
codeVisiteur INTEGER NOT NULL AUTO_INCREMENT,
nomVisiteur VARCHAR(25) NOT NULL,
prenomVisiteur VARCHAR(25) NOT NULL,
codeEtablissement INTEGER NOT NULL,
codeSpecialite VARCHAR(20) NOT NULL,
codeOptions INTEGER NOT NULL,
CONSTRAINT pk_visiteur PRIMARY KEY(codeVisiteur),
CONSTRAINT fk_codeEtablissement FOREIGN KEY(codeEtablissement) REFERENCES ETABLISSEMENT(codeEtablissement),
CONSTRAINT fk_codeSpecialite FOREIGN KEY(codeSpecialite) REFERENCES SPECIALITE(codeSpecialite),
CONSTRAINT fk_codeOptions FOREIGN KEY(codeOptions) REFERENCES OPTIONS(codeOptions)
);

CREATE TABLE `VISITER`(
codeVisiteur INTEGER NOT NULL,
sigleFormation VARCHAR(20) NOT NULL,
interetEleveFormation VARCHAR(3) NOT NULL,
autresFormation VARCHAR(3) NOT NULL,
CONSTRAINT pk_visiter PRIMARY KEY(codeVisiteur, sigleFormation),
CONSTRAINT fk_visiteur FOREIGN KEY(codeVisiteur) REFERENCES VISITEUR(codeVisiteur),
CONSTRAINT fk_formation FOREIGN KEY(sigleFormation) REFERENCES FORMATION(sigleFormation)
);


INSERT INTO `formation`
VALUES ("BTS SAM", "Support action managériale"), ("BTS CI", "Commerciale International"), ("BTS CG", "Comptabilité et Gestion"), ("BTS GPME", "Gestion de la PME"),
	   ("BTS COM", "Communication"), ("BTS SIO", "Services Informatiques aux Organisations"), ("BTS BCC","Banque - conseiller de clientèle"), 
	   ("BTS MCO", "Management Commercial Opérationnel"), ("PREPA ECT", "Économique et commerciale Option_technologique"), 
	   ("PREPA ECP", "Économique et commerciale Option_technologique_voie professionnelle"), ("PREPA ATS", "Adaptation Technicien Supérieur"), 
	   ("PREPA ENS Cachan", "École Normale Supérieure"), ("DCG", "Diplôme de Comptabilité et Gestion");
