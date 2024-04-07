CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    genre VARCHAR(50) NOT NULL,
    decade CHAR(4),
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS songs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    artist_id INT(6) UNSIGNED,
    release_year YEAR,
    FOREIGN KEY (artist_id) REFERENCES artists(id),
    reg_date TIMESTAMP
);

INSERT INTO artists (name, genre, decade, reg_date) VALUES
('John Coltrane', 'Jazz', '1960', NOW()),
('Miles Davis', 'Jazz', '1960', NOW()),
('Duke Ellington', 'Jazz', '1960', NOW()),
('Nina Simone', 'Jazz', '1960', NOW()),
('Louis Armstrong', 'Jazz', '1960', NOW()),
('Ella Fitzgerald', 'Jazz', '1960', NOW()),
('Billie Holiday', 'Jazz', '1960', NOW()),
('Thelonious Monk', 'Jazz', '1960', NOW()),
('Dave Brubeck', 'Jazz', '1960', NOW()),
('Sarah Vaughan', 'Jazz', '1960', NOW());

INSERT INTO songs (title, artist_id, release_year, reg_date) VALUES
('A Love Supreme', 1, 1965, NOW()),
('Kind of Blue', 2, 1959, NOW()),
('Take the "A" Train', 3, 1941, NOW()),
('Feeling Good', 4, 1965, NOW()),
('What a Wonderful World', 5, 1967, NOW()),
('Summertime', 6, 1935, NOW()),
('Strange Fruit', 7, 1939, NOW()),
('Round Midnight', 8, 1944, NOW()),
('Take Five', 9, 1959, NOW()),
('Lullaby of Birdland', 10, 1954, NOW());
