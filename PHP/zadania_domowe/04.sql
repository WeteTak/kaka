-- 1. Wyświetl tytuły wszystkich filmów

SELECT tytul
FROM filmy;

-- 2. Ile różnych poziomów ratingu jest zapisane w bazie? Wyświetl je (dane nie powinny się powtarzać). 

SELECT rating, COUNT(*) 
FROM filmy
GROUP BY rating;

SELECT DISTINCT rating 
FROM filmy;

-- 3. Wyświetl wszystkie filmy z nieustalonym ratingiem.

SELECT tytul
FROM filmy
WHERE rating IS NULL;

-- 4. Wyświetl wszystkie  kina, w których aktualnie nie są wyświetlane żadne filmy. 

SELECT nazwa
FROM kina
WHERE film IS NULL;

-- 5. Wyświetl wszystkie dane o kinach i filmach, uwzględnij tylko dane o filmach, które są wyświetlane w tych kinach i dane o kinach, w których są wyświetlane jakieś filmy. 

SELECT *
FROM filmy INNER JOIN kina ON kina.film=filmy.kod;

-- 6. Wyświetl wszystkie dane o kinach i filmach, uwzględnij w zestawieniu także te kina, w których aktualnie nie są wyświetlane żadne filmy.

SELECT *
FROM filmy 
RIGHT JOIN kina ON kina.film=filmy.kod;

-- 7. Wyświetl wszystkie dane o kinach i filmach, uwzględnij w zestawieniu także te filmy, które nie są aktualnie wyświetlane w żadnych kinach. 

SELECT *
FROM filmy 
LEFT JOIN kina ON kina.film=filmy.kod;

-- 8. Wyświetl wszystkie dane o kinach i filmach, uwzględnij w zestawieniu także te kina, w których aktualnie nie są wyświetlane żadne filmy oraz  te filmy, które nie są aktualnie wyświetlane w żadnych kinach. 

SELECT DISTINCT * 
FROM filmy
FULL JOIN kina;

-- 9. Dodaj film  "One, Two, Three" (bez ratingu)
 
INSERT INTO filmy(kod, tytul, rating)
VALUES('','One, Two, Three','NULL');


-- 10. Ustal rating wszystkich filmów bez ratingu na  "G".

UPDATE filmy
SET rating='G'
WHERE rating IS NULL;

-- 11. usuń kina wyświetlające filmy z ratingiem "NC-17".

DELETE nazwa
FROM kina nazwa
JOIN filmy ON filmy.kod=kina.film
WHERE rating='NC-17';


DELETE kina
FROM kina
JOIN filmy ON filmy.kod=kina.film
WHERE rating='NC-17';