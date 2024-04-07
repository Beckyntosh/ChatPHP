CREATE TABLE IF NOT EXISTS artwork (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(50) NOT NULL,
    artwork_title VARCHAR(100) NOT NULL,
    description TEXT,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO artwork (artist_name, artwork_title, description) VALUES ('John Doe', 'Sunset Over Mountains', 'Beautiful painting of a sunset over mountains');
INSERT INTO artwork (artist_name, artwork_title, description) VALUES ('Jane Smith', 'Floral Bliss', 'Vibrant flowers in a blissful garden');
INSERT INTO artwork (artist_name, artwork_title, description) VALUES ('Alex Johnson', 'Ocean Serenity', 'Calm ocean waves under a serene sky');
INSERT INTO artwork (artist_name, artwork_title, description) VALUES ('Emma Brown', 'Dreamy Forest', 'Mystical forest with dreamy hues');
INSERT INTO artwork (artist_name, artwork_title, description) VALUES ('Michael Yang', 'City Lights', 'The bustling cityscape illuminated at night');
INSERT INTO artwork (artist_name, artwork_title, description) VALUES ('Sophia White', 'Abstract Fusion', 'Bold and colorful abstract composition');
INSERT INTO artwork (artist_name, artwork_title, description) VALUES ('William Lee', 'Mountain Majesty', 'Majestic mountains under a clear blue sky');
INSERT INTO artwork (artist_name, artwork_title, description) VALUES ('Olivia Garcia', 'Whimsical Wonderland', 'Whimsical and fantastical world of imagination');
INSERT INTO artwork (artist_name, artwork_title, description) VALUES ('Daniel Martinez', 'Urban Reflections', 'Reflections of urban architecture in water');
INSERT INTO artwork (artist_name, artwork_title, description) VALUES ('Ava Rodriguez', 'Sunflower Symphony', 'Symphony of sunflowers dancing in the sun');
