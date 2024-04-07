CREATE TABLE IF NOT EXISTS custom_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    customization_details TEXT NOT NULL,
    customer_email VARCHAR(255) NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO custom_orders (product_name, customization_details, customer_email) VALUES ('Custom Hair Care Product 1', 'Specific instructions for customization', 'customer1@example.com');
INSERT INTO custom_orders (product_name, customization_details, customer_email) VALUES ('Custom Hair Care Product 2', 'Detailed customization requirements', 'customer2@example.com');
INSERT INTO custom_orders (product_name, customization_details, customer_email) VALUES ('Custom Hair Care Product 3', 'Unique customization specifications', 'customer3@example.com');
INSERT INTO custom_orders (product_name, customization_details, customer_email) VALUES ('Custom Hair Care Product 4', 'Specialized customization details', 'customer4@example.com');
INSERT INTO custom_orders (product_name, customization_details, customer_email) VALUES ('Custom Hair Care Product 5', 'Personalized customization preferences', 'customer5@example.com');
INSERT INTO custom_orders (product_name, customization_details, customer_email) VALUES ('Custom Hair Care Product 6', 'Individualized customization requests', 'customer6@example.com');
INSERT INTO custom_orders (product_name, customization_details, customer_email) VALUES ('Custom Hair Care Product 7', 'Bespoke customization choices', 'customer7@example.com');
INSERT INTO custom_orders (product_name, customization_details, customer_email) VALUES ('Custom Hair Care Product 8', 'Tailor-made customization instructions', 'customer8@example.com');
INSERT INTO custom_orders (product_name, customization_details, customer_email) VALUES ('Custom Hair Care Product 9', 'Exquisite customization details', 'customer9@example.com');
INSERT INTO custom_orders (product_name, customization_details, customer_email) VALUES ('Custom Hair Care Product 10', 'Unique and specific customization needs', 'customer10@example.com');
