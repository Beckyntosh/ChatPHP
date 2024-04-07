CREATE TABLE IF NOT EXISTS artworks (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    artist VARCHAR(255) NOT NULL,
    image LONGBLOB NOT NULL,
    created DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO artworks (title, artist, image, created) VALUES ('Sunset Over Mountains', 'Artist1', 'image1.jpg', NOW());
INSERT INTO artworks (title, artist, image, created) VALUES ('Sea Shore', 'Artist2', 'image2.jpg', NOW());
INSERT INTO artworks (title, artist, image, created) VALUES ('Cityscape', 'Artist3', 'image3.jpg', NOW());
INSERT INTO artworks (title, artist, image, created) VALUES ('Abstract Art', 'Artist4', 'image4.jpg', NOW());
INSERT INTO artworks (title, artist, image, created) VALUES ('Floral Patterns', 'Artist5', 'image5.jpg', NOW());
INSERT INTO artworks (title, artist, image, created) VALUES ('Wildlife Portrait', 'Artist6', 'image6.jpg', NOW());
INSERT INTO artworks (title, artist, image, created) VALUES ('Surrealism', 'Artist7', 'image7.jpg', NOW());
INSERT INTO artworks (title, artist, image, created) VALUES ('Pop Art', 'Artist8', 'image8.jpg', NOW());
INSERT INTO artworks (title, artist, image, created) VALUES ('Landscape', 'Artist9', 'image9.jpg', NOW());
INSERT INTO artworks (title, artist, image, created) VALUES ('Modern Art', 'Artist10', 'image10.jpg', NOW());
