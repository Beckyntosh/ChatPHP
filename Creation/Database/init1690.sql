CREATE TABLE IF NOT EXISTS beers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    type VARCHAR(100),
    abv FLOAT,
    description TEXT,
    image_url VARCHAR(255)
);

-- Insert sample data into beers table
INSERT INTO beers (name, type, abv, description, image_url) VALUES 
('Beer1', 'Ale', 5.0, 'Sample description for Beer1', 'beer1.jpg'),
('Beer2', 'Lager', 4.5, 'Sample description for Beer2', 'beer2.jpg'),
('Beer3', 'Stout', 6.2, 'Sample description for Beer3', 'beer3.jpg'),
('Beer4', 'IPA', 7.0, 'Sample description for Beer4', 'beer4.jpg'),
('Beer5', 'Wheat', 4.2, 'Sample description for Beer5', 'beer5.jpg'),
('Beer6', 'Pilsner', 4.8, 'Sample description for Beer6', 'beer6.jpg'),
('Beer7', 'Porter', 5.5, 'Sample description for Beer7', 'beer7.jpg'),
('Beer8', 'Sour', 4.0, 'Sample description for Beer8', 'beer8.jpg'),
('Beer9', 'Pale Ale', 5.8, 'Sample description for Beer9', 'beer9.jpg'),
('Beer10', 'Brown Ale', 5.3, 'Sample description for Beer10', 'beer10.jpg');

-- Create comparisons table
CREATE TABLE IF NOT EXISTS comparisons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    beer1_id INT,
    beer2_id INT,
    FOREIGN KEY (beer1_id) REFERENCES beers(id),
    FOREIGN KEY (beer2_id) REFERENCES beers(id)
);
