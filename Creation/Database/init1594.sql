CREATE TABLE IF NOT EXISTS artworks (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artistName VARCHAR(255) NOT NULL,
    artTitle VARCHAR(255) NOT NULL,
    description TEXT,
    uploadDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    imagePath VARCHAR(255)
);

INSERT INTO artworks (artistName, artTitle, description, imagePath) VALUES ('John Doe', 'Sunset Over Mountains', 'Beautiful painting capturing the essence of nature', 'uploads/sunset_mountains.jpg');
INSERT INTO artworks (artistName, artTitle, description, imagePath) VALUES ('Jane Smith', 'Cityscape at Night', 'Glowing lights and reflections in the city', 'uploads/cityscape_night.jpg');
INSERT INTO artworks (artistName, artTitle, description, imagePath) VALUES ('Alice Brown', 'Abstract Expressionism', 'Vibrant colors and bold strokes', 'uploads/abstract_expressionism.jpg');
INSERT INTO artworks (artistName, artTitle, description, imagePath) VALUES ('David Jones', 'Floral Symphony', 'A delicate composition of flowers', 'uploads/floral_symphony.jpg');
INSERT INTO artworks (artistName, artTitle, description, imagePath) VALUES ('Emily White', 'Ocean Waves', 'Powerful waves crashing on the shore', 'uploads/ocean_waves.jpg');
INSERT INTO artworks (artistName, artTitle, description, imagePath) VALUES ('Michael Adams', 'Urban Decay', 'Decay and beauty intertwined in the cityscape', 'uploads/urban_decay.jpg');
INSERT INTO artworks (artistName, artTitle, description, imagePath) VALUES ('Sarah Green', 'Surreal Dreams', 'Dreamlike landscapes and fantasy elements', 'uploads/surreal_dreams.jpg');
INSERT INTO artworks (artistName, artTitle, description, imagePath) VALUES ('Chris Roberts', 'Wildlife Harmony', 'Peaceful coexistence of animals in the wild', 'uploads/wildlife_harmony.jpg');
INSERT INTO artworks (artistName, artTitle, description, imagePath) VALUES ('Linda Parker', 'Autumn Splendor', 'Rich colors of autumn leaves in the forest', 'uploads/autumn_splendor.jpg');
INSERT INTO artworks (artistName, artTitle, description, imagePath) VALUES ('Mark Wilson', 'Spirit of the Desert', 'Majestic views of the desert landscape', 'uploads/spirit_desert.jpg');
