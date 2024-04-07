CREATE TABLE IF NOT EXISTS gallery (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    image_url VARCHAR(255),
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO gallery (artist_name, title, description, image_url) VALUES ('John Doe', 'Sunset Over Mountains', 'Beautiful painting capturing the serenity of a sunset over mountains.', 'image_url_here_1');
INSERT INTO gallery (artist_name, title, description, image_url) VALUES ('Jane Smith', 'Cityscape at Night', 'Vibrant city lights that come alive at night.', 'image_url_here_2');
INSERT INTO gallery (artist_name, title, description, image_url) VALUES ('David Williams', 'Abstract Art', 'A unique and colorful abstract piece that sparks imagination.', 'image_url_here_3');
INSERT INTO gallery (artist_name, title, description, image_url) VALUES ('Emily Brown', 'Floral Fantasy', 'Exquisite floral patterns in a dreamy setting.', 'image_url_here_4');
INSERT INTO gallery (artist_name, title, description, image_url) VALUES ('Michael Johnson', 'Rural Landscape', 'Tranquil depiction of a countryside landscape.', 'image_url_here_5');
INSERT INTO gallery (artist_name, title, description, image_url) VALUES ('Sarah Lee', 'Ocean Waves', 'Dynamic portrayal of crashing waves along the shore.', 'image_url_here_6');
INSERT INTO gallery (artist_name, title, description, image_url) VALUES ('Chris Parker', 'Urban Graffiti', 'Bold and expressive graffiti art on city walls.', 'image_url_here_7');
INSERT INTO gallery (artist_name, title, description, image_url) VALUES ('Laura Adams', 'Celestial Skies', 'Majestic scenes of the night sky with stars and galaxies.', 'image_url_here_8');
INSERT INTO gallery (artist_name, title, description, image_url) VALUES ('Alex Turner', 'Industrial Revolution', 'Artistic interpretation of the industrial era in history.', 'image_url_here_9');
INSERT INTO gallery (artist_name, title, description, image_url) VALUES ('Megan Roberts', 'Surreal Dreams', 'Whimsical and surreal artwork that transports to another world.', 'image_url_here_10');
