CREATE TABLE IF NOT EXISTS artworks (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    artist VARCHAR(255) NOT NULL,
    description TEXT,
    image VARCHAR(255),
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO artworks (title, artist, description, image) VALUES ('Sunset Over Mountains', 'ArtistName1', 'Beautiful painting of sunset over mountains', 'sunset_mountains.jpg');
INSERT INTO artworks (title, artist, description, image) VALUES ('Abstract Artwork', 'ArtistName2', 'Unique abstract painting', 'abstract.jpg');
INSERT INTO artworks (title, artist, description, image) VALUES ('Portrait Painting', 'ArtistName3', 'Realistic portrait painting', 'portrait.jpg');
INSERT INTO artworks (title, artist, description, image) VALUES ('Landscape Art', 'ArtistName4', 'Detailed landscape painting', 'landscape.jpg');
INSERT INTO artworks (title, artist, description, image) VALUES ('Still Life', 'ArtistName5', 'Vibrant still life painting', 'still_life.jpg');
INSERT INTO artworks (title, artist, description, image) VALUES ('Cityscape', 'ArtistName6', 'Dynamic cityscape artwork', 'cityscape.jpg');
INSERT INTO artworks (title, artist, description, image) VALUES ('Nature Painting', 'ArtistName7', 'Nature-inspired painting', 'nature.jpg');
INSERT INTO artworks (title, artist, description, image) VALUES ('Pop Art', 'ArtistName8', 'Pop art style painting', 'popart.jpg');
INSERT INTO artworks (title, artist, description, image) VALUES ('Surrealism', 'ArtistName9', 'Surrealistic painting', 'surrealism.jpg');
INSERT INTO artworks (title, artist, description, image) VALUES ('Abstract Expressionism', 'ArtistName10', 'Expressive abstract art', 'abstract_exp.jpg');