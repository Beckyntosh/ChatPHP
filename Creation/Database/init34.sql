-- Create artists table
CREATE TABLE IF NOT EXISTS artists (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  genre VARCHAR(50) NOT NULL,
  decade VARCHAR(50) NOT NULL
);

-- Insert sample data into artists table
INSERT INTO artists (name, genre, decade) VALUES
('Miles Davis', 'Jazz', '1960s'),
('John Coltrane', 'Jazz', '1960s'),
('Ella Fitzgerald', 'Jazz', '1960s'),
('Thelonious Monk', 'Jazz', '1960s'),
('Bill Evans', 'Jazz', '1960s'),
('Duke Ellington', 'Jazz', '1960s'),
('Charles Mingus', 'Jazz', '1960s'),
('Dave Brubeck', 'Jazz', '1960s'),
('Art Blakey', 'Jazz', '1960s'),
('Sarah Vaughan', 'Jazz', '1960s');
