CREATE TABLE IF NOT EXISTS destinations (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  country VARCHAR(30) NOT NULL,
  description TEXT,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  );
INSERT INTO destinations (name, country, description) VALUES ('Paris', 'France', 'City of Love');
INSERT INTO destinations (name, country, description) VALUES ('Tokyo', 'Japan', 'Vibrant city with rich culture');
INSERT INTO destinations (name, country, description) VALUES ('Rome', 'Italy', 'Historical city with ancient ruins');
INSERT INTO destinations (name, country, description) VALUES ('New York', 'USA', 'The Big Apple');
INSERT INTO destinations (name, country, description) VALUES ('Sydney', 'Australia', 'Beautiful harbor city');
INSERT INTO destinations (name, country, description) VALUES ('Rio de Janeiro', 'Brazil', 'Famous for Carnival and beaches');
INSERT INTO destinations (name, country, description) VALUES ('Cape Town', 'South Africa', 'Stunning natural landscapes');
INSERT INTO destinations (name, country, description) VALUES ('Moscow', 'Russia', 'Rich in history and architecture');
INSERT INTO destinations (name, country, description) VALUES ('Dubai', 'UAE', 'Luxurious city in the desert');
INSERT INTO destinations (name, country, description) VALUES ('Barcelona', 'Spain', 'Artistic and vibrant city');

CREATE TABLE IF NOT EXISTS accommodations (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  destination_id INT(6) UNSIGNED,
  name VARCHAR(50),
  booking_details TEXT,
  FOREIGN KEY (destination_id) REFERENCES destinations(id)
  );

CREATE TABLE IF NOT EXISTS activities (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  destination_id INT(6) UNSIGNED,
  name VARCHAR(50),
  description TEXT,
  FOREIGN KEY (destination_id) REFERENCES destinations(id)
  );