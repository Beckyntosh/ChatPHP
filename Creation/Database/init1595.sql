CREATE TABLE IF NOT EXISTS art_gallery (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(50) NOT NULL,
    artwork_name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    image_url VARCHAR(255),
    reg_date TIMESTAMP
);

INSERT INTO art_gallery (artist_name, artwork_name, description, image_url) VALUES ('John Doe', 'Sunset Over Mountains', 'Beautiful painting of a sunset over mountains', 'https://example.com/sunset.jpg');
INSERT INTO art_gallery (artist_name, artwork_name, description, image_url) VALUES ('Jane Smith', 'Winter Wonderland', 'Detailed painting of a winter scene', 'https://example.com/winter.jpg');
INSERT INTO art_gallery (artist_name, artwork_name, description, image_url) VALUES ('Alice Brown', 'Abstract Colors', 'Vibrant abstract painting with bold colors', 'https://example.com/abstract.jpg');
INSERT INTO art_gallery (artist_name, artwork_name, description, image_url) VALUES ('Sam Green', 'Cityscape at Night', 'Urban cityscape painting with lights at night', 'https://example.com/cityscape.jpg');
INSERT INTO art_gallery (artist_name, artwork_name, description, image_url) VALUES ('Emily White', 'Floral Delight', 'Whimsical floral painting with a touch of fantasy', 'https://example.com/floral.jpg');
INSERT INTO art_gallery (artist_name, artwork_name, description, image_url) VALUES ('Michael Black', 'Wildlife Sanctuary', 'Realistic portrayal of animals in a natural setting', 'https://example.com/wildlife.jpg');
INSERT INTO art_gallery (artist_name, artwork_name, description, image_url) VALUES ('Sophia Gray', 'Ocean Serenity', 'Soothing painting of the ocean with calming hues', 'https://example.com/ocean.jpg');
INSERT INTO art_gallery (artist_name, artwork_name, description, image_url) VALUES ('Jack Red', 'Mountains Majesty', 'Majestic landscape of mountains under a clear sky', 'https://example.com/mountains.jpg');
INSERT INTO art_gallery (artist_name, artwork_name, description, image_url) VALUES ('Olivia Purple', 'Celestial Dreams', 'Dreamy celestial painting with stars and galaxies', 'https://example.com/celestial.jpg');
INSERT INTO art_gallery (artist_name, artwork_name, description, image_url) VALUES ('William Orange', 'Abstract Waves', 'Fluid abstract painting resembling ocean waves', 'https://example.com/waves.jpg');
