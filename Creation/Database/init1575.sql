CREATE TABLE IF NOT EXISTS artworks (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(50) NOT NULL,
    artwork_title VARCHAR(100) NOT NULL,
    creation_date DATE,
    description TEXT,
    image_url VARCHAR(255),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO artworks (artist_name, artwork_title, creation_date, description, image_url) 
VALUES ('John Doe', 'Sunset Over Mountains', '2021-10-15', 'Beautiful painting of a sunset over mountains', 'https://example.com/sunset.jpg'),
       ('Jane Smith', 'Abstract Portrait', '2021-09-20', 'Unique abstract portrait art piece', 'https://example.com/abstract.jpg'),
       ('Michael Johnson', 'Cityscape', '2021-08-05', 'Detailed cityscape painting', 'https://example.com/cityscape.jpg'),
       ('Emily White', 'Floral Still Life', '2021-07-12', 'Vibrant floral still life artwork', 'https://example.com/floral.jpg'),
       ('Ryan Brown', 'Ocean Waves', '2021-06-28', 'Captivating ocean waves painting', 'https://example.com/ocean.jpg'),
       ('Sarah Wilson', 'Surreal Landscape', '2021-05-15', 'Dreamy surreal landscape artwork', 'https://example.com/surreal.jpg'),
       ('David Lee', 'Wildlife Scene', '2021-04-03', 'Realistic wildlife scene painting', 'https://example.com/wildlife.jpg'),
       ('Melissa Adams', 'Modern Architecture', '2021-03-19', 'Modern architecture art piece', 'https://example.com/architecture.jpg'),
       ('Chris Roberts', 'Fantasy Realm', '2021-02-08', 'Imaginative fantasy realm painting', 'https://example.com/fantasy.jpg'),
       ('Olivia Green', 'Still Waters', '2021-01-21', 'Tranquil still waters artwork', 'https://example.com/still.jpg');
