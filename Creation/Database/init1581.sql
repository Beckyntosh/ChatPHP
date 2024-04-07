CREATE TABLE IF NOT EXISTS artwork (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(30) NOT NULL,
    artwork_title VARCHAR(50),
    artwork_description TEXT,
    artwork_image VARCHAR(100),
    reg_date TIMESTAMP
);

INSERT INTO artwork (artist_name, artwork_title, artwork_description, artwork_image) VALUES 
("John Smith", "Sunset Over Mountains", "A beautiful painting of a sunset over mountains", "image1.jpg"),
("Emily Johnson", "Cityscape at Night", "A vibrant cityscape painting capturing the essence of city lights at night", "image2.jpg"),
("Michael Adams", "Abstract Blue", "An abstract artwork featuring shades of blue and white", "image3.jpg"),
("Sarah Lee", "Sunflowers", "A lively painting of sunflowers in a field", "image4.jpg"),
("David Brown", "Ocean Waves", "A serene painting depicting ocean waves crashing on rocks", "image5.jpg"),
("Alisha Patel", "Urban Reflections", "A modern art piece showcasing reflections in an urban setting", "image6.jpg"),
("Chris Thompson", "Spring Blossoms", "A colorful artwork portraying spring blossoms in full bloom", "image7.jpg"),
("Rachel Green", "Dreamy Landscape", "A dreamy landscape painting with soft colors and gentle brushstrokes", "image8.jpg"),
("Sam Carter", "Abstract Red", "An abstract piece featuring bold red hues in a dynamic composition", "image9.jpg"),
("Hannah White", "Mystic Forest", "An enchanting depiction of a mystic forest with rich details and textures", "image10.jpg");