CREATE TABLE IF NOT EXISTS artworks (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(50) NOT NULL,
    artwork_name VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(100) NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO artworks (artist_name, artwork_name, description, image) VALUES 
('Leonardo da Vinci', 'Mona Lisa', 'Portrait painting', 'monalisa.jpg'),
('Vincent van Gogh', 'Starry Night', 'Landcape painting', 'starrynight.jpg'),
('Pablo Picasso', 'Guernica', 'Oil painting', 'guernica.jpg'),
('Claude Monet', 'Water Lilies', 'Impressionist painting', 'waterlilies.jpg'),
('Salvador Dali', 'The Persistence of Memory', 'Surrealist painting', 'persistenceofmemory.jpg'),
('Georgia O\'Keeffe', 'Red Canna', 'Floral painting', 'redcanna.jpg'),
('Edvard Munch', 'The Scream', 'Expressionist painting', 'thescream.jpg'),
('Michelangelo', 'The Creation of Adam', 'Fresco painting', 'creationofadam.jpg'),
('Frida Kahlo', 'Self-Portrait with Thorn Necklace and Hummingbird', 'Self-portrait painting', 'selfportrait.jpg'),
('Rembrandt', 'The Night Watch', 'Group portrait painting', 'nightwatch.jpg');