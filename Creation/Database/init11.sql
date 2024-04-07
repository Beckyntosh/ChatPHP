CREATE TABLE Music (
    music_id INT PRIMARY KEY,
    music_name VARCHAR(100),
    artist_name VARCHAR(100),
    year_released INT
);

CREATE TABLE Artist (
    artist_id INT PRIMARY KEY,
    artist_name VARCHAR(100),
    genre VARCHAR(100)
);

INSERT INTO Music (music_id, music_name, artist_name, year_released) VALUES
(1, 'A Love Supreme', 'John Coltrane', 1965),
(2, 'Kind of Blue', 'Miles Davis', 1959),
(3, 'Giant Steps', 'John Coltrane', 1960),
(4, 'My Favorite Things', 'John Coltrane', 1961),
(5, 'Time Out', 'Dave Brubeck', 1959),
(6, 'Mingus Ah Um', 'Charles Mingus', 1959),
(7, 'Blue Train', 'John Coltrane', 1957),
(8, 'Birth of the Cool', 'Miles Davis', 1957),
(9, 'The Shape of Jazz to Come', 'Ornette Coleman', 1959),
(10, 'Saxophone Colossus', 'Sonny Rollins', 1956);

INSERT INTO Artist (artist_id, artist_name, genre) VALUES
(1, 'John Coltrane', 'Jazz'),
(2, 'Miles Davis', 'Jazz'),
(3, 'Dave Brubeck', 'Jazz'),
(4, 'Charles Mingus', 'Jazz'),
(5, 'Ornette Coleman', 'Jazz'),
(6, 'Sonny Rollins', 'Jazz');
