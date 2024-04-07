CREATE TABLE IF NOT EXISTS destinations (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  description TEXT,
  latitude DECIMAL(10, 8),
  longitude DECIMAL(11, 8),
  reg_date TIMESTAMP
);

INSERT INTO destinations (name, description, latitude, longitude) VALUES ('Paris', 'Capital of France', 48.8566, 2.3522);
INSERT INTO destinations (name, description, latitude, longitude) VALUES ('Tokyo', 'Capital of Japan', 35.6895, 139.6917);
INSERT INTO destinations (name, description, latitude, longitude) VALUES ('New York City', 'City in the United States', 40.7128, -74.0060);
INSERT INTO destinations (name, description, latitude, longitude) VALUES ('Sydney', 'Capital of New South Wales, Australia', -33.8688, 151.2093);
INSERT INTO destinations (name, description, latitude, longitude) VALUES ('Rio de Janeiro', 'City in Brazil', -22.9068, -43.1729);
INSERT INTO destinations (name, description, latitude, longitude) VALUES ('Dubai', 'City in the United Arab Emirates', 25.276987, 55.296249);
INSERT INTO destinations (name, description, latitude, longitude) VALUES ('Barcelona', 'City in Spain', 41.3851, 2.1734);
INSERT INTO destinations (name, description, latitude, longitude) VALUES ('Cape Town', 'City in South Africa', -33.9249, 18.4241);
INSERT INTO destinations (name, description, latitude, longitude) VALUES ('Venice', 'City in Italy', 45.4408, 12.3155);
INSERT INTO destinations (name, description, latitude, longitude) VALUES ('Istanbul', 'City in Turkey', 41.0082, 28.9784);
