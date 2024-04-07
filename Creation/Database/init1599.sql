CREATE TABLE IF NOT EXISTS artworks (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(50) NOT NULL,
    artwork_title VARCHAR(50),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO artworks (artist_name, artwork_title, description) VALUES ('John Doe', 'Sunset Over Mountains', 'A beautiful painting depicting a scene of sunset over mountains');
INSERT INTO artworks (artist_name, artwork_title, description) VALUES ('Jane Smith', 'Abstract Patterns', 'An abstract artwork with colorful patterns and shapes');
INSERT INTO artworks (artist_name, artwork_title, description) VALUES ('Michael Jordan', 'Cityscape at Dusk', 'A cityscape painting capturing the beauty of dusk');
INSERT INTO artworks (artist_name, artwork_title, description) VALUES ('Emily Brown', 'Floral Arrangement', 'A painting showcasing a vibrant floral arrangement');
INSERT INTO artworks (artist_name, artwork_title, description) VALUES ('David Lee', 'Wildlife Exploration', 'An artwork depicting various wildlife species in their natural habitat');
INSERT INTO artworks (artist_name, artwork_title, description) VALUES ('Sarah Park', 'Dreamy Waterfalls', 'A dreamy depiction of a serene waterfall landscape');
INSERT INTO artworks (artist_name, artwork_title, description) VALUES ('Alex Chen', 'Surreal Cityscape', 'A surreal interpretation of a futuristic cityscape');
INSERT INTO artworks (artist_name, artwork_title, description) VALUES ('Lisa Taylor', 'Whimsical Creatures', 'An imaginative creation featuring whimsical and colorful creatures');
INSERT INTO artworks (artist_name, artwork_title, description) VALUES ('Sam Wright', 'Underwater World', 'An artwork showcasing the beauty and diversity of underwater life');
INSERT INTO artworks (artist_name, artwork_title, description) VALUES ('Olivia Adams', 'Celestial Wonders', 'A celestial-themed artwork illustrating the wonders of the universe');
