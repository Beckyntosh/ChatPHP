CREATE TABLE IF NOT EXISTS artists (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  genre VARCHAR(30) NOT NULL,
  decade VARCHAR(10) NOT NULL
);

INSERT INTO artists (name, genre, decade) VALUES 
    ('John Coltrane', 'Jazz', '1960s'),
    ('Miles Davis', 'Jazz', '1960s'),
    ('Jimi Hendrix', 'Rock', '1960s'),
    ('Ella Fitzgerald', 'Jazz', '1950s'),
    ('Elvis Presley', 'Rock', '1950s'),
    ('Duke Ellington', 'Jazz', '1940s'),
    ('Bob Dylan', 'Folk', '1960s'),
    ('Aretha Franklin', 'Soul', '1960s'),
    ('The Beatles', 'Rock', '1960s'),
    ('Billie Holiday', 'Jazz', '1940s');
