CREATE TABLE IF NOT EXISTS destinations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description TEXT,
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination_id INT(6) UNSIGNED,
    author VARCHAR(30) NOT NULL,
    rating INT(1),
    content TEXT,
    reg_date TIMESTAMP,
    CONSTRAINT fk_destination FOREIGN KEY(destination_id) REFERENCES destinations(id)
);

INSERT INTO destinations (name, description, reg_date) VALUES ('Paris', 'City of Love', NOW());
INSERT INTO destinations (name, description, reg_date) VALUES ('Rome', 'Eternal City', NOW());
INSERT INTO destinations (name, description, reg_date) VALUES ('Tokyo', 'Vibrant Metropolis', NOW());
INSERT INTO destinations (name, description, reg_date) VALUES ('New York', 'The Big Apple', NOW());
INSERT INTO destinations (name, description, reg_date) VALUES ('London', 'Historic Capital', NOW());
INSERT INTO destinations (name, description, reg_date) VALUES ('Sydney', 'Harbor City', NOW());
INSERT INTO destinations (name, description, reg_date) VALUES ('Cape Town', 'Mother City', NOW());
INSERT INTO destinations (name, description, reg_date) VALUES ('Dubai', 'City of Gold', NOW());
INSERT INTO destinations (name, description, reg_date) VALUES ('Bali', 'Island Paradise', NOW());
INSERT INTO destinations (name, description, reg_date) VALUES ('Venice', 'City of Canals', NOW());
