CREATE TABLE artists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    genre VARCHAR(100) NOT NULL
);

CREATE TABLE songs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    artist_id INT,
    release_year INT
);

INSERT INTO artists (name, genre) VALUES 
('John Coltrane', 'Jazz'),
('Miles Davis', 'Jazz'),
('Bill Evans', 'Jazz'),
('Thelonious Monk', 'Jazz'),
('Charles Mingus', 'Jazz'),
('Duke Ellington', 'Jazz'),
('Dave Brubeck', 'Jazz'),
('Wes Montgomery', 'Jazz'),
('Herbie Hancock', 'Jazz'),
('Lee Morgan', 'Jazz');

INSERT INTO songs (title, artist_id, release_year) VALUES 
('Giant Steps', 1, 1960),
('Kind of Blue', 2, 1959),
('Waltz for Debby', 3, 1961),
('Blue Train', 4, 1957),
('Mingus Ah Um', 5, 1959),
('Take the "A" Train', 6, 1941),
('Time Out', 7, 1959),
('Smokin'' at the Half Note', 8, 1965),
('Watermelon Man', 9, 1962),
('The Sidewinder', 10, 1964);