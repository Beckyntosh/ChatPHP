CREATE TABLE IF NOT EXISTS artworks (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
artist_name VARCHAR(255) NOT NULL,
title VARCHAR(255) NOT NULL,
description TEXT NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO artworks (artist_name, title, description) VALUES ('John Doe', 'Sunset Over Mountains', 'A beautiful painting of a serene sunset over majestic mountains');
INSERT INTO artworks (artist_name, title, description) VALUES ('Jane Smith', 'Ocean Waves', 'A stunning portrayal of crashing ocean waves on the shore');
INSERT INTO artworks (artist_name, title, description) VALUES ('Alex Johnson', 'Cityscape at Night', 'An intricate painting capturing the urban city lights at night');
INSERT INTO artworks (artist_name, title, description) VALUES ('Emily Brown', 'Field of Flowers', 'A colorful depiction of a vibrant field filled with blooming flowers');
INSERT INTO artworks (artist_name, title, description) VALUES ('Michael White', 'Abstract Harmony', 'An abstract piece that harmoniously blends colors and shapes');
INSERT INTO artworks (artist_name, title, description) VALUES ('Sara Green', 'Enchanted Forest', 'Immersive artwork showcasing the mystical allure of an enchanted forest');
INSERT INTO artworks (artist_name, title, description) VALUES ('Chris Taylor', 'Sunrise Serenity', 'Calming painting capturing the tranquility of a peaceful sunrise');
INSERT INTO artworks (artist_name, title, description) VALUES ('Laura Adams', 'Mountain Majesty', 'Impressive painting depicting the grandeur of towering mountains');
INSERT INTO artworks (artist_name, title, description) VALUES ('Kevin Clark', 'Dreamscape', 'Surreal artwork that transports viewers to a dreamlike world');
INSERT INTO artworks (artist_name, title, description) VALUES ('Rachel Smith', 'Vintage Charm', 'Nostalgic painting evoking feelings of vintage charm');
