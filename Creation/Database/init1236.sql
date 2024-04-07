CREATE TABLE IF NOT EXISTS travel_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(30) NOT NULL,
    flight VARCHAR(50),
    hotel VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO travel_plans (destination, flight, hotel) VALUES
("Paris", "ABC123", "Hotel A"),
("London", "DEF456", "Hotel B"),
("New York", "GHI789", "Hotel C"),
("Tokyo", "JKL012", "Hotel D"),
("Sydney", "MNO345", "Hotel E"),
("Rome", "PQR678", "Hotel F"),
("Dubai", "STU901", "Hotel G"),
("Barcelona", "VWX234", "Hotel H"),
("Berlin", "YZA567", "Hotel I"),
("Vienna", "BCD890", "Hotel J");