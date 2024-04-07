CREATE TABLE IF NOT EXISTS orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(255) NOT NULL,
    dimensions VARCHAR(100) NOT NULL,
    customerName VARCHAR(255) NOT NULL,
    customerEmail VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO orders (productName, dimensions, customerName, customerEmail) VALUES ('Custom Wooden Dining Table', '100x50x75 cm', 'John Doe', 'john.doe@example.com');
INSERT INTO orders (productName, dimensions, customerName, customerEmail) VALUES ('Handcrafted Coffee Table', '80x80x45 cm', 'Jane Smith', 'jane.smith@example.com');
INSERT INTO orders (productName, dimensions, customerName, customerEmail) VALUES ('Rustic Kitchen Island', '120x60x90 cm', 'Alice Johnson', 'alice.johnson@example.com');
INSERT INTO orders (productName, dimensions, customerName, customerEmail) VALUES ('Vintage Bedside Table', '50x40x60 cm', 'Robert Brown', 'robert.brown@example.com');
INSERT INTO orders (productName, dimensions, customerName, customerEmail) VALUES ('Modern Console Table', '120x30x75 cm', 'Emily White', 'emily.white@example.com');
INSERT INTO orders (productName, dimensions, customerName, customerEmail) VALUES ('Industrial Desk', '140x60x80 cm', 'Michael Green', 'michael.green@example.com');
INSERT INTO orders (productName, dimensions, customerName, customerEmail) VALUES ('Farmhouse Dining Bench', '150x40x45 cm', 'Sarah Lee', 'sarah.lee@example.com');
INSERT INTO orders (productName, dimensions, customerName, customerEmail) VALUES ('Antique Sideboard', '120x50x90 cm', 'David Taylor', 'david.taylor@example.com');
INSERT INTO orders (productName, dimensions, customerName, customerEmail) VALUES ('Scandinavian Bookshelf', '80x30x150 cm', 'Laura Roberts', 'laura.roberts@example.com');
INSERT INTO orders (productName, dimensions, customerName, customerEmail) VALUES ('Mid-Century Dresser', '100x50x100 cm', 'Matthew Evans', 'matthew.evans@example.com');
