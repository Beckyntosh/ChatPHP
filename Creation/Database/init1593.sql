CREATE TABLE IF NOT EXISTS artworks (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
artist_name VARCHAR(30) NOT NULL,
title VARCHAR(50),
description TEXT,
creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO artworks (artist_name, title, description) VALUES ('Artist1', 'Sunset Over Mountains', 'Beautiful painting capturing the serene beauty of mountains at sunset');
INSERT INTO artworks (artist_name, title, description) VALUES ('Artist2', 'Cityscape at Night', 'Urban landscape painting showcasing the city skyline lit up at night');
INSERT INTO artworks (artist_name, title, description) VALUES ('Artist3', 'Abstract Art', 'Colorful and vibrant abstract composition expressing emotions through shapes and colors');
INSERT INTO artworks (artist_name, title, description) VALUES ('Artist4', 'Floral Delight', 'Detailed painting of various flowers blooming in a garden');
INSERT INTO artworks (artist_name, title, description) VALUES ('Artist5', 'Wildlife Encounter', 'Realistic depiction of animals in their natural habitat');
INSERT INTO artworks (artist_name, title, description) VALUES ('Artist6', 'Ocean Serenity', 'Calming painting of the sea and horizon');
INSERT INTO artworks (artist_name, title, description) VALUES ('Artist7', 'Modern Architecture', 'Contemporary interpretation of architectural structures');
INSERT INTO artworks (artist_name, title, description) VALUES ('Artist8', 'Fantasy World', 'Imaginary realm filled with mystical creatures and landscapes');
INSERT INTO artworks (artist_name, title, description) VALUES ('Artist9', 'Still Life', 'Classic representation of objects in a composition');
INSERT INTO artworks (artist_name, title, description) VALUES ('Artist10', 'Portraits Collection', 'Gallery of portraits capturing different expressions and personalities');
