-- This is the init.sql file with table creation and insertion of values

-- Drop tables if they exist
DROP TABLE IF EXISTS music;
DROP TABLE IF EXISTS artists;

-- Create artists table
CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    decade CHAR(10),
    reg_date TIMESTAMP
);

-- Insert values into artists table
INSERT INTO artists (name, genre, decade, reg_date) VALUES 
('John Coltrane', 'Jazz', '1960s', CURRENT_TIMESTAMP),
('Miles Davis', 'Jazz', '1960s', CURRENT_TIMESTAMP),
('Thelonious Monk', 'Jazz', '1960s', CURRENT_TIMESTAMP),
('Bill Evans', 'Jazz', '1960s', CURRENT_TIMESTAMP),
('Charles Mingus', 'Jazz', '1960s', CURRENT_TIMESTAMP),
('Duke Ellington', 'Jazz', '1960s', CURRENT_TIMESTAMP),
('Herbie Hancock', 'Jazz', '1960s', CURRENT_TIMESTAMP),
('Cannonball Adderley', 'Jazz', '1960s', CURRENT_TIMESTAMP),
('Wes Montgomery', 'Jazz', '1960s', CURRENT_TIMESTAMP),
('Stan Getz', 'Jazz', '1960s', CURRENT_TIMESTAMP);

-- Create music table
CREATE TABLE IF NOT EXISTS music (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_id INT(6) UNSIGNED,
    title VARCHAR(50) NOT NULL,
    release_year YEAR(4),
    reg_date TIMESTAMP,
    FOREIGN KEY (artist_id) REFERENCES artists(id)
);

-- Insert values into music table
INSERT INTO music (artist_id, title, release_year, reg_date) VALUES 
(1, 'A Love Supreme', 1965, CURRENT_TIMESTAMP),
(2, 'Kind of Blue', 1959, CURRENT_TIMESTAMP),
(3, 'Brilliant Corners', 1957, CURRENT_TIMESTAMP),
(4, 'Sunday at the Village Vanguard', 1961, CURRENT_TIMESTAMP),
(5, 'Mingus Ah Um', 1959, CURRENT_TIMESTAMP),
(6, 'Ellington at Newport', 1956, CURRENT_TIMESTAMP),
(7, 'Head Hunters', 1973, CURRENT_TIMESTAMP),
(8, 'Somethin\' Else', 1958, CURRENT_TIMESTAMP),
(9, 'Smokin\' at the Half Note', 1965, CURRENT_TIMESTAMP),
(10, 'Getz/Gilberto', 1964, CURRENT_TIMESTAMP);