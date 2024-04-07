CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_name VARCHAR(255) NOT NULL,
    subscription_status VARCHAR(50)
);

INSERT INTO users (username) VALUES ('John Doe'), ('Jane Smith'), ('Alice Johnson'), ('Bob Brown'), ('Emily Davis');
INSERT INTO products (user_id, product_name, subscription_status) VALUES (1, 'Product A', 'Active'), (2, 'Product B', 'Inactive'), (3, 'Product C', 'Active'), (4, 'Product D', 'Inactive'), (5, 'Product E', 'Active');
