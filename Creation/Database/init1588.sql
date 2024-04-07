CREATE TABLE IF NOT EXISTS artworks (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(30) NOT NULL,
  artist VARCHAR(30) NOT NULL,
  description TEXT,
  image VARCHAR(100),
  reg_date TIMESTAMP
);

INSERT INTO artworks (title, artist, description, image) VALUES 
('Sunset Over Mountains', 'Artist1', 'Beautiful painting of a sunset over mountains', 'uploads/sunset.jpg'),
('Floral Arrangement', 'Artist2', 'Colorful floral arrangement in a vase', 'uploads/floral.jpg'),
('Abstract Expressionism', 'Artist3', 'Abstract painting with vibrant colors', 'uploads/abstract.jpg'),
('Cityscape at Night', 'Artist4', 'Detailed cityscape painting at night', 'uploads/cityscape.jpg'),
('Portrait of a Woman', 'Artist5', 'Realistic portrait of a woman', 'uploads/portrait.jpg'),
('Surreal Landscape', 'Artist6', 'Dream-like landscape with floating objects', 'uploads/surreal.jpg'),
('Still Life with Fruit', 'Artist7', 'Classic still life composition with various fruits', 'uploads/stilllife.jpg'),
('Seascape with Ships', 'Artist8', 'Scenic seascape with ships on the horizon', 'uploads/seascape.jpg'),
('Modern Architecture', 'Artist9', 'Architectural design with modern buildings', 'uploads/architecture.jpg'),
('Wildlife Photography', 'Artist10', 'Stunning photography capturing wildlife in their habitat', 'uploads/wildlife.jpg');
