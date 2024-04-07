CREATE TABLE IF NOT EXISTS Artworks (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
artist_name VARCHAR(50) NOT NULL,
artwork_title VARCHAR(100) NOT NULL,
artwork_description TEXT NOT NULL,
filename VARCHAR(100) NOT NULL,
upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Artworks (artist_name, artwork_title, artwork_description, filename) VALUES ('John Smith', 'Sunset Over Mountains', 'Beautiful painting capturing the serenity of a sunset over mountains', 'sunset_mountains.jpg');
INSERT INTO Artworks (artist_name, artwork_title, artwork_description, filename) VALUES ('Lisa Johnson', 'Mystical Forest', 'Surreal depiction of a magical forest', 'mystical_forest.jpg');
INSERT INTO Artworks (artist_name, artwork_title, artwork_description, filename) VALUES ('David White', 'Dreamland', 'A dreamy landscape painting with vibrant colors', 'dreamland.jpg');
INSERT INTO Artworks (artist_name, artwork_title, artwork_description, filename) VALUES ('Emma Reed', 'Abstract Waves', 'Abstract artwork representing ocean waves in a unique way', 'abstract_waves.jpg');
INSERT INTO Artworks (artist_name, artwork_title, artwork_description, filename) VALUES ('Michael Evans', 'City Lights', 'Urban painting capturing the essence of city nightlife', 'city_lights.jpg');
INSERT INTO Artworks (artist_name, artwork_title, artwork_description, filename) VALUES ('Sophie Brown', 'Whimsical Fantasy', 'Whimsical and fantastical artwork filled with imagination', 'fantasy_art.jpg');
INSERT INTO Artworks (artist_name, artwork_title, artwork_description, filename) VALUES ('Adam Parker', 'Galactic Dreams', 'Artwork depicting dreams in outer space', 'galactic_dreams.jpg');
INSERT INTO Artworks (artist_name, artwork_title, artwork_description, filename) VALUES ('Olivia Green', 'Enchanted Garden', 'Magical garden painting with mystical elements', 'enchanted_garden.jpg');
INSERT INTO Artworks (artist_name, artwork_title, artwork_description, filename) VALUES ('Benjamin Taylor', 'Sunrise Serenity', 'Tranquil sunrise painting bringing a sense of peace', 'sunrise_serenity.jpg');
INSERT INTO Artworks (artist_name, artwork_title, artwork_description, filename) VALUES ('Rachel Carter', 'Ethereal Skies', 'Ethereal painting capturing the beauty of the sky', 'ethereal_skies.jpg');
