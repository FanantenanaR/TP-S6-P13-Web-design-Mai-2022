-- creation table utilisateurs--------------------------------------------------------------

create table utilisateurs (
    id serial primary key not null,
    nom varchar(100) not null,
    email varchar(255) not null,
    password varchar(255) not null,
    isActive smallint default 0 check (isActive >=0),
    isSuper smallint default 0 check (isSuper >=0)
);

-- insert simple utilisateur 

insert into utilisateurs (id, nom, email, password) values (
    1, 'Rakoto', 'rakoto@gmail.com', md5('rakotopass')
);

insert into utilisateurs (id, nom, email, password) values (
    2, 'Rasoa', 'rasoa@gmail.com', md5('rasoapass')
);

--insert simple utilisateur active

insert into utilisateurs (id, nom, email, password, isActive) values (
    3, 'Ravao', 'ravao@gmail.com', md5('ravaopass'), 1
);

-- insert super utilisateur

insert into utilisateurs (id, nom, email, password, isActive, isSuper) values (
    4, 'Rajao', 'rajao@gmail.com', md5('rajaosuperpass'), 1, 1
);


-- END -------------------------------------------------------------------------------------

--creation table emailSent

create table emailsent (
    id serial primary key not null,
    idUtilisateur int references utilisateurs(id),
    emaildestinataire varchar(255) not null,
    contenue varchar(255) DEFAULT '',
    dateheure timestamp default CURRENT_DATE
);

--insert 

INSERT INTO emailsent (idUtilisateur, emaildestinataire, contenue) values (
    3, 'ravao@gmail.com', 'Votre compte vient d etre activer, vous pouvez maintenant acceder au site via le login.'
);


INSERT INTO emailsent (idUtilisateur, emaildestinataire, contenue) values (
    3, 'ravao@gmail.com', 'Votre compte vient d etre activer, vous pouvez maintenant acceder au site via le login.'
);

-- END -------------------------------------------------------------------------------------

--creation view pour voir si email deja envoyer -----------------------------------------------

create or replace view viewutilisateursmailsent as 
    select utilisateurs.id,
        COUNT(emailsent.*) as nombreemailsent
    from utilisateurs
    left join emailsent on emailsent.idUtilisateur = utilisateurs.id
    GROUP BY utilisateurs.id;

create or replace view viewutilisateurs as
    select utilisateurs.*,
        CASE WHEN viewutilisateursmailsent.nombreemailsent > 0 THEN 1 ELSE 0 end as isemailsent,
        viewutilisateursmailsent.nombreemailsent
    from utilisateurs
    join viewutilisateursmailsent
        on viewutilisateursmailsent.id = utilisateurs.id;

-- END -------------------------------------------------------------------------------------

--creation table unite

create table unite (
    id serial primary key not null,
    nom varchar(10) not null,
    diminutif varchar(5) not null,
    convertgramme double precision default 1 check (convertgramme >= 0)
);

--insert 

insert into unite (id, nom, diminutif, convertgramme) values(
    1, 'Kilogramme', 'Kg', 1000
);

insert into unite (id, nom, diminutif, convertgramme) values(
    2, 'Gramme', 'g', 1
);

insert into unite (id, nom, diminutif, convertgramme) values(
    3, 'Litre', 'l', 1000
);


-- END -------------------------------------------------------------------------------------

--creation table matiere premiere -----------------------------------------------

create table matierepremiere (
    id serial primary key not null,
    nom varchar(50) not null,
    idunite int references unite(id),
    seuilperunite double precision DEFAULT 0 CHECK (seuilperunite >= 0)
);

insert into matierepremiere (id, nom, idunite, seuilperunite) values (
    1, 'Lait', 3, 0
);

insert into matierepremiere (id, nom, idunite, seuilperunite) values (
    2, 'Sucre', 1, 10
);

insert into matierepremiere (id, nom, idunite, seuilperunite) values (
    3, 'Parfum', 3, 0
);

insert into matierepremiere (id, nom, idunite, seuilperunite) values (
    4, 'Conservateur', 3, 0
);

insert into matierepremiere (id, nom, idunite, seuilperunite) values (
    5, 'Colorant', 3, 0
);

insert into matierepremiere (id, nom, idunite, seuilperunite) values (
    6, 'Fruit', 1, 0
);

-- END -------------------------------------------------------------------------------------

-- Creation view matierepremieredetails ----------------------------------------------------------

create view matierepremieredetails as
    select matierepremiere.*,
        unite.nom as unitenom,
        unite.diminutif as unitediminutif,
        unite.convertgramme as uniteconvertgramme
    from matierepremiere 
    join unite on unite.id = matierepremiere.idunite;

-- END -------------------------------------------------------------------------------------

-- Creation table mouvement ----------------------------------------------------------------
-- NOTE: action: -2 mihoatra, -1 perte, 0 constat, 1 entree, 2 sortie, 3 perte

create table mouvementstock (
    id serial primary key not null,
    idmatierepremiere int references matierepremiere(id),
    quantiteentre double precision default 0,
    quantitesortie double precision default 0,
    prix double precision default 0,
    valeur double precision default 0,
    action smallint default 0,
    raison varchar(100) NOT NULL,
    dateheure timestamp default CURRENT_DATE
);

-- insert, initialisation de stock

insert into mouvementstock (id, idmatierepremiere, quantiteentre, prix, valeur, action, raison) values (
    1, 1, 60, 3000, 60*3000, 0, 'Initialisation du stock de lait'
);

insert into mouvementstock (id, idmatierepremiere, quantiteentre, prix, valeur, action, raison) values (
    2, 2, 11, 2600, 11*2600, 0, 'Initialisation du stock de sucre'
);

insert into mouvementstock (id, idmatierepremiere, quantiteentre, prix, valeur, action, raison) values (
    3, 3, 2, 5000, 2*5000, 0, 'Initialisation du stock de parfum'
);

insert into mouvementstock (id, idmatierepremiere, quantiteentre, prix, valeur, action, raison) values (
    4, 4, 10, 8000, 10*8000, 0, 'Initialisation du stock de conservateur'
);

insert into mouvementstock (id, idmatierepremiere, quantiteentre, prix, valeur, action, raison) values (
    5, 5, 6, 3100, 6*3100, 0, 'Initialisation du stock de colorant'
);

insert into mouvementstock (id, idmatierepremiere, quantiteentre, prix, valeur, action, raison) values (
    6, 6, 20, 3500, 20*3500, 0, 'Initialisation du stock de fruit'
);



-- creation view get date last constatation de stock
create view datelastconstatationstock as 
    select idmatierepremiere,
            max(dateheure) as dateheure
        from mouvementstock where action = 1
        group by idmatierepremiere;


-- END -------------------------------------------------------------------------------------

-- creation view etatstock 
create or replace view etatstock as
    select 
        mouvementstock.idmatierepremiere,
        SUM(mouvementstock.quantiteentre - mouvementstock.quantitesortie) as quantitestock,
        AVG(mouvementstock.prix) as prixunitairemoyenne
    from datelastconstatationstock
    join mouvementstock 
        on mouvementstock.dateheure >= datelastconstatationstock.dateheure 
        and mouvementstock.idmatierepremiere = datelastconstatationstock.idmatierepremiere
    GROUP BY mouvementstock.idmatierepremiere;

create or replace view etatstockdetails as 
    select 
        matierepremieredetails.*,
        etatstock.quantitestock,
        datelastconstatationstock.dateheure as lastchecked,
        etatstock.prixunitairemoyenne,
        etatstock.quantitestock * etatstock.prixunitairemoyenne as valeurmoyenne
    from etatstock
    join matierepremieredetails on matierepremieredetails.id = etatstock.idmatierepremiere
    join datelastconstatationstock on datelastconstatationstock.idmatierepremiere = etatstock.idmatierepremiere;