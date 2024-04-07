CREATE TABLE IF NOT EXISTS ArtGallery (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(30) NOT NULL,
    artwork_name VARCHAR(30) NOT NULL,
    artwork_image VARCHAR(255) NOT NULL,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO ArtGallery (artist_name, artwork_name, artwork_image) VALUES ('John Doe', 'Sunset Over Mountains', 'uploads/sunset_mountains.jpg');
INSERT INTO ArtGallery (artist_name, artwork_name, artwork_image) VALUES ('Jane Smith', 'Abstract Art', 'uploads/abstract_art.jpg');
INSERT INTO ArtGallery (artist_name, artwork_name, artwork_image) VALUES ('Michael Johnson', 'Still Life Painting', 'uploads/still_life.jpg');
INSERT INTO ArtGallery (artist_name, artwork_name, artwork_image) VALUES ('Sarah Adams', 'Landscape Watercolor', 'uploads/landscape_watercolor.jpg');
INSERT INTO ArtGallery (artist_name, artwork_name, artwork_image) VALUES ('David Brown', 'Portrait Sketch', 'uploads/portrait_sketch.jpg');
INSERT INTO ArtGallery (artist_name, artwork_name, artwork_image) VALUES ('Emily White', 'Cityscape Acrylic', 'uploads/cityscape_acrylic.jpg');
INSERT INTO ArtGallery (artist_name, artwork_name, artwork_image) VALUES ('Alex Taylor', 'Nature Photography', 'uploads/nature_photography.jpg');
INSERT INTO ArtGallery (artist_name, artwork_name, artwork_image) VALUES ('Olivia Clark', 'Sculpture Art', 'uploads/sculpture_art.jpg');
INSERT INTO ArtGallery (artist_name, artwork_name, artwork_image) VALUES ('Robert Green', 'Digital Art', 'uploads/digital_art.jpg');
INSERT INTO ArtGallery (artist_name, artwork_name, artwork_image) VALUES ('Sophia Walker', 'Street Art Mural', 'uploads/street_art_mural.jpg');
