CREATE TABLE hotels (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL
);

INSERT INTO hotels (name, location, price) VALUES ('Hotel A', 'City A', 150.00);
INSERT INTO hotels (name, location, price) VALUES ('Hotel B', 'City B', 200.50);
INSERT INTO hotels (name, location, price) VALUES ('Hotel C', 'City C', 180.75);
INSERT INTO hotels (name, location, price) VALUES ('Hotel D', 'City D', 220.00);
INSERT INTO hotels (name, location, price) VALUES ('Hotel E', 'City E', 190.25);
INSERT INTO hotels (name, location, price) VALUES ('Hotel F', 'City F', 250.75);
INSERT INTO hotels (name, location, price) VALUES ('Hotel G', 'City G', 170.50);
INSERT INTO hotels (name, location, price) VALUES ('Hotel H', 'City H', 210.00);
INSERT INTO hotels (name, location, price) VALUES ('Hotel I', 'City I', 230.25);
INSERT INTO hotels (name, location, price) VALUES ('Hotel J', 'City J', 280.50);
