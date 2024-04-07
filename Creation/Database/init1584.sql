CREATE TABLE IF NOT EXISTS art_gallery (
    id INT AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(255) NOT NULL,
    artwork_title VARCHAR(255) NOT NULL,
    description TEXT,
    image_path VARCHAR(255),
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO art_gallery (artist_name, artwork_title, description, image_path) VALUES 
('John Doe', 'Sunset Over Mountains', 'A beautiful painting of a sunset over mountains.', 'uploads/sunset_mountains.jpg'),
('Jane Smith', 'Morning Bliss', 'A calming painting of a serene morning.', 'uploads/morning_bliss.jpg'),
('Alice Johnson', 'Dancing Trees', 'Vibrant painting capturing dancing trees in the wind.', 'uploads/dancing_trees.jpg'),
('Michael Brown', 'Abstract Reflection', 'Abstract art reflecting emotions and thoughts.', 'uploads/abstract_reflection.jpg'),
('Sarah White', 'Ocean Serenity', 'Captivating painting showcasing the serenity of the ocean.', 'uploads/ocean_serenity.jpg'),
('David Lee', 'City Lights', 'Dynamic painting illustrating the lights of a bustling city.', 'uploads/city_lights.jpg'),
('Emily Anderson', 'Floral Elegance', 'Elegant painting featuring colorful floral arrangements.', 'uploads/floral_elegance.jpg'),
('Mark Taylor', 'Mountain Majesty', 'Majestic painting depicting the grandeur of mountains.', 'uploads/mountain_majesty.jpg'),
('Laura Clark', 'Dreamy Waters', 'Dreamlike painting capturing the essence of dreamy waters.', 'uploads/dreamy_waters.jpg'),
('Chris Young', 'Sunset Horizon', 'Inspiring painting showcasing the beauty of a sunset.', 'uploads/sunset_horizon.jpg');
