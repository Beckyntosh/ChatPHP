CREATE TABLE IF NOT EXISTS Destinations (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  latitude DECIMAL(10, 8) NOT NULL,
  longitude DECIMAL(11, 8) NOT NULL,
  description TEXT,
  reg_date TIMESTAMP
);

INSERT INTO Destinations (name, latitude, longitude, description, reg_date) VALUES
('Paris', 48.8566, 2.3522, 'City of love', CURRENT_TIMESTAMP),
('Tokyo', 35.6762, 139.6503, 'Vibrant metropolis', CURRENT_TIMESTAMP),
('Sydney', -33.8688, 151.2093, 'Iconic Opera House', CURRENT_TIMESTAMP),
('Cape Town', -33.9249, 18.4241, 'Stunning coastlines', CURRENT_TIMESTAMP),
('New York', 40.7128, -74.0060, 'Concrete jungle', CURRENT_TIMESTAMP),
('Dubai', 25.276987, 55.296249, 'Modern marvel', CURRENT_TIMESTAMP),
('Rio de Janeiro', -22.9068, -43.1729, 'Carnival capital', CURRENT_TIMESTAMP),
('Barcelona', 41.3851, 2.1734, 'Architectural beauty', CURRENT_TIMESTAMP),
('Auckland', -36.84846, 174.763332, 'City of sails', CURRENT_TIMESTAMP),
('Amsterdam', 52.3667, 4.8945, 'Canal city', CURRENT_TIMESTAMP);