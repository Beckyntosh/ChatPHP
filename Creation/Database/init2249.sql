CREATE TABLE IF NOT EXISTS product_updates (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO product_updates (name, email) VALUES ('John Doe', 'john.doe@example.com');
INSERT INTO product_updates (name, email) VALUES ('Jane Smith', 'jane.smith@example.com');
INSERT INTO product_updates (name, email) VALUES ('Alice Johnson', 'alice.johnson@example.com');
INSERT INTO product_updates (name, email) VALUES ('Bob Brown', 'bob.brown@example.com');
INSERT INTO product_updates (name, email) VALUES ('Emma Wilson', 'emma.wilson@example.com');
INSERT INTO product_updates (name, email) VALUES ('Michael Lee', 'michael.lee@example.com');
INSERT INTO product_updates (name, email) VALUES ('Sarah Taylor', 'sarah.taylor@example.com');
INSERT INTO product_updates (name, email) VALUES ('David Clark', 'david.clark@example.com');
INSERT INTO product_updates (name, email) VALUES ('Olivia Martinez', 'olivia.martinez@example.com');
INSERT INTO product_updates (name, email) VALUES ('Daniel White', 'daniel.white@example.com');
