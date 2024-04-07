-- Create Users table
CREATE TABLE IF NOT EXISTS Users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create BrowsingHistory table
CREATE TABLE IF NOT EXISTS BrowsingHistory (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    product_id INT(6) UNSIGNED,
    viewed_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(id)
);

-- Create Products table
CREATE TABLE IF NOT EXISTS Products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    category VARCHAR(50)
);

-- Insert sample data into Users table
INSERT INTO Users (email) VALUES ('user1@example.com');
INSERT INTO Users (email) VALUES ('user2@example.com');
INSERT INTO Users (email) VALUES ('user3@example.com');
INSERT INTO Users (email) VALUES ('user4@example.com');
INSERT INTO Users (email) VALUES ('user5@example.com');

-- Insert sample data into BrowsingHistory table
INSERT INTO BrowsingHistory (user_id, product_id) VALUES (1, 1);
INSERT INTO BrowsingHistory (user_id, product_id) VALUES (2, 2);
INSERT INTO BrowsingHistory (user_id, product_id) VALUES (3, 3);
INSERT INTO BrowsingHistory (user_id, product_id) VALUES (4, 4);
INSERT INTO BrowsingHistory (user_id, product_id) VALUES (5, 5);

-- Insert sample data into Products table
INSERT INTO Products (name, category) VALUES ('product1', 'category1');
INSERT INTO Products (name, category) VALUES ('product2', 'category2');
INSERT INTO Products (name, category) VALUES ('product3', 'category3');
INSERT INTO Products (name, category) VALUES ('product4', 'category4');
INSERT INTO Products (name, category) VALUES ('product5', 'category5');