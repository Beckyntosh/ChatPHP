CREATE TABLE IF NOT EXISTS locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    latitude DECIMAL(10, 8),
    longitude DECIMAL(11, 8),
    description TEXT
);

INSERT INTO locations (name, latitude, longitude, description) VALUES ('Location1', 40.7128, -74.0060, 'New York City');
INSERT INTO locations (name, latitude, longitude, description) VALUES ('Location2', 34.0522, -118.2437, 'Los Angeles');
INSERT INTO locations (name, latitude, longitude, description) VALUES ('Location3', 41.8781, -87.6298, 'Chicago');
INSERT INTO locations (name, latitude, longitude, description) VALUES ('Location4', 29.7604, -95.3698, 'Houston');
INSERT INTO locations (name, latitude, longitude, description) VALUES ('Location5', 33.4484, -112.0740, 'Phoenix');
INSERT INTO locations (name, latitude, longitude, description) VALUES ('Location6', 39.9526, -75.1652, 'Philadelphia');
INSERT INTO locations (name, latitude, longitude, description) VALUES ('Location7', 29.4241, -98.4936, 'San Antonio');
INSERT INTO locations (name, latitude, longitude, description) VALUES ('Location8', 32.7157, -117.1611, 'San Diego');
INSERT INTO locations (name, latitude, longitude, description) VALUES ('Location9', 37.7749, -122.4194, 'San Francisco');
INSERT INTO locations (name, latitude, longitude, description) VALUES ('Location10', 47.6062, -122.3321, 'Seattle');
