#1.Вывести список фильмов, в которых снимались одновременно Арнольд Шварценеггер* и Линда Хэмилтон*.
#Формат: ID фильма, Название на русском языке, Имя режиссёра.
select MOVIE_ID,title,d.NAME from movie_title join movie m on movie_title.MOVIE_ID = m.ID
    join director d on d.ID = m.DIRECTOR_ID
where MOVIE_ID in (select ma1.MOVIE_ID from movie_actor ma1 join
    movie_actor ma2 on ma1.MOVIE_ID=ma2.MOVIE_ID
	where ma1.ACTOR_ID in (1) and ma2.ACTOR_ID in (3))
and LANGUAGE_ID='ru';
#2.Вывести список названий фильмов на англйском языке с "откатом" на русский, в случае если название на английском не задано.	Формат: ID фильма, Название.
select MOVIE_ID, TITLE from movie m left join movie_title mt on m.ID = mt.MOVIE_ID AND mt.LANGUAGE_ID = 'en'
WHERE mt.TITLE IS NOT NULL
union
select MOVIE_ID, TITLE from movie_title mt  join movie m on mt.MOVIE_ID=m.ID
WHERE not exists(select 'x' from movie_title mt where mt.MOVIE_ID=m.id
    and LANGUAGE_ID= 'en') order by MOVIE_ID;
#3. Вывести самый длительный фильм Джеймса Кэмерона*.	Формат: ID фильма, Название на русском языке, Длительность.(Бонус – без использования подзапросов)
#C подзапросом
select  movie_ID as ID_фильма, max(LENGTH) as Длительность, TITLE as Название_на_русском_языке
from movie_title join movie m on m.ID = movie_title.MOVIE_ID
where m.length in (select max(LENGTH) from movie where DIRECTOR_ID='1');
#Без подзапроса
select movie_ID as ID_фильма, LENGTH as Длительность, TITLE as Название_на_русском_языке
from movie_title join movie m on m.ID = movie_title.MOVIE_ID
join director d on m.DIRECTOR_ID = d.ID
where d.NAME='Джеймс Кэмерон' and LANGUAGE_ID= 'ru' order by LENGTH desc limit 1;
#4.Вывести список фильмов с названием, сокращённым до 10 символов. Если название короче 10 символов – оставляем как есть.
#Если длиннее – сокращаем до 10 символов и добавляем многоточие.
#Формат: ID фильма, сокращённое название
select MOVIE_ID, concat(substr(TITLE,1,10),if (CHAR_LENGTH(title) >10,'...','')),CHAR_LENGTH(title) from movie_title;
#5.Вывести количество фильмов, в которых снимался каждый актёр.
#Формат: Имя актёра, Количество фильмов актёра.
select a.name,count(*) as num from movie_actor
join actor a on a.ID = movie_actor.ACTOR_ID
group by ACTOR_ID order by num desc;
#6. Вывести жанры, в которых никогда не снимался Арнольд Шварценеггер*.
# Формат: ID жанра, название
select g.id,g.name from genre g where g.id not in
(select g.id from actor a join movie_actor ma on a.ID = ma.ACTOR_ID
    join movie m on ma.MOVIE_ID = m.ID
    join movie_genre mg on m.ID = mg.MOVIE_ID
    join genre g on mg.GENRE_ID = g.ID
where ACTOR_ID=1 group by g.id order by g.id);
#7. Вывести список фильмов, у которых больше 3-х жанров.
#Формат: ID фильма, название на русском языке
select movie_title.MOVIE_ID,TITLE from movie_title
    join movie_genre mg on movie_title.MOVIE_ID = mg.MOVIE_ID
    join genre g on g.ID = mg.GENRE_ID
where movie_title.LANGUAGE_ID='ru'
group by movie_title.MOVIE_ID having count(g.id)>3;
#8. Вывести самый популярный жанр для каждого актёра.
#Формат вывода: Имя актёра, Жанр, в котором у актёра больше всего фильмов.
select base.`Имя Актёра`,base.Жанр from (select a.NAME as 'Имя Актёра',g.name as 'Жанр', count(g.name) as cnt from actor a join movie_actor ma on a.ID = ma.ACTOR_ID
                                                                                                        join movie_genre mg on ma.MOVIE_ID = mg.MOVIE_ID
                                                                                                        join genre g on mg.GENRE_ID = g.ID
                      group by a.name,g.name desc order by cnt desc) base
group by base.`Имя Актёра`;
