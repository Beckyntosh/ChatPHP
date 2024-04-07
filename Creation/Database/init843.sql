CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL
);

INSERT INTO users (name, email, address, phone) VALUES ('John Doe', 'johndoe@example.com', '123 Main Street', '555-1234');
INSERT INTO users (name, email, address, phone) VALUES ('Jane Smith', 'janesmith@example.com', '456 Oak Avenue', '555-5678');
INSERT INTO users (name, email, address, phone) VALUES ('Mike Johnson', 'mikejohnson@example.com', '789 Elm Road', '555-2468');
INSERT INTO users (name, email, address, phone) VALUES ('Sarah Brown', 'sarahbrown@example.com', '321 Maple Lane', '555-1357');
INSERT INTO users (name, email, address, phone) VALUES ('Chris Evans', 'chrisevans@example.com', '654 Pine Court', '555-3698');
INSERT INTO users (name, email, address, phone) VALUES ('Emily Davis', 'emilydavis@example.com', '987 Cedar Drive', '555-2589');
INSERT INTO users (name, email, address, phone) VALUES ('Alex Roberts', 'alexroberts@example.com', '852 Birch Street', '555-1478');
INSERT INTO users (name, email, address, phone) VALUES ('Jessica White', 'jessicawhite@example.com', '147 Willow Avenue', '555-7896');
INSERT INTO users (name, email, address, phone) VALUES ('Mark Thompson', 'markthompson@example.com', '369 Oak Lane', '555-6547');
INSERT INTO users (name, email, address, phone) VALUES ('Laura Wilson', 'laurawilson@example.com', '753 Pine Road', '555-3698');
