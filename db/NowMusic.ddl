-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Fri Dec 29 20:25:09 2023 
-- * LUN file: C:\Users\Fabrizio\Documents\Base Dati\Base Dati Laboratorio\NowMusic.lun 
-- * Schema: NowMusic-Logico/1 
-- ********************************************* 


-- Database Section
-- ________________ 

create database NowMusic-Logico;
use NowMusic-Logico;


-- Tables Section
-- _____________ 

create table COMMENTO (
     Id_Commento varchar(100) not null,
     Testo varchar(500) not null,
     Timestamp_commento date not null,
     Id_utente varchar(100) not null,
     Id_post varchar(100) not null,
     constraint IDCOMMENTO_ID primary key (Id_Commento));

create table COMMUNITY (
     Id_communty varchar(100) not null,
     Categoria varchar(100) not null,
     Nome varchar(200) not null,
     UrlImmagine varchar(100) not null,
     Id_utente_fondatore varchar(100) not null,
     constraint IDCOMMUNITY primary key (Id_communty, Categoria));

create table FOLLOW (
     Id_utente_seguace varchar(100) not null,
     Id_utente_seeguito varchar(100) not null,
     constraint IDFOLLOW primary key (Id_utente_seguace, Id_utente_seeguito));

create table MI_PIACE (
     Id_utente varchar(100) not null,
     Id_post varchar(100) not null);

create table NOTIFICA (
     Id_Commento varchar(100),
     Id_risposta varchar(100),
     Id_notifica varchar(100) not null,
     Letta char not null,
     Timestamp_notifica date not null,
     NotificaFollow char not null,
     NotificaMiPiace char not null,
     NotificaPostCommunity char not null,
     NotificaCommento char not null,
     NotificaRispostaCommento char not null,
     Id_utente varchar(100) not null,
     Id_post varchar(100),
     Id_utente_seguace varchar(100),
     Id_utente_seeguito varchar(100),
     constraint FKGENERA_COMMENTO_NOTIFICA_ID unique (Id_Commento),
     constraint FKGENERA_RISPOSTA_NOTIFICA_ID unique (Id_risposta));

create table PARTECIPAZIONE (
     Id_communty varchar(100) not null,
     Categoria varchar(100) not null,
     Id_utente_partcipante varchar(100) not null,
     constraint IDPARTECIPAZIONE primary key (Id_communty, Categoria, Id_utente_partcipante));

create table POST (
     Id_post varchar(100) not null,
     Testo varchar(2000) not null,
     Timestamp date not null,
     PostImmagine char not null,
     Url varchar(200) not null,
     Tag varchar(100),
     Id_utente varchar(100) not null,
     Id_communty varchar(100),
     Categoria varchar(100),
     constraint IDPOST_ID primary key (Id_post));

create table RISPOSTA_COMMENTO (
     Id_risposta varchar(100) not null,
     Testo varchar(500) not null,
     Timestamp_risposta date not null,
     Id_utente varchar(100) not null,
     Id_Commento varchar(100) not null,
     constraint IDRISPOSTA_COMMENTO_ID primary key (Id_risposta));

create table UTENTE (
     Username char(15) not null,
     Password char(10) not null,
     Nome char(10) not null,
     Cognome char(20) not null,
     Email char(30) not null,
     Telefono char(20) not null,
     UrlImmagine char(50),
     Id_utente varchar(100) not null,
     Id_post_salvati varchar(100),
     constraint IDUTENTE primary key (Id_utente),
     constraint FKSALVA_ID unique (Id_post_salvati));


-- Constraints Section
-- ___________________ 

-- Not implemented
-- alter table COMMENTO add constraint IDCOMMENTO_CHK
--     check(exists(select * from NOTIFICA
--                  where NOTIFICA.Id_Commento = Id_Commento)); 

alter table COMMENTO add constraint FKCREAZIONE
     foreign key (Id_utente)
     references UTENTE (Id_utente);

alter table COMMENTO add constraint FKPOSSIEDE
     foreign key (Id_post)
     references POST (Id_post);

alter table COMMUNITY add constraint FKFONDAZIONE
     foreign key (Id_utente_fondatore)
     references UTENTE (Id_utente);

alter table FOLLOW add constraint FKSEGUACE
     foreign key (Id_utente_seguace)
     references UTENTE (Id_utente);

alter table FOLLOW add constraint FKSEGUITO
     foreign key (Id_utente_seeguito)
     references UTENTE (Id_utente);

alter table MI_PIACE add constraint FKESPRESSIONE
     foreign key (Id_utente)
     references UTENTE (Id_utente);

alter table MI_PIACE add constraint FKPRESENTA
     foreign key (Id_post)
     references POST (Id_post);

alter table NOTIFICA add constraint FKRICEZIONE_NOTIFICA
     foreign key (Id_utente)
     references UTENTE (Id_utente);

alter table NOTIFICA add constraint FKGENERA_POST_NOTIFICA
     foreign key (Id_post)
     references POST (Id_post);

alter table NOTIFICA add constraint FKGENERA_COMMENTO_NOTIFICA_FK
     foreign key (Id_Commento)
     references COMMENTO (Id_Commento);

alter table NOTIFICA add constraint FKGENERA_RISPOSTA_NOTIFICA_FK
     foreign key (Id_risposta)
     references RISPOSTA_COMMENTO (Id_risposta);

alter table NOTIFICA add constraint FKGENERA_FOLLOW_NOTIFICA_FK
     foreign key (Id_utente_seguace, Id_utente_seeguito)
     references FOLLOW (Id_utente_seguace, Id_utente_seeguito);

alter table NOTIFICA add constraint FKGENERA_FOLLOW_NOTIFICA_CHK
     check((Id_utente_seguace is not null and Id_utente_seeguito is not null)
           or (Id_utente_seguace is null and Id_utente_seeguito is null)); 

alter table PARTECIPAZIONE add constraint FKPAR_UTE
     foreign key (Id_utente_partcipante)
     references UTENTE (Id_utente);

alter table PARTECIPAZIONE add constraint FKPAR_COM
     foreign key (Id_communty, Categoria)
     references COMMUNITY (Id_communty, Categoria);

-- Not implemented
-- alter table POST add constraint IDPOST_CHK
--     check(exists(select * from UTENTE
--                  where UTENTE.Id_post_salvati = Id_post)); 

alter table POST add constraint FKPUBBLICAZIONE
     foreign key (Id_utente)
     references UTENTE (Id_utente);

alter table POST add constraint FKAPPARTENENZA_FK
     foreign key (Id_communty, Categoria)
     references COMMUNITY (Id_communty, Categoria);

alter table POST add constraint FKAPPARTENENZA_CHK
     check((Id_communty is not null and Categoria is not null)
           or (Id_communty is null and Categoria is null)); 

-- Not implemented
-- alter table RISPOSTA_COMMENTO add constraint IDRISPOSTA_COMMENTO_CHK
--     check(exists(select * from NOTIFICA
--                  where NOTIFICA.Id_risposta = Id_risposta)); 

alter table RISPOSTA_COMMENTO add constraint FKRISPONDE
     foreign key (Id_utente)
     references UTENTE (Id_utente);

alter table RISPOSTA_COMMENTO add constraint FKCONTIENE
     foreign key (Id_Commento)
     references COMMENTO (Id_Commento);

alter table UTENTE add constraint FKSALVA_FK
     foreign key (Id_post_salvati)
     references POST (Id_post);


-- Index Section
-- _____________ 

