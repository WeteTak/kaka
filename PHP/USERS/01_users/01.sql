CREATE USER 'kupiec'@'localhost' IDENTIFIED BY '123';

SELECT host, user, password
FROM user;

CREATE USER 'szukacz'@'localhost' IDENTIFIED BY '321';

CREATE DATABASE Egzaminy;

CREATE TABLE Egzaminy.Test(
    id int PRIMARY KEY
);

INSERT INTO Egzaminy.Test (id)
VALUES(1),(2),(3);

CREATE TABLE Egzaminy.tabela(
    id int
);

GRANT INSERT ON Egzaminy.test TO 'szukacz'@'localhost';

INSERT into Egzaminy.Test (id)
VALUES(4);

CREATE USER 'serwisant'@'localhost';

GRANT DELETE ON Egzaminy.test TO 'serwisant'@'localhost';

DELETE FROM test
WHERE id=3;

GRANT SELECT on Egzaminy.test TO 'serwisant'@'localhost';