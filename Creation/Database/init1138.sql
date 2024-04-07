CREATE TABLE IF NOT EXISTS artists (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  genre VARCHAR(30) NOT NULL,
  decade CHAR(4) NOT NULL,
  reg_date TIMESTAMP
);

INSERT INTO artists (name, genre, decade) VALUES 
('John Coltrane', 'Jazz', '1960s'),
('Miles Davis', 'Jazz', '1960s'),
('Duke Ellington', 'Jazz', '1960s'),
('Bill Evans', 'Jazz', '1960s'),
('Herbie Hancock', 'Jazz', '1960s'),
('Thelonious Monk', 'Jazz', '1960s'),
('Wayne Shorter', 'Jazz', '1960s'),
('Charles Mingus', 'Jazz', '1960s'),
('Art Blakey', 'Jazz', '1960s'),
('Cannonball Adderley', 'Jazz', '1960s');
