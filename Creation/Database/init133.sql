CREATE TABLE IF NOT EXISTS custom_orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    product_details TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO custom_orders (customer_name, email, product_details) VALUES ('John Doe', 'john.doe@example.com', 'Custom order for face cream with SPF 50');
INSERT INTO custom_orders (customer_name, email, product_details) VALUES ('Jane Smith', 'jane.smith@example.com', 'Custom order for organic moisturizer');
INSERT INTO custom_orders (customer_name, email, product_details) VALUES ('Michael Johnson', 'michael.johnson@example.com', 'Custom order for anti-aging serum');
INSERT INTO custom_orders (customer_name, email, product_details) VALUES ('Sarah Brown', 'sarah.brown@example.com', 'Custom order for acne treatment lotion');
INSERT INTO custom_orders (customer_name, email, product_details) VALUES ('Alex Davis', 'alex.davis@example.com', 'Custom order for handcrafted soap bars');
INSERT INTO custom_orders (customer_name, email, product_details) VALUES ('Emily Wilson', 'emily.wilson@example.com', 'Custom order for vegan lip balm');
INSERT INTO custom_orders (customer_name, email, product_details) VALUES ('Ryan Adams', 'ryan.adams@example.com', 'Custom order for natural shampoo and conditioner set');
INSERT INTO custom_orders (customer_name, email, product_details) VALUES ('Olivia Martinez', 'olivia.martinez@example.com', 'Custom order for hydrating face mask');
INSERT INTO custom_orders (customer_name, email, product_details) VALUES ('Daniel Taylor', 'daniel.taylor@example.com', 'Custom order for essential oil blend');
INSERT INTO custom_orders (customer_name, email, product_details) VALUES ('Sophia Roberts', 'sophia.roberts@example.com', 'Custom order for handmade body butter');
