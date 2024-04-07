-- Create artists table
CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    decade CHAR(4),
    reg_date TIMESTAMP
);

-- Create songs table
CREATE TABLE IF NOT EXISTS songs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    artist_id INT(6) UNSIGNED,
    release_year YEAR(4),
    FOREIGN KEY (artist_id) REFERENCES artists(id),
    reg_date TIMESTAMP
);

-- Insert sample data into artists table
INSERT INTO artists (name, genre, decade) VALUES ('John Coltrane', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Miles Davis', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Nina Simone', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Bill Evans', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Herbie Hancock', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Dave Brubeck', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Cannonball Adderley', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Thelonious Monk', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Sonny Rollins', 'Jazz', '1960s');
INSERT INTO artists (name, genre, decade) VALUES ('Duke Ellington', 'Jazz', '1960s');

-- Insert sample data into songs table
INSERT INTO songs (title, artist_id, release_year) VALUES ('Giant Steps', 1, 1960);
INSERT INTO songs (title, artist_id, release_year) VALUES ('Kind of Blue', 2, 1959);
INSERT INTO songs (title, artist_id, release_year) VALUES ('Feeling Good', 3, 1965);
INSERT INTO songs (title, artist_id, release_year) VALUES ('Waltz for Debby', 4, 1961);
INSERT INTO songs (title, artist_id, release_year) VALUES ('Cantaloupe Island', 5, 1964);
INSERT INTO songs (title, artist_id, release_year) VALUES ('Take Five', 6, 1959);
INSERT INTO songs (title, artist_id, release_year) VALUES ('Autumn Leaves', 7, 1959);
INSERT INTO songs (title, artist_id, release_year) VALUES ('Blue Monk', 8, 1954);
INSERT INTO songs (title, artist_id, release_year) VALUES ('Tenor Madness', 9, 1956);
INSERT INTO songs (title, artist_id, release_year) VALUES ('Mood Indigo', 10, 1930);
