CREATE TABLE IF NOT EXISTS restaurants (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  location VARCHAR(255),
  description TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
  id INT AUTO_INCREMENT PRIMARY KEY,
  restaurant_id INT,
  user_name VARCHAR(255),
  rating INT,
  review TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (restaurant_id) REFERENCES restaurants(id)
);

INSERT INTO restaurants (name, location, description) VALUES
('Restaurant A', 'Location A', 'Description A'),
('Restaurant B', 'Location B', 'Description B'),
('Restaurant C', 'Location C', 'Description C'),
('Restaurant D', 'Location D', 'Description D'),
('Restaurant E', 'Location E', 'Description E'),
('Restaurant F', 'Location F', 'Description F'),
('Restaurant G', 'Location G', 'Description G'),
('Restaurant H', 'Location H', 'Description H'),
('Restaurant I', 'Location I', 'Description I'),
('Restaurant J', 'Location J', 'Description J');

INSERT INTO reviews (restaurant_id, user_name, rating, review) VALUES
(1, 'User1', 5, 'Awesome food!'),
(2, 'User2', 4, 'Great service.'),
(3, 'User3', 3, 'Average experience.'),
(4, 'User4', 2, 'Disappointing food quality.'),
(5, 'User5', 5, 'Best restaurant ever!'),
(6, 'User6', 4, 'Nice ambiance.'),
(7, 'User7', 3, 'Could be better.'),
(8, 'User8', 2, 'Not worth the price.'),
(9, 'User9', 4, 'Impressed with the menu.'),
(10, 'User10', 5, 'Highly recommend.');
