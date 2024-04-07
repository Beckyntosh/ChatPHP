CREATE TABLE IF NOT EXISTS gallery_images (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    image_name VARCHAR(255) NOT NULL,
    artist_name VARCHAR(255),
    creation_date DATE,
    tags VARCHAR(255),
    image_path VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

INSERT INTO gallery_images (image_name, artist_name, creation_date, tags, image_path)
VALUES ('Sneakers in the Run', 'John Doe', '2022-03-15', 'sneakers,run,blue', 'images/sneakers_run.jpg'),
('Walking on Clouds', 'Jane Smith', '2022-03-16', 'clouds,walk,white', 'images/clouds_walk.jpg'),
('Dancing in the Moonlight', 'Alice Johnson', '2022-03-17', 'moonlight,dance,black', 'images/moonlight_dance.jpg'),
('Running Free', 'Bob Brown', '2022-03-18', 'run,field,green', 'images/running_free.jpg'),
('City Lights', 'Sarah Parker', '2022-03-19', 'city,lights,night', 'images/city_lights.jpg'),
('Beach Vibes', 'Michael Adams', '2022-03-20', 'beach,sand,blue', 'images/beach_vibes.jpg'),
('Mountain Escape', 'Emily Wilson', '2022-03-21', 'mountain,nature,peace', 'images/mountain_escape.jpg'),
('Urban Jungle', 'Daniel Lee', '2022-03-22', 'urban,jungle,city', 'images/urban_jungle.jpg'),
('Sunset Serenity', 'Olivia Taylor', '2022-03-23', 'sunset,serene,orange', 'images/sunset_serenity.jpg'),
('Spring Blossoms', 'Charlie Miller', '2022-03-24', 'spring,blossoms,pink', 'images/spring_blossoms.jpg');
