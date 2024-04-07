CREATE TABLE IF NOT EXISTS destinations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    location VARCHAR(255),
    image VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destination_id INT,
    rating INT,
    review TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (destination_id) REFERENCES destinations(id)
);

INSERT INTO destinations (name, description, location, image) VALUES ('Paris', 'City of Love', 'France', 'paris.jpg');
INSERT INTO destinations (name, description, location, image) VALUES ('Tokyo', 'Vibrant city with rich culture', 'Japan', 'tokyo.jpg');
INSERT INTO destinations (name, description, location, image) VALUES ('New York', 'The Big Apple', 'USA', 'newyork.jpg');
INSERT INTO destinations (name, description, location, image) VALUES ('Barcelona', 'Beautiful architecture and beaches', 'Spain', 'barcelona.jpg');
INSERT INTO destinations (name, description, location, image) VALUES ('Sydney', 'Iconic Opera House and Harbour Bridge', 'Australia', 'sydney.jpg');
INSERT INTO destinations (name, description, location, image) VALUES ('Rome', 'Historical city with Roman ruins', 'Italy', 'rome.jpg');
INSERT INTO destinations (name, description, location, image) VALUES ('Cairo', 'Home to ancient pyramids', 'Egypt', 'cairo.jpg');
INSERT INTO destinations (name, description, location, image) VALUES ('Rio de Janeiro', 'Stunning beaches and carnival', 'Brazil', 'rio.jpg');
INSERT INTO destinations (name, description, location, image) VALUES ('Cape Town', 'Scenic views and diverse culture', 'South Africa', 'capetown.jpg');
INSERT INTO destinations (name, description, location, image) VALUES ('Hawaii', 'Tropical paradise with volcanoes', 'USA', 'hawaii.jpg');