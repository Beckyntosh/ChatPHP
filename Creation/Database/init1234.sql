CREATE TABLE IF NOT EXISTS travel_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(50) NOT NULL,
    flight VARCHAR(100),
    hotel VARCHAR(100),
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

INSERT INTO travel_plans (destination, flight, hotel) VALUES 
('Paris', 'ABC Airlines', 'Hotel ABC'),
('London', 'XYZ Airlines', 'Hotel XYZ'),
('Tokyo', '123 Airlines', 'Hotel 123'),
('New York', 'DEF Airlines', 'Hotel DEF'),
('Sydney', 'GHI Airlines', 'Hotel GHI'),
('Rome', 'LMN Airlines', 'Hotel LMN'),
('Cairo', 'JKL Airlines', 'Hotel JKL'),
('Dubai', 'QRS Airlines', 'Hotel QRS'),
('Barcelona', 'TUV Airlines', 'Hotel TUV'),
('Cape Town', 'WXY Airlines', 'Hotel WXY');
