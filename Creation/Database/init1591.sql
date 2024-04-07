CREATE TABLE IF NOT EXISTS ArtGallery (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
artistName VARCHAR(50) NOT NULL,
artworkTitle VARCHAR(50),
description TEXT,
imageName VARCHAR(100),
uploadDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO ArtGallery (artistName, artworkTitle, description, imageName) VALUES ('John Doe', 'Mountain Landscape', 'Beautiful painting of mountains', 'mountain_landscape.jpg');
INSERT INTO ArtGallery (artistName, artworkTitle, description, imageName) VALUES ('Jane Smith', 'Abstract Art', 'Vibrant colors and shapes', 'abstract_art.jpg');
INSERT INTO ArtGallery (artistName, artworkTitle, description, imageName) VALUES ('Michael Johnson', 'Still Life', 'Detailed depiction of fruits', 'still_life.jpg');
INSERT INTO ArtGallery (artistName, artworkTitle, description, imageName) VALUES ('Sarah Lee', 'Cityscape', 'Urban scene with skyscrapers', 'cityscape.jpg');
INSERT INTO ArtGallery (artistName, artworkTitle, description, imageName) VALUES ('Emily White', 'Portrait', 'Realistic painting of a person', 'portrait.jpg');
INSERT INTO ArtGallery (artistName, artworkTitle, description, imageName) VALUES ('David Brown', 'Wildlife Art', 'Animals in their natural habitat', 'wildlife.jpg');
INSERT INTO ArtGallery (artistName, artworkTitle, description, imageName) VALUES ('Jessica Green', 'Fantasy Art', 'Imaginative and dreamlike scenes', 'fantasy.jpg');
INSERT INTO ArtGallery (artistName, artworkTitle, description, imageName) VALUES ('Alex Clark', 'Surreal Painting', 'Unusual and dream-like composition', 'surreal.jpg');
INSERT INTO ArtGallery (artistName, artworkTitle, description, imageName) VALUES ('Daniel Taylor', 'Landscapes Collection', 'Various landscapes from around the world', 'landscapes.jpg');
INSERT INTO ArtGallery (artistName, artworkTitle, description, imageName) VALUES ('Grace Anderson', 'Seascape', 'Beautiful ocean view', 'seascape.jpg');
