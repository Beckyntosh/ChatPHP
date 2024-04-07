CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    decade VARCHAR(20) NOT NULL
);

CREATE TABLE IF NOT EXISTS songs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    artist_id INT(6) UNSIGNED,
    FOREIGN KEY (artist_id) REFERENCES artists(id)
);

INSERT INTO artists (name, genre, decade) VALUES
('Miles Davis', 'Jazz', '1960s'),
('John Coltrane', 'Jazz', '1960s'),
('Duke Ellington', 'Jazz', '1960s'),
('Billie Holiday', 'Jazz', '1960s'),
('Thelonious Monk', 'Jazz', '1960s'),
('Charles Mingus', 'Jazz', '1960s'),
('Sarah Vaughan', 'Jazz', '1960s'),
('Cannonball Adderley', 'Jazz', '1960s'),
('Ella Fitzgerald', 'Jazz', '1960s'),
('Dave Brubeck', 'Jazz', '1960s');

INSERT INTO songs (title, artist_id) VALUES
('So What', 1),
('Giant Steps', 2),
('Take The A Train', 3),
('Strange Fruit', 4),
('Round Midnight', 5),
('Goodbye Pork Pie Hat', 6),
('Lullaby of Birdland', 7),
('Autumn Leaves', 8),
('Summertime', 9),
('Take Five', 10);
