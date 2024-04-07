CREATE TABLE IF NOT EXISTS properties (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
property_type VARCHAR(30) NOT NULL,
price DECIMAL(10, 2) NOT NULL,
neighborhood VARCHAR(50) NOT NULL,
latitude FLOAT(10, 6) NOT NULL,
longitude FLOAT(10, 6) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO properties (property_type, price, neighborhood, latitude, longitude)
VALUES ('House', 250000.00, 'Suburban', 41.8781, -87.6298),
       ('Apartment', 1500.00, 'Urban', 34.0522, -118.2437),
       ('House', 350000.00, 'Rural', 40.7128, -74.0060),
       ('House', 200000.00, 'Suburban', 51.5074, -0.1278),
       ('Apartment', 2000.00, 'Urban', 48.8566, 2.3522),
       ('Apartment', 1800.00, 'Urban', 35.6895, 139.6917),
       ('House', 300000.00, 'Rural', 52.5200, 13.4050),
       ('House', 275000.00, 'Suburban', 37.7749, -122.4194),
       ('House', 320000.00, 'Suburban', 55.7558, 37.6176),
       ('Apartment', 1700.00, 'Urban', 40.7128, -74.0060);
