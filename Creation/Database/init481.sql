CREATE TABLE IF NOT EXISTS user_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL
);

INSERT INTO user_data (fullname, address, phone) VALUES ('John Doe', '123 Main Street', '555-1234');
INSERT INTO user_data (fullname, address, phone) VALUES ('Alice Smith', '456 Elm Avenue', '555-5678');
INSERT INTO user_data (fullname, address, phone) VALUES ('Bob Johnson', '789 Oak Drive', '555-9101');
INSERT INTO user_data (fullname, address, phone) VALUES ('Sara Lee', '321 Pine Road', '555-1122');
INSERT INTO user_data (fullname, address, phone) VALUES ('Mike Taylor', '654 Cedar Lane', '555-3344');
INSERT INTO user_data (fullname, address, phone) VALUES ('Emily Brown', '987 Birch Street', '555-5566');
INSERT INTO user_data (fullname, address, phone) VALUES ('Tom Sawyer', '741 Maple Court', '555-7788');
INSERT INTO user_data (fullname, address, phone) VALUES ('Lisa Green', '852 Walnut Avenue', '555-9900');
INSERT INTO user_data (fullname, address, phone) VALUES ('Alex Turner', '963 Cherry Lane', '555-6789');
INSERT INTO user_data (fullname, address, phone) VALUES ('Jessica White', '159 Apple Road', '555-4321');
