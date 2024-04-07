CREATE TABLE IF NOT EXISTS gallery (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
artist_name VARCHAR(50) NOT NULL,
art_title VARCHAR(50),
art_description TEXT,
creation_date TIMESTAMP
);

INSERT INTO gallery (artist_name, art_title, art_description) VALUES ('John Doe', 'Sunset Over Mountains', 'Beautiful painting capturing the serene sunset over mountains');
INSERT INTO gallery (artist_name, art_title, art_description) VALUES ('Jane Smith', 'Abstract Shapes', 'Intriguing artwork with irregular shapes and vibrant colors');
INSERT INTO gallery (artist_name, art_title, art_description) VALUES ('Alex Johnson', 'Cityscape at Dusk', 'Detailed painting depicting a cityscape during dusk');
INSERT INTO gallery (artist_name, art_title, art_description) VALUES ('Emily Brown', 'Floral Fantasy', 'Dreamy artwork showcasing a floral fantasy world');
INSERT INTO gallery (artist_name, art_title, art_description) VALUES ('Michael Williams', 'Ocean Waves', 'Realistic portrayal of crashing ocean waves');
INSERT INTO gallery (artist_name, art_title, art_description) VALUES ('Sarah Lee', 'Celestial Dreams', 'Whimsical painting inspired by celestial elements');
INSERT INTO gallery (artist_name, art_title, art_description) VALUES ('David Martinez', 'Urban Graffiti', 'Raw and edgy artwork featuring urban graffiti style');
INSERT INTO gallery (artist_name, art_title, art_description) VALUES ('Rachel Adams', 'Surreal Landscapes', 'Mystical landscapes that blur the line between reality and imagination');
INSERT INTO gallery (artist_name, art_title, art_description) VALUES ('Daniel White', 'Abstract Forms', 'Contemporary artwork exploring abstract forms and textures');
INSERT INTO gallery (artist_name, art_title, art_description) VALUES ('Olivia Scott', 'Wildlife Wonders', 'Captivating artwork showcasing the beauty of wildlife in its natural habitat');
