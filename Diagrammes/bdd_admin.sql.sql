#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


CREATE TABLE Programme(
        IdProgramme int (11) Auto_increment  NOT NULL ,
        Duree       Int ,
        PRIMARY KEY (IdProgramme )
)ENGINE=InnoDB;


CREATE TABLE Langue(
        Abrv Varchar (3) NOT NULL ,
        Nom  Varchar (30) ,
        PRIMARY KEY (Abrv )
)ENGINE=InnoDB;


CREATE TABLE Personne(
        IdPersonne int (11) Auto_increment  NOT NULL ,
        Nom        Varchar (25) ,
        Prenom     Varchar (25) ,
        PRIMARY KEY (IdPersonne )
)ENGINE=InnoDB;


CREATE TABLE Informations(
        Nom         Varchar (25) ,
        Resume      Varchar (300) ,
        Genre       Varchar (25) ,
        Type        Varchar (25) ,
        IdProgramme Int NOT NULL ,
        Abrv        Varchar (3) NOT NULL ,
        PRIMARY KEY (IdProgramme ,Abrv )
)ENGINE=InnoDB;


CREATE TABLE Role(
        Role        Varchar (25) ,
        Nom         Varchar (25) ,
        IdProgramme Int NOT NULL ,
        IdPersonne  Int NOT NULL ,
        Abrv        Varchar (3) NOT NULL ,
        PRIMARY KEY (IdProgramme ,IdPersonne ,Abrv )
)ENGINE=InnoDB;


CREATE TABLE Pays(
        Nom         Varchar (25) ,
        Abrv        Varchar (3) NOT NULL ,
        Abrv_Langue Varchar (3) NOT NULL ,
        PRIMARY KEY (Abrv ,Abrv_Langue )
)ENGINE=InnoDB;


CREATE TABLE Demander(
        IdProgramme Int NOT NULL ,
        Abrv        Varchar (3) NOT NULL ,
        PRIMARY KEY (IdProgramme ,Abrv )
)ENGINE=InnoDB;

ALTER TABLE Informations ADD CONSTRAINT FK_Informations_IdProgramme FOREIGN KEY (IdProgramme) REFERENCES Programme(IdProgramme);
ALTER TABLE Informations ADD CONSTRAINT FK_Informations_Abrv FOREIGN KEY (Abrv) REFERENCES Langue(Abrv);
ALTER TABLE Role ADD CONSTRAINT FK_Role_IdProgramme FOREIGN KEY (IdProgramme) REFERENCES Programme(IdProgramme);
ALTER TABLE Role ADD CONSTRAINT FK_Role_IdPersonne FOREIGN KEY (IdPersonne) REFERENCES Personne(IdPersonne);
ALTER TABLE Role ADD CONSTRAINT FK_Role_Abrv FOREIGN KEY (Abrv) REFERENCES Langue(Abrv);
ALTER TABLE Pays ADD CONSTRAINT FK_Pays_Abrv FOREIGN KEY (Abrv) REFERENCES Langue(Abrv);
ALTER TABLE Pays ADD CONSTRAINT FK_Pays_Abrv_Langue FOREIGN KEY (Abrv_Langue) REFERENCES Langue(Abrv);
ALTER TABLE Demander ADD CONSTRAINT FK_Demander_IdProgramme FOREIGN KEY (IdProgramme) REFERENCES Programme(IdProgramme);
ALTER TABLE Demander ADD CONSTRAINT FK_Demander_Abrv FOREIGN KEY (Abrv) REFERENCES Langue(Abrv);
