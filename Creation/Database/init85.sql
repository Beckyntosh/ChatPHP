CREATE TABLE IF NOT EXISTS images (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    artist VARCHAR(30),
    tags VARCHAR(50),
    upload_date DATE,
    file_path VARCHAR(100),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO images (title, artist, tags, upload_date, file_path) VALUES 
('Sunset', 'Jane Doe', 'nature, landscape', '2021-08-12', 'uploads/sunset.jpg'),
('Portrait', 'John Smith', 'people, portrait', '2021-08-15', 'uploads/portrait.jpg'),
('Abstract', 'Alice Johnson', 'art, abstract', '2021-08-18', 'uploads/abstract.jpg'),
('Cityscape', 'Sam Brown', 'urban, city, skyline', '2021-08-20', 'uploads/cityscape.jpg'),
('Flower', 'Emily White', 'floral, nature', '2021-08-22', 'uploads/flower.jpg'),
('Ocean', 'Michael Green', 'sea, water, beach', '2021-08-25', 'uploads/ocean.jpg'),
('Mural', 'Sarah Lee', 'street art, graffiti', '2021-08-28', 'uploads/mural.jpg'),
('Wildlife', 'David Jones', 'animals, nature', '2021-08-30', 'uploads/wildlife.jpg'),
('Modern', 'Olivia Black', 'contemporary, design', '2021-09-02', 'uploads/modern.jpg'),
('Vintage', 'Robert Gray', 'retro, nostalgia', '2021-09-05', 'uploads/vintage.jpg');
