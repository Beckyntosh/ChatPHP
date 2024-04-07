CREATE TABLE IF NOT EXISTS art_gallery (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(50) NOT NULL,
    art_title VARCHAR(100) NOT NULL,
    art_description TEXT NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO art_gallery (artist_name, art_title, art_description, image_url) VALUES ('Artist1', 'Art1', 'Description1', 'image1.jpg');
INSERT INTO art_gallery (artist_name, art_title, art_description, image_url) VALUES ('Artist2', 'Art2', 'Description2', 'image2.jpg');
INSERT INTO art_gallery (artist_name, art_title, art_description, image_url) VALUES ('Artist3', 'Art3', 'Description3', 'image3.jpg');
INSERT INTO art_gallery (artist_name, art_title, art_description, image_url) VALUES ('Artist4', 'Art4', 'Description4', 'image4.jpg');
INSERT INTO art_gallery (artist_name, art_title, art_description, image_url) VALUES ('Artist5', 'Art5', 'Description5', 'image5.jpg');
INSERT INTO art_gallery (artist_name, art_title, art_description, image_url) VALUES ('Artist6', 'Art6', 'Description6', 'image6.jpg');
INSERT INTO art_gallery (artist_name, art_title, art_description, image_url) VALUES ('Artist7', 'Art7', 'Description7', 'image7.jpg');
INSERT INTO art_gallery (artist_name, art_title, art_description, image_url) VALUES ('Artist8', 'Art8', 'Description8', 'image8.jpg');
INSERT INTO art_gallery (artist_name, art_title, art_description, image_url) VALUES ('Artist9', 'Art9', 'Description9', 'image9.jpg');
INSERT INTO art_gallery (artist_name, art_title, art_description, image_url) VALUES ('Artist10', 'Art10', 'Description10', 'image10.jpg');
