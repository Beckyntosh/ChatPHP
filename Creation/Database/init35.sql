CREATE TABLE IF NOT EXISTS PropertyTypes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Listings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    property_type INT,
    latitude DECIMAL(10, 8),
    longitude DECIMAL(11, 8),
    CONSTRAINT fk_property_type FOREIGN KEY (property_type) REFERENCES PropertyTypes(id)
);

INSERT INTO PropertyTypes (type) VALUES 
('Apartment'),
('House'),
('Condo'),
('Townhouse'),
('Land'),
('Commercial'),
('Industrial'),
('Farm'),
('Ranch'),
('Other');

INSERT INTO Listings (title, description, price, property_type, latitude, longitude) VALUES
('Beautiful Apartment in City Center', 'Spacious 2-bedroom apartment with stunning views', 200000, 1, 51.5074, -0.1278),
('Cozy House in Suburbs', 'Charming 3-bedroom house with a backyard', 350000, 2, 51.4847, -0.0726),
('Luxury Condo with River View', 'Modern 1-bedroom condo with balcony overlooking the river', 500000, 3, 51.5109, -0.1239),
('Townhouse in Historic District', 'Renovated townhouse with original features', 400000, 4, 51.5074, -0.1278),
('Vast Land for Development', 'Large plot of land suitable for residential or commercial development', 750000, 5, 51.5074, -0.1278),
('Commercial Space in Business Hub', 'Prime location for a retail or office space', 600000, 6, 51.5074, -0.1278),
('Industrial Warehouse for Sale', 'Spacious warehouse with office space and loading docks', 800000, 7, 51.5074, -0.1278),
('Farmhouse with Acres of Land', 'Working farm with farmhouse and barns', 900000, 8, 51.5074, -0.1278),
('Ranch Property with Scenic Views', 'Horse ranch with riding trails and panoramic views', 1200000, 9, 51.5074, -0.1278),
('Unique Property for Investors', 'Specialty property with potential for various uses', 1000000, 10, 51.5074, -0.1278);