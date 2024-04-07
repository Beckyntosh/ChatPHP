CREATE TABLE IF NOT EXISTS locations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        address TEXT,
        city VARCHAR(100),
        zip_code VARCHAR(20)
    );

INSERT INTO locations (name, address, city, zip_code) VALUES
 ('DVD Store 1', '123 Main St', 'Los Angeles', '90001'),
 ('DVD Store 2', '456 First Ave', 'New York', '10001'),
 ('DVD Store 3', '789 Elm Blvd', 'Chicago', '60601'),
 ('DVD Store 4', '555 Oak Dr', 'Houston', '77001'),
 ('DVD Store 5', '111 Pine Rd', 'Miami', '33101'),
 ('DVD Store 6', '222 Cedar Ln', 'San Francisco', '94101'),
 ('DVD Store 7', '333 Maple Ave', 'Seattle', '98101'),
 ('DVD Store 8', '444 Walnut St', 'Dallas', '75201'),
 ('DVD Store 9', '777 Birch Blvd', 'Atlanta', '30301'),
 ('DVD Store 10', '888 Spruce Dr', 'Boston', '02101');
