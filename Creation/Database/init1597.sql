CREATE TABLE artworks (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(255) NOT NULL,
    artwork_title VARCHAR(255) NOT NULL,
    description TEXT,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO artworks (artist_name, artwork_title, description) VALUES ('Alice Smith', 'Sunset Over Mountains', 'Beautiful painting capturing the vibrant colors of a sunset over majestic mountains');
INSERT INTO artworks (artist_name, artwork_title, description) VALUES ('Bob Johnson', 'Dreamscape', 'Surreal painting depicting a dreamlike landscape');
INSERT INTO artworks (artist_name, artwork_title, description) VALUES ('Eve Brown', 'Abstract Waves', 'Artwork featuring abstract waves in a variety of colors');
INSERT INTO artworks (artist_name, artwork_title, description) VALUES ('Charlie Davis', 'Mystical Forest', 'Enchanting painting of a mystical forest filled with magical creatures');
INSERT INTO artworks (artist_name, artwork_title, description) VALUES ('Grace Miller', 'Whimsical Creatures', 'Playful artwork showcasing whimsical and colorful creatures');
INSERT INTO artworks (artist_name, artwork_title, description) VALUES ('John White', 'Celestial Dreams', 'Galactic-inspired painting evoking visions of celestial dreams');
INSERT INTO artworks (artist_name, artwork_title, description) VALUES ('Sophia Clark', 'Timeless Elegance', 'Elegant and timeless artwork blending classical and modern elements');
INSERT INTO artworks (artist_name, artwork_title, description) VALUES ('Oliver Lee', 'Urban Reflections', 'Reflective painting capturing the essence of city life in a unique way');
INSERT INTO artworks (artist_name, artwork_title, description) VALUES ('Luna Garcia', 'Moonlit Serenade', 'Magical painting of a moonlit night filled with music and moonlight');
INSERT INTO artworks (artist_name, artwork_title, description) VALUES ('Max Hernandez', 'Future Visions', 'Futuristic artwork exploring visions of the future and technology');
