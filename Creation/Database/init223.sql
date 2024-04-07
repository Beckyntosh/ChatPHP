CREATE TABLE IF NOT EXISTS destinations (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  destination_name VARCHAR(30) NOT NULL,
  location VARCHAR(50),
  description TEXT,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  destination_id INT(6) UNSIGNED,
  author VARCHAR(30) NOT NULL,
  review TEXT,
  rating INT(1),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (destination_id) REFERENCES destinations(id)
);

INSERT INTO destinations (destination_name, location, description) VALUES ('Paris', 'France', 'City of Love');
INSERT INTO destinations (destination_name, location, description) VALUES ('Tokyo', 'Japan', 'Vibrant city with rich culture');
INSERT INTO destinations (destination_name, location, description) VALUES ('New York City', 'USA', 'The Big Apple');
INSERT INTO destinations (destination_name, location, description) VALUES ('London', 'UK', 'Historical and diverse city');
INSERT INTO destinations (destination_name, location, description) VALUES ('Dubai', 'UAE', 'City of luxury and innovation');
INSERT INTO destinations (destination_name, location, description) VALUES ('Sydney', 'Australia', 'Iconic harbor city');
INSERT INTO destinations (destination_name, location, description) VALUES ('Rio de Janeiro', 'Brazil', 'Beautiful coastal city');
INSERT INTO destinations (destination_name, location, description) VALUES ('Cape Town', 'South Africa', 'Stunning natural landscapes');
INSERT INTO destinations (destination_name, location, description) VALUES ('Barcelona', 'Spain', 'Exquisite architecture and culture');
INSERT INTO destinations (destination_name, location, description) VALUES ('Rome', 'Italy', 'Eternal city rich in history');