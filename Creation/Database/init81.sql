CREATE TABLE images (
  id INT AUTO_INCREMENT PRIMARY KEY,
  image_path VARCHAR(255) NOT NULL,
  tags VARCHAR(255),
  artist VARCHAR(100)
);

INSERT INTO images (image_path, tags, artist) VALUES ('image1.jpg', 'nature, landscape', 'John Doe');
INSERT INTO images (image_path, tags, artist) VALUES ('image2.jpg', 'abstract, color', 'Jane Smith');
INSERT INTO images (image_path, tags, artist) VALUES ('image3.jpg', 'portrait, black and white', 'Michael Johnson');
INSERT INTO images (image_path, tags, artist) VALUES ('image4.jpg', 'cityscape, architecture', 'Emily Brown');
INSERT INTO images (image_path, tags, artist) VALUES ('image5.jpg', 'animals, wildlife', 'Robert Davis');
INSERT INTO images (image_path, tags, artist) VALUES ('image6.jpg', 'travel, adventure', 'Sarah Wilson');
INSERT INTO images (image_path, tags, artist) VALUES ('image7.jpg', 'food, culinary', 'Chris Lee');
INSERT INTO images (image_path, tags, artist) VALUES ('image8.jpg', 'fashion, style', 'Anna Martinez');
INSERT INTO images (image_path, tags, artist) VALUES ('image9.jpg', 'sports, action', 'Peter Thompson');
INSERT INTO images (image_path, tags, artist) VALUES ('image10.jpg', 'music, performance', 'Laura White');
