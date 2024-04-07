CREATE TABLE IF NOT EXISTS artists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    genre VARCHAR(100) NOT NULL,
    era VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS albums (
    id INT AUTO_INCREMENT PRIMARY KEY,
    artist_id INT,
    title VARCHAR(255) NOT NULL,
    year INT NOT NULL,
    FOREIGN KEY(artist_id) REFERENCES artists(id)
);

INSERT INTO artists (id, name, genre, era) VALUES
(1, 'Miles Davis', 'Jazz', '1960s'),
(2, 'John Coltrane', 'Jazz', '1960s');

INSERT INTO albums (id, artist_id, title, year) VALUES
(1, 1, 'Kind of Blue', 1959),
(2, 2, 'A Love Supreme', 1965);
