CREATE TABLE custom_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customerName VARCHAR(255) NOT NULL,
    productDetails TEXT NOT NULL,
    email VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO custom_orders (customerName, productDetails, email) VALUES ('John Doe', 'Multivitamin with Vitamin D', 'johndoe@example.com');
INSERT INTO custom_orders (customerName, productDetails, email) VALUES ('Jane Smith', 'Vitamin C Chewables', 'janesmith@example.com');
INSERT INTO custom_orders (customerName, productDetails, email) VALUES ('Michael Johnson', 'Fish Oil Supplements', 'michaeljohnson@example.com');
INSERT INTO custom_orders (customerName, productDetails, email) VALUES ('Sarah Williams', 'Probiotics Capsules', 'sarahwilliams@example.com');
INSERT INTO custom_orders (customerName, productDetails, email) VALUES ('David Brown', 'Calcium with Magnesium Tablets', 'davidbrown@example.com');
INSERT INTO custom_orders (customerName, productDetails, email) VALUES ('Lisa Davis', 'Iron Supplements', 'lisadavis@example.com');
INSERT INTO custom_orders (customerName, productDetails, email) VALUES ('Kevin Martinez', 'B-Complex Vitamins', 'kevinmartinez@example.com');
INSERT INTO custom_orders (customerName, productDetails, email) VALUES ('Emily Wilson', 'Turmeric Capsules', 'emilywilson@example.com');
INSERT INTO custom_orders (customerName, productDetails, email) VALUES ('Andrew Taylor', 'Omega-3 Fatty Acids Softgels', 'andrewtaylor@example.com');
INSERT INTO custom_orders (customerName, productDetails, email) VALUES ('Megan Lee', 'Vitamin E Oil', 'meganlee@example.com');