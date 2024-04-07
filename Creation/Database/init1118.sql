CREATE TABLE IF NOT EXISTS genre (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS artist (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    genre_id INT(6) UNSIGNED,
    debut DECIMAL(4,0),
    reg_date TIMESTAMP,
    FOREIGN KEY (genre_id) REFERENCES genre(id)
);

INSERT INTO genre (name) VALUES ('Jazz'), ('Rock'), ('Pop'), ('Blues'), ('Classical');

INSERT INTO artist (name, genre_id, debut) VALUES ('Miles Davis', 1, 1950), ('Elvis Presley', 2, 1954), ('Michael Jackson', 3, 1964), ('BB King', 4, 1949), ('Beethoven', 5, 1792), ('Duke Ellington', 1, 1923), ('Johnny Cash', 2, 1954), ('Elton John', 3, 1969), ('Etta James', 4, 1954), ('Mozart', 5, 1761);
