CREATE TABLE IF NOT EXISTS properties (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    property_type VARCHAR(30) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    neighborhood_features TEXT,
    latitude DECIMAL(10, 8) NOT NULL,
    longitude DECIMAL(11, 8) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

INSERT INTO properties (property_type, price, neighborhood_features, latitude, longitude) VALUES ('House', 300000, 'Near park, Quiet neighborhood', 34.052235, -118.243683);
INSERT INTO properties (property_type, price, neighborhood_features, latitude, longitude) VALUES ('Condo', 250000, 'Close to amenities', 34.062345, -118.252367);
INSERT INTO properties (property_type, price, neighborhood_features, latitude, longitude) VALUES ('Apartment', 200000, 'Downtown location', 34.043567, -118.267895);
INSERT INTO properties (property_type, price, neighborhood_features, latitude, longitude) VALUES ('Duplex', 400000, 'Two-story building', 34.032456, -118.245678);
INSERT INTO properties (property_type, price, neighborhood_features, latitude, longitude) VALUES ('Townhouse', 350000, 'Community pool', 34.045678, -118.239876);
INSERT INTO properties (property_type, price, neighborhood_features, latitude, longitude) VALUES ('Villa', 500000, 'Luxury features', 34.067890, -118.287654);
INSERT INTO properties (property_type, price, neighborhood_features, latitude, longitude) VALUES ('Cottage', 280000, 'Rural setting', 34.076543, -118.298765);
INSERT INTO properties (property_type, price, neighborhood_features, latitude, longitude) VALUES ('Farmhouse', 600000, 'Acreage included', 34.087654, -118.312345);
INSERT INTO properties (property_type, price, neighborhood_features, latitude, longitude) VALUES ('Penthouse', 700000, 'City views', 34.095678, -118.320987);
INSERT INTO properties (property_type, price, neighborhood_features, latitude, longitude) VALUES ('Bungalow', 320000, 'Cozy atmosphere', 34.015678, -118.287654);
