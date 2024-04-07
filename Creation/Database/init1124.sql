CREATE TABLE IF NOT EXISTS Artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    decade VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO Artists (name, genre, decade) VALUES ('Miles Davis', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('John Coltrane', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Ella Fitzgerald', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Louis Armstrong', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Dizzy Gillespie', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Dave Brubeck', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Sarah Vaughan', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Billie Holiday', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Herbie Hancock', 'Jazz', '1960s');
INSERT INTO Artists (name, genre, decade) VALUES ('Nina Simone', 'Jazz', '1960s');
