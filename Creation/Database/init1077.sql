CREATE TABLE IF NOT EXISTS albums (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    artist VARCHAR(255),
    release_year YEAR,
    cover_url VARCHAR(255),
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    album_id INT(6) UNSIGNED,
    user VARCHAR(255) NOT NULL,
    rating INT(1),
    review TEXT,
    review_date TIMESTAMP,
    FOREIGN KEY (album_id) REFERENCES albums(id)
);

INSERT INTO albums (title, artist, release_year, cover_url, reg_date) VALUES 
('Album 1', 'Artist A', '2000', 'image1.jpg', NOW()),
('Album 2', 'Artist B', '2010', 'image2.jpg', NOW()),
('Album 3', 'Artist C', '2020', 'image3.jpg', NOW()),
('Album 4', 'Artist D', '2015', 'image4.jpg', NOW()),
('Album 5', 'Artist E', '2005', 'image5.jpg', NOW()),
('Album 6', 'Artist F', '2018', 'image6.jpg', NOW()),
('Album 7', 'Artist G', '2008', 'image7.jpg', NOW()),
('Album 8', 'Artist H', '2012', 'image8.jpg', NOW()),
('Album 9', 'Artist I', '2017', 'image9.jpg', NOW()),
('Album 10', 'Artist J', '2003', 'image10.jpg', NOW());

INSERT INTO reviews (album_id, user, rating, review, review_date) VALUES 
(1, 'User 1', 4, 'Great album!', NOW()),
(2, 'User 2', 5, 'Fantastic music!', NOW()),
(3, 'User 3', 3, 'Average songs', NOW()),
(4, 'User 4', 2, 'Disappointing', NOW()),
(5, 'User 5', 4, 'Enjoyed it', NOW()),
(6, 'User 6', 5, 'Highly recommended', NOW()),
(7, 'User 7', 1, 'Not my style', NOW()),
(8, 'User 8', 3, 'Decent tracks', NOW()),
(9, 'User 9', 4, 'Impressive work', NOW()),
(10, 'User 10', 5, 'Love this album!', NOW());
