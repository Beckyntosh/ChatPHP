CREATE TABLE IF NOT EXISTS properties (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(50) NOT NULL,
address VARCHAR(100) NOT NULL,
description TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
property_id INT(6) UNSIGNED,
content TEXT,
rating INT(1),
author VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
FOREIGN KEY (property_id) REFERENCES properties(id)
);

INSERT INTO properties (title, address, description) VALUES ('Luxury Villa', '123 Main St', 'Spacious villa with modern amenities');
INSERT INTO properties (title, address, description) VALUES ('Cozy Apartment', '456 Elm St', 'Charming apartment in a quiet neighborhood');
INSERT INTO properties (title, address, description) VALUES ('Beachfront Condo', '789 Ocean Ave', 'Stunning views of the ocean from this condo');
INSERT INTO properties (title, address, description) VALUES ('Country Cottage', '321 Maple Rd', 'Quaint cottage surrounded by nature');
INSERT INTO properties (title, address, description) VALUES ('Urban Loft', '555 Pine St', 'Industrial chic loft in the city center');

INSERT INTO reviews (property_id, content, rating, author) VALUES (1, 'Amazing property, loved every moment!', 5, 'John Doe');
INSERT INTO reviews (property_id, content, rating, author) VALUES (1, 'Great experience, would highly recommend', 4, 'Jane Smith');
INSERT INTO reviews (property_id, content, rating, author) VALUES (2, 'Perfect for a cozy weekend getaway', 4, 'Alice Johnson');
INSERT INTO reviews (property_id, content, rating, author) VALUES (3, 'Dream vacation spot, will definitely return', 5, 'Michael Lee');
INSERT INTO reviews (property_id, content, rating, author) VALUES (4, 'Serene and peaceful retreat', 4, 'Sarah Brown');
INSERT INTO reviews (property_id, content, rating, author) VALUES (5, 'Unique and stylish loft, enjoyed every minute', 5, 'Emily Wilson');
INSERT INTO reviews (property_id, content, rating, author) VALUES (5, 'Good location, modern amenities', 3, 'David Miller');
INSERT INTO reviews (property_id, content, rating, author) VALUES (1, 'Could use some updates, but overall a nice stay', 3, 'Olivia Taylor');
INSERT INTO reviews (property_id, content, rating, author) VALUES (3, 'Great beach access, family-friendly', 4, 'Sophia Martinez');
INSERT INTO reviews (property_id, content, rating, author) VALUES (2, 'Convenient location, comfortable stay', 4, 'James Anderson');
