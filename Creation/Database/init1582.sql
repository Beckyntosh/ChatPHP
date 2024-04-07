CREATE TABLE IF NOT EXISTS artworks (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(50) NOT NULL,
    artwork_title VARCHAR(50) NOT NULL,
    artwork_description TEXT NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO artworks (artist_name, artwork_title, artwork_description) VALUES 
("John Doe", "Sunset Over Mountains", "Beautiful painting capturing the serene beauty of a sunset over mountains"),
("Jane Smith", "Lakeside Reflections", "A mesmerizing reflection of a lake in the calm of the evening"),
("Michael Johnson", "Urban Chaos", "Abstract representation of the chaotic energy of a bustling city"),
("Emily White", "Nature's Symphony", "Vivid colors depicting the harmony of nature's elements"),
("David Brown", "Rural Tranquility", "Peaceful landscape painting of a quiet countryside scene"),
("Sarah Roberts", "Dance of the Fireflies", "Whimsical artwork illustrating the magical dance of fireflies in the night"),
("Alexa Green", "Ocean Bliss", "Dreamy seascape capturing the tranquility of the ocean waves"),
("Samuel Lee", "Cityscape Elegance", "Stunning city skyline showcasing the elegance of urban architecture"),
("Sophia Martinez", "Floral Fantasy", "Colorful and vibrant floral painting evoking a sense of joy and beauty"),
("William Thompson", "Abstract Dreams", "Surreal and thought-provoking abstract artwork stimulating the imagination");