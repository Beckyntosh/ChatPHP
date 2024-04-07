CREATE TABLE destinations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    location VARCHAR(30) NOT NULL,
    description TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

CREATE TABLE reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination_id INT(6) UNSIGNED,
    title VARCHAR(50),
    review TEXT,
    rating INT(1),
    review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (destination_id) REFERENCES destinations(id)
    );

INSERT INTO destinations (name, location, description) VALUES ('Paris', 'France', 'Beautiful city known for its art and culinary scene');
INSERT INTO destinations (name, location, description) VALUES ('Tokyo', 'Japan', 'Vibrant metropolis with a mix of traditional and modern culture');
INSERT INTO destinations (name, location, description) VALUES ('Rome', 'Italy', 'Historic city filled with ancient ruins and great food');
INSERT INTO destinations (name, location, description) VALUES ('Cancun', 'Mexico', 'Tropical paradise with stunning beaches and vibrant nightlife');
INSERT INTO destinations (name, location, description) VALUES ('Sydney', 'Australia', 'Dynamic city with iconic landmarks like the Opera House and Harbor Bridge');
INSERT INTO destinations (name, location, description) VALUES ('Dubai', 'UAE', 'Luxurious city known for its modern architecture and shopping malls');
INSERT INTO destinations (name, location, description) VALUES ('Bali', 'Indonesia', 'Exotic island with lush landscapes and spiritual temples');
INSERT INTO destinations (name, location, description) VALUES ('New York City', 'USA', 'The city that never sleeps, filled with diverse cultures and endless activities');
INSERT INTO destinations (name, location, description) VALUES ('Barcelona', 'Spain', 'Cosmopolitan city known for its architecture and lively atmosphere');
INSERT INTO destinations (name, location, description) VALUES ('Cape Town', 'South Africa', 'Scenic city with stunning natural beauty and diverse wildlife');