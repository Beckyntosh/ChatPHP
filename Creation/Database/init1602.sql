CREATE TABLE IF NOT EXISTS art_gallery (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(100) NOT NULL,
    artwork_title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    image_path VARCHAR(255),
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO art_gallery (artist_name, artwork_title, description, image_path) VALUES ('John Doe', 'Sunset Over Mountains', 'Beautiful painting capturing the serenity of a sunset over mountains.', 'uploads/sunset_mountains.jpg');
INSERT INTO art_gallery (artist_name, artwork_title, description, image_path) VALUES ('Jane Smith', 'Abstract Shapes', 'Vibrant and abstract artwork exploring geometric shapes and colors.', 'uploads/abstract_shapes.jpg');
INSERT INTO art_gallery (artist_name, artwork_title, description, image_path) VALUES ('Alex Johnson', 'Cityscape at Night', 'Detailed cityscape painting depicting a busy urban night scene.', 'uploads/cityscape_night.jpg');
INSERT INTO art_gallery (artist_name, artwork_title, description, image_path) VALUES ('Emily Brown', 'Floral Beauty', 'Intricate floral painting showcasing the beauty of nature.', 'uploads/floral_beauty.jpg');
INSERT INTO art_gallery (artist_name, artwork_title, description, image_path) VALUES ('Michael Lee', 'Wildlife Encounter', 'Realistic wildlife painting capturing a close encounter with animals.', 'uploads/wildlife_encounter.jpg');
INSERT INTO art_gallery (artist_name, artwork_title, description, image_path) VALUES ('Sophia Wang', 'Fantasy Dreamland', 'Imaginative artwork depicting a magical and dreamlike world.', 'uploads/fantasy_dreamland.jpg');
INSERT INTO art_gallery (artist_name, artwork_title, description, image_path) VALUES ('Daniel Garcia', 'Ocean Waves', 'Pristine painting of calming ocean waves under a blue sky.', 'uploads/ocean_waves.jpg');
INSERT INTO art_gallery (artist_name, artwork_title, description, image_path) VALUES ('Olivia Turner', 'Sunflower Fields', 'Bright and cheerful artwork capturing the beauty of sunflower fields.', 'uploads/sunflower_fields.jpg');
INSERT INTO art_gallery (artist_name, artwork_title, description, image_path) VALUES ('William Clark', 'Emotional Abstract', 'Abstract artwork evoking strong emotions and interpretations.', 'uploads/emotional_abstract.jpg');
INSERT INTO art_gallery (artist_name, artwork_title, description, image_path) VALUES ('Ava Martinez', 'Dancing in Rain', 'Expressive painting depicting the joy of dancing in the rain.', 'uploads/dancing_rain.jpg');
