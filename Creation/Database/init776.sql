CREATE TABLE IF NOT EXISTS event_locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    address TEXT,
    capacity INT
);

-- Insert data into event_locations table
INSERT INTO event_locations (name, address, capacity) VALUES ('Location 1', '123 Main St, City1, Country1', 100);
INSERT INTO event_locations (name, address, capacity) VALUES ('Location 2', '456 Center St, City2, Country2', 150);
INSERT INTO event_locations (name, address, capacity) VALUES ('Location 3', '789 Park Road, City3, Country3', 120);
INSERT INTO event_locations (name, address, capacity) VALUES ('Location 4', '101 Elm Avenue, City4, Country4', 80);
INSERT INTO event_locations (name, address, capacity) VALUES ('Location 5', '222 Maple Lane, City5, Country5', 200);
INSERT INTO event_locations (name, address, capacity) VALUES ('Location 6', '333 Oak Street, City6, Country6', 90);
INSERT INTO event_locations (name, address, capacity) VALUES ('Location 7', '444 Pine Drive, City7, Country7', 110);
INSERT INTO event_locations (name, address, capacity) VALUES ('Location 8', '555 Walnut Court, City8, Country8', 130);
INSERT INTO event_locations (name, address, capacity) VALUES ('Location 9', '666 Cedar Circle, City9, Country9', 170);
INSERT INTO event_locations (name, address, capacity) VALUES ('Location 10', '777 Birch Boulevard, City10, Country10', 140);
