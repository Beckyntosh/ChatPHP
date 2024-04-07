CREATE TABLE artists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    genre VARCHAR(100),
    decade VARCHAR(10)
);

INSERT INTO artists (name, genre, decade) VALUES 
('John Coltrane', 'Jazz', '1960s'),
('Miles Davis', 'Jazz', '1960s'),
('Thelonious Monk', 'Jazz', '1960s'),
('Dave Brubeck', 'Jazz', '1960s'),
('Duke Ellington', 'Jazz', '1960s'),
('Nina Simone', 'Jazz', '1960s'),
('Ella Fitzgerald', 'Jazz', '1960s'),
('Sonny Rollins', 'Jazz', '1960s'),
('Ornette Coleman', 'Jazz', '1960s'),
('Bill Evans', 'Jazz', '1960s');
