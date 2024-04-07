CREATE TABLE IF NOT EXISTS images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    artist VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    tags VARCHAR(255),
    image_url VARCHAR(255) NOT NULL,
    upload_date DATE NOT NULL
);

-- Insert sample data into images table
INSERT INTO images (artist, title, tags, image_url, upload_date) VALUES
('John Doe', 'Sunset', 'nature', 'http://example.com/image1.jpg', '2021-10-01'),
('Jane Smith', 'Cityscape', 'city, skyline', 'http://example.com/image2.jpg', '2021-10-02'),
('Michael Johnson', 'Abstract Art', 'abstract', 'http://example.com/image3.jpg', '2021-10-03'),
('Sarah Brown', 'Flowers', 'flowers, garden', 'http://example.com/image4.jpg', '2021-10-04'),
('Alex White', 'Mountains', 'mountains, landscape', 'http://example.com/image5.jpg', '2021-10-05'),
('Emily Davis', 'Wildlife', 'animals, nature', 'http://example.com/image6.jpg', '2021-10-06'),
('Daniel Wilson', 'Seascape', 'sea, ocean', 'http://example.com/image7.jpg', '2021-10-07'),
('Laura Miller', 'Architecture', 'building, structure', 'http://example.com/image8.jpg', '2021-10-08'),
('Kevin Martinez', 'Sunrise', 'sun, dawn', 'http://example.com/image9.jpg', '2021-10-09'),
('Olivia Adams', 'Abstract Shapes', 'abstract, geometric', 'http://example.com/image10.jpg', '2021-10-10');
