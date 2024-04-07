CREATE TABLE artists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE music (
    id INT AUTO_INCREMENT PRIMARY KEY,
    artist_id INT,
    title VARCHAR(255) NOT NULL,
    genre VARCHAR(255),
    release_year INT,
    FOREIGN KEY (artist_id) REFERENCES artists(id)
);

INSERT INTO artists (name) VALUES
('John Coltrane'),
('Miles Davis'),
('Bill Evans'),
('Thelonious Monk'),
('Charles Mingus'),
('Cannonball Adderley'),
('Duke Ellington'),
('Herbie Hancock'),
('Stan Getz'),
('Dave Brubeck');

INSERT INTO music (artist_id, title, genre, release_year) VALUES
(1, 'A Love Supreme', 'Jazz', 1965),
(2, 'Kind of Blue', 'Jazz', 1959),
(3, 'Waltz for Debby', 'Jazz', 1961),
(4, 'Brilliant Corners', 'Jazz', 1957),
(5, 'Mingus Ah Um', 'Jazz', 1959),
(6, 'Somethin\' Else', 'Jazz', 1958),
(7, 'Money Jungle', 'Jazz', 1962),
(8, 'Head Hunters', 'Jazz-Funk', 1973),
(9, 'Getz/Gilberto', 'Bossa Nova', 1964),
(10, 'Time Out', 'Jazz', 1959);
