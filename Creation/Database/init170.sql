CREATE TABLE IF NOT EXISTS art_gallery (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
artist_name VARCHAR(30) NOT NULL,
art_title VARCHAR(50),
art_description TEXT,
image_url VARCHAR(100),
upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO art_gallery (artist_name, art_title, art_description, image_url) VALUES ('John Doe', 'Sunset Painting', 'A beautiful painting of a sunset over the ocean', 'uploads/sunset_painting.jpg');
INSERT INTO art_gallery (artist_name, art_title, art_description, image_url) VALUES ('Jane Smith', 'Abstract Art', 'Colorful abstract artwork with geometric shapes', 'uploads/abstract_art.jpg');
INSERT INTO art_gallery (artist_name, art_title, art_description, image_url) VALUES ('Michael Johnson', 'Portrait', 'Realistic portrait of a woman', 'uploads/portrait.jpg');
INSERT INTO art_gallery (artist_name, art_title, art_description, image_url) VALUES ('Sarah Williams', 'Landscape', 'Scenic landscape with mountains and a lake', 'uploads/landscape.jpg');
INSERT INTO art_gallery (artist_name, art_title, art_description, image_url) VALUES ('David Brown', 'Still Life', 'Classic still life painting with fruit and flowers', 'uploads/still_life.jpg');
INSERT INTO art_gallery (artist_name, art_title, art_description, image_url) VALUES ('Emily Davis', 'Nature', 'Nature-inspired painting with floral motifs', 'uploads/nature.jpg');
INSERT INTO art_gallery (artist_name, art_title, art_description, image_url) VALUES ('Chris Lee', 'Cityscape', 'Vibrant cityscape painting with tall buildings', 'uploads/cityscape.jpg');
INSERT INTO art_gallery (artist_name, art_title, art_description, image_url) VALUES ('Alex Moore', 'Surreal Art', 'Dream-like surreal artwork with floating objects', 'uploads/surreal_art.jpg');
INSERT INTO art_gallery (artist_name, art_title, art_description, image_url) VALUES ('Olivia Clark', 'Animals', 'Artwork featuring various animals in a natural setting', 'uploads/animals.jpg');
INSERT INTO art_gallery (artist_name, art_title, art_description, image_url) VALUES ('Ryan Brown', 'Abstract Expressionism', 'Abstract painting showcasing emotions through colors and brush strokes', 'uploads/abstract_expressionism.jpg');
