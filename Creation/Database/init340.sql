CREATE TABLE IF NOT EXISTS art_gallery (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(100) NOT NULL,
    artwork_title VARCHAR(100) NOT NULL,
    artwork_image VARCHAR(200),
    reg_date TIMESTAMP
);

INSERT INTO art_gallery (artist_name, artwork_title, artwork_image) VALUES ('John Doe', 'Sunset Over Mountains', 'https://example.com/image1.jpg');
INSERT INTO art_gallery (artist_name, artwork_title, artwork_image) VALUES ('Jane Smith', 'Abstract Art', 'https://example.com/image2.jpg');
INSERT INTO art_gallery (artist_name, artwork_title, artwork_image) VALUES ('Alice Johnson', 'Nature Painting', 'https://example.com/image3.jpg');
INSERT INTO art_gallery (artist_name, artwork_title, artwork_image) VALUES ('Bob Brown', 'Cityscape', 'https://example.com/image4.jpg');
INSERT INTO art_gallery (artist_name, artwork_title, artwork_image) VALUES ('Emily White', 'Portrait', 'https://example.com/image5.jpg');
INSERT INTO art_gallery (artist_name, artwork_title, artwork_image) VALUES ('David Lee', 'Landscape', 'https://example.com/image6.jpg');
INSERT INTO art_gallery (artist_name, artwork_title, artwork_image) VALUES ('Sarah Adams', 'Still Life', 'https://example.com/image7.jpg');
INSERT INTO art_gallery (artist_name, artwork_title, artwork_image) VALUES ('Michael Davis', 'Surreal Art', 'https://example.com/image8.jpg');
INSERT INTO art_gallery (artist_name, artwork_title, artwork_image) VALUES ('Laura Taylor', 'Modern Art', 'https://example.com/image9.jpg');
INSERT INTO art_gallery (artist_name, artwork_title, artwork_image) VALUES ('Alex Rodriguez', 'Street Art', 'https://example.com/image10.jpg');
