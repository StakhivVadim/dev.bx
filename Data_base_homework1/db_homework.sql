/*
CREATE TABLE language
(
	ID varchar(50) not null,
	NAME varchar(50) not null,
	PRIMARY KEY (ID)
);

CREATE TABLE movie_title
(
	MOVIE_ID int not null,
	LANGUAGE_ID varchar(50) not null,
	TITLE varchar(500) not null,
	PRIMARY KEY (MOVIE_ID),
	FOREIGN KEY FK_MOVIE_TITLE_MOVIE (LANGUAGE_ID)
		REFERENCES language(ID)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
);
INSERT INTO language (ID, NAME)
VALUES ('ru', 'Russian'),
       ('en', 'English'),
       ('de', 'Deutch'),
       ('fr', 'French');
INSERT INTO MOVIE_TITLE(MOVIE_ID, LANGUAGE_ID, TITLE)  select ID,'ru',title from movie
alter table movie drop column TITLE;
*/
select * from movie_title;
