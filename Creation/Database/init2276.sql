CREATE TABLE UserProfile (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    favorite_color VARCHAR(50) NOT NULL,
    shirt_size VARCHAR(5) NOT NULL,
    jeans_size INT NOT NULL,
    shoe_size INT NOT NULL,
    style_preference VARCHAR(50)
);

INSERT INTO UserProfile (user_id, favorite_color, shirt_size, jeans_size, shoe_size, style_preference) VALUES (1, 'Blue', 'M', 32, 10, 'Casual');
INSERT INTO UserProfile (user_id, favorite_color, shirt_size, jeans_size, shoe_size, style_preference) VALUES (2, 'Red', 'L', 34, 11, 'Sporty');
INSERT INTO UserProfile (user_id, favorite_color, shirt_size, jeans_size, shoe_size, style_preference) VALUES (3, 'Green', 'S', 30, 9, 'Formal');
INSERT INTO UserProfile (user_id, favorite_color, shirt_size, jeans_size, shoe_size, style_preference) VALUES (4, 'Black', 'XL', 36, 12, 'Streetwear');
INSERT INTO UserProfile (user_id, favorite_color, shirt_size, jeans_size, shoe_size, style_preference) VALUES (5, 'Pink', 'M', 32, 10, 'Vintage');
INSERT INTO UserProfile (user_id, favorite_color, shirt_size, jeans_size, shoe_size, style_preference) VALUES (6, 'Yellow', 'L', 34, 11, 'Bohemian');
INSERT INTO UserProfile (user_id, favorite_color, shirt_size, jeans_size, shoe_size, style_preference) VALUES (7, 'Purple', 'S', 30, 9, 'Preppy');
INSERT INTO UserProfile (user_id, favorite_color, shirt_size, jeans_size, shoe_size, style_preference) VALUES (8, 'White', 'XL', 36, 12, 'Gothic');
INSERT INTO UserProfile (user_id, favorite_color, shirt_size, jeans_size, shoe_size, style_preference) VALUES (9, 'Orange', 'M', 32, 10, 'Punk');
INSERT INTO UserProfile (user_id, favorite_color, shirt_size, jeans_size, shoe_size, style_preference) VALUES (10, 'Brown', 'L', 34, 11, 'Retro');
