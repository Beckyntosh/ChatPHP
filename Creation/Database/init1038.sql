CREATE TABLE IF NOT EXISTS restaurants (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
description TEXT,
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
restaurant_id INT(6) UNSIGNED,
rating INT(1),
content TEXT,
reg_date TIMESTAMP,
FOREIGN KEY (restaurant_id) REFERENCES restaurants(id)
);

INSERT INTO restaurants (name, description) VALUES ('Restaurant A', 'Great food and atmosphere');
INSERT INTO restaurants (name, description) VALUES ('Restaurant B', 'Cozy and welcoming');
INSERT INTO restaurants (name, description) VALUES ('Restaurant C', 'Unique dishes and friendly staff');
INSERT INTO restaurants (name, description) VALUES ('Restaurant D', 'Family-friendly with a diverse menu');
INSERT INTO restaurants (name, description) VALUES ('Restaurant E', 'Fine dining experience with a view');

INSERT INTO reviews (restaurant_id, rating, content) VALUES (1, 4, 'Delicious dishes, will definitely come back');
INSERT INTO reviews (restaurant_id, rating, content) VALUES (2, 3, 'Good food, but service could be improved');
INSERT INTO reviews (restaurant_id, rating, content) VALUES (3, 5, 'Outstanding experience, highly recommend');
INSERT INTO reviews (restaurant_id, rating, content) VALUES (4, 4, 'Lovely atmosphere and tasty options');
INSERT INTO reviews (restaurant_id, rating, content) VALUES (5, 5, 'Exquisite menu and attentive staff');
