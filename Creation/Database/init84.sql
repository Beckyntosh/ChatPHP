CREATE TABLE IF NOT EXISTS gallery_images (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    image_url VARCHAR(100) NOT NULL,
    tags VARCHAR(50),
    date DATE,
    artist VARCHAR(50)
);

INSERT INTO gallery_images (title, image_url, tags, date, artist) VALUES ('Skateboard Art 1', 'image1.jpg', 'skateboarding, art', '2022-04-10', 'Artist1');
INSERT INTO gallery_images (title, image_url, tags, date, artist) VALUES ('Skateboard Art 2', 'image2.jpg', 'skateboarding, design', '2022-04-15', 'Artist2');
INSERT INTO gallery_images (title, image_url, tags, date, artist) VALUES ('Skateboard Art 3', 'image3.jpg', 'skateboarding, graffiti', '2022-04-20', 'Artist3');
INSERT INTO gallery_images (title, image_url, tags, date, artist) VALUES ('Skateboard Art 4', 'image4.jpg', 'skateboarding, painting', '2022-04-25', 'Artist1');
INSERT INTO gallery_images (title, image_url, tags, date, artist) VALUES ('Skateboard Art 5', 'image5.jpg', 'skateboarding, street art', '2022-04-30', 'Artist2');
INSERT INTO gallery_images (title, image_url, tags, date, artist) VALUES ('Skateboard Art 6', 'image6.jpg', 'skateboarding, illustration', '2022-05-05', 'Artist3');
INSERT INTO gallery_images (title, image_url, tags, date, artist) VALUES ('Skateboard Art 7', 'image7.jpg', 'skateboarding, photography', '2022-05-10', 'Artist1');
INSERT INTO gallery_images (title, image_url, tags, date, artist) VALUES ('Skateboard Art 8', 'image8.jpg', 'skateboarding, graphic design', '2022-05-15', 'Artist2');
INSERT INTO gallery_images (title, image_url, tags, date, artist) VALUES ('Skateboard Art 9', 'image9.jpg', 'skateboarding, sculpture', '2022-05-20', 'Artist3');
INSERT INTO gallery_images (title, image_url, tags, date, artist) VALUES ('Skateboard Art 10', 'image10.jpg', 'skateboarding, mixed media', '2022-05-25', 'Artist1');
