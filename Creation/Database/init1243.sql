CREATE TABLE IF NOT EXISTS destinations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    city VARCHAR(255) NOT NULL,
    country VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS hotels (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destination_id INT,
    name VARCHAR(255) NOT NULL,
    booking_url VARCHAR(255),
    FOREIGN KEY (destination_id) REFERENCES destinations(id)
);

CREATE TABLE IF NOT EXISTS flights (
    id INT AUTO_INCREMENT PRIMARY KEY,
    departure_city VARCHAR(255) NOT NULL,
    arrival_city VARCHAR(255) NOT NULL,
    flight_details VARCHAR(255)
);

INSERT INTO destinations (city, country) VALUES ('Paris', 'France');
INSERT INTO destinations (city, country) VALUES ('Rome', 'Italy');
INSERT INTO destinations (city, country) VALUES ('Tokyo', 'Japan');
INSERT INTO destinations (city, country) VALUES ('New York', 'USA');
INSERT INTO destinations (city, country) VALUES ('Sydney', 'Australia');
INSERT INTO destinations (city, country) VALUES ('London', 'UK');
INSERT INTO destinations (city, country) VALUES ('Dubai', 'UAE');
INSERT INTO destinations (city, country) VALUES ('Barcelona', 'Spain');
INSERT INTO destinations (city, country) VALUES ('Cape Town', 'South Africa');
INSERT INTO destinations (city, country) VALUES ('Auckland', 'New Zealand');
