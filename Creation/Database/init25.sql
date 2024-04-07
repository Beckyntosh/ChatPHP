CREATE TABLE IF NOT EXISTS artists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    genre VARCHAR(100),
    era VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    artist_id INT,
    title VARCHAR(255) NOT NULL,
    year INT,
    FOREIGN KEY(artist_id) REFERENCES artists(id)
);

INSERT INTO artists (name, genre, era) VALUES 
('John Coltrane', 'Jazz', '1960s'),
('Miles Davis', 'Jazz', '1960s'),
('Bill Evans', 'Jazz', '1960s'),
('Duke Ellington', 'Jazz', '1960s'),
('Thelonious Monk', 'Jazz', '1960s');

INSERT INTO records (artist_id, title, year) VALUES
(1, 'A Love Supreme', 1965),
(2, 'Kind of Blue', 1959),
(3, 'Sunday at the Village Vanguard', 1961),
(4, 'The Far East Suite', 1967),
(5, 'Monk''s Dream', 1963),
(1, 'Blue Train', 1957),
(2, 'Bitches Brew', 1970),
(3, 'Waltz for Debby', 1961),
(4, 'Ellington at Newport', 1956),
(5, 'Brilliant Corners', 1957);
