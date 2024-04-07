init.sql:

CREATE TABLE IF NOT EXISTS ArtGallery (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
artistName VARCHAR(30) NOT NULL,
artworkName VARCHAR(50),
description TEXT,
uploadDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO ArtGallery (artistName, artworkName, description) VALUES ('John Doe', 'Sunset Over Mountains', 'Beautiful painting of a sunset over mountains.');
INSERT INTO ArtGallery (artistName, artworkName, description) VALUES ('Jane Smith', 'Ocean Waves', 'Captivating artwork depicting ocean waves crashing.');
INSERT INTO ArtGallery (artistName, artworkName, description) VALUES ('Michael Johnson', 'City Lights', 'Impressive painting showcasing city lights at night.');
INSERT INTO ArtGallery (artistName, artworkName, description) VALUES ('Emily Wilson', 'Field of Flowers', 'Colorful piece showcasing a field of vibrant flowers.');
INSERT INTO ArtGallery (artistName, artworkName, description) VALUES ('David Brown', 'Abstract Universe', 'Unique abstract art representing the universe.');
INSERT INTO ArtGallery (artistName, artworkName, description) VALUES ('Sophia Lee', 'Mountains at Dusk', 'Scenic painting capturing the beauty of mountains at dusk.');
INSERT INTO ArtGallery (artistName, artworkName, description) VALUES ('Ryan Carter', 'Sunrise Reflections', 'Serene painting of a sunrise reflecting on water.');
INSERT INTO ArtGallery (artistName, artworkName, description) VALUES ('Olivia White', 'Forest Serenity', 'Tranquil artwork depicting a peaceful forest scene.');
INSERT INTO ArtGallery (artistName, artworkName, description) VALUES ('Ethan Adams', 'City Skyline', 'Modern portrayal of a bustling city skyline.');
INSERT INTO ArtGallery (artistName, artworkName, description) VALUES ('Grace Martinez', 'Abstract Patterns', 'Intriguing abstract art with intricate patterns.');