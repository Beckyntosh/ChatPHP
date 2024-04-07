CREATE TABLE IF NOT EXISTS artwork (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
artist_name VARCHAR(255) NOT NULL,
artwork_name VARCHAR(255) NOT NULL,
description TEXT NOT NULL,
image_path VARCHAR(1000) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO artwork (artist_name, artwork_name, description, image_path) VALUES ('Jane Doe', 'Sunset Painting', 'A beautiful painting of a sunset', 'uploads/sunset_painting.jpg');
INSERT INTO artwork (artist_name, artwork_name, description, image_path) VALUES ('John Smith', 'Abstract Vase', 'An abstract representation of a vase', 'uploads/abstract_vase.jpg');
INSERT INTO artwork (artist_name, artwork_name, description, image_path) VALUES ('Emily Johnson', 'Nature Scene', 'A serene painting of a nature scene', 'uploads/nature_scene.jpg');
INSERT INTO artwork (artist_name, artwork_name, description, image_path) VALUES ('Michael Brown', 'Cityscape', 'A vibrant cityscape painting', 'uploads/cityscape.jpg');
INSERT INTO artwork (artist_name, artwork_name, description, image_path) VALUES ('Sarah White', 'Floral Arrangement', 'A detailed floral arrangement painting', 'uploads/floral_arrangement.jpg');
INSERT INTO artwork (artist_name, artwork_name, description, image_path) VALUES ('David Lee', 'Abstract Waves', 'Dynamic waves painting in abstract style', 'uploads/abstract_waves.jpg');
INSERT INTO artwork (artist_name, artwork_name, description, image_path) VALUES ('Olivia Chen', 'Portrait Sketch', 'An expressive sketch of a person', 'uploads/portrait_sketch.jpg');
INSERT INTO artwork (artist_name, artwork_name, description, image_path) VALUES ('Ryan Miller', 'Digital Artwork', 'Modern digital artwork in vibrant colors', 'uploads/digital_artwork.jpg');
INSERT INTO artwork (artist_name, artwork_name, description, image_path) VALUES ('Grace Taylor', 'Landscape Painting', 'Panoramic landscape painting with rich colors', 'uploads/landscape_painting.jpg');
INSERT INTO artwork (artist_name, artwork_name, description, image_path) VALUES ('Lucas Wilson', 'Still Life', 'Classic still life painting with intricate details', 'uploads/still_life.jpg');
