create table categorie (
    id int primary key not null auto_increment,
    nom varchar(50) default '',
    image varchar(50) default 'default-article-image.jpg',
    urlcategorie varchar(50) default 'No Url setted'
);

create table article (
    id int primary key not null auto_increment,
    titre varchar(120) default 'No Title setted.',
    image varchar(255) default 'default-article-image.jpg',
    description varchar(255) default '',
    datepubli datetime default NOW(),
    datemodif datetime default NOW(),
    urlarticle varchar(255) default 'No Url setted.'
);

create table tag (
    id int primary key not null auto_increment,
    idcategorie int not null references categorie(id) on delete cascade,
    idarticle int not null references article(id) on delete cascade
);

create table contenue (
    id int primary key not null auto_increment,
    idarticle int references article (id) on delete cascade,
    titre varchar(100) default 'No Title setted.',
    image varchar(100) default '',
    descriimage varchar(100) default '',
    emplacementimage smallint default 0 check (emplacementimage >=0),
    texte varchar(255) default '',
    typecontenue smallint default 0 check (typecontenue>=0),
    urlcontenue varchar(20) default '',
    datemodification datetime default now(),
    datecreation datetime default now(),
    ordre smallint default 1 check (ordre>0)
);

create or replace view varticle as
    select article.id,
            article.titre,
            article.image,
            article.description,
            article.datemodif,
            article.datepubli,
            article.urlarticle,
        group_concat(categorie.nom SEPARATOR ', ') as nomcategorie,
        group_concat(categorie.id SEPARATOR ';;') as idcategorie
    from article 
        left join tag on tag.idarticle = article.id
        join categorie on tag.idcategorie = categorie.id;

create view varticle3lastest as 
    select *
    from varticle
    order by datepubli DESC
    limit 3;


