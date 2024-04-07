
CREATE TABLE IF NOT EXISTS Artists (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    genre VARCHAR(100),
    decade VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS Songs (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    artist_id INT UNSIGNED,
    release_year YEAR,
    FOREIGN KEY (artist_id) REFERENCES Artists(id)
);

INSERT INTO Artists (name, genre, decade) VALUES 
('John Coltrane', 'Jazz', '1960s'),
('Miles Davis', 'Jazz', '1960s'),
('Thelonious Monk', 'Jazz', '1960s'),
('Charles Mingus', 'Jazz', '1960s'),
('Billie Holiday', 'Jazz', '1960s'),
('Duke Ellington', 'Jazz', '1960s'),
('Ella Fitzgerald', 'Jazz', '1960s'),
('Sidney Bechet', 'Jazz', '1960s'),
('Benny Goodman', 'Jazz', '1960s'),
('Dizzy Gillespie', 'Jazz', '1960s');

INSERT INTO Songs (title, artist_id, release_year) VALUES 
('Giant Steps', 1, 1960),
('So What', 2, 1959),
('Round Midnight', 3, 1967),
('Goodbye Pork Pie Hat', 4, 1959),
('Strange Fruit', 5, 1939),
('Take the A Train', 6, 1941),
('Summertime', 7, 1936),
('Blue Horizon', 8, 1940),
('Sing, Sing, Sing', 9, 1936),
('A Night in Tunisia', 10, 1942);
