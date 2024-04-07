CREATE TABLE IF NOT EXISTS AddressBook (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(30),
    address TEXT
);

INSERT INTO AddressBook (name, email, phone, address) VALUES ('John Doe', 'john.doe@example.com', '1234567890', '123 Main Street');
INSERT INTO AddressBook (name, email, phone, address) VALUES ('Jane Smith', 'jane.smith@example.com', '0987654321', '456 Elm Street');
INSERT INTO AddressBook (name, email, phone, address) VALUES ('Alice Johnson', 'alice.johnson@example.com', '9876543210', '789 Oak Avenue');
INSERT INTO AddressBook (name, email, phone, address) VALUES ('Bob Brown', 'bob.brown@example.com', '4567890123', '654 Pine Road');
INSERT INTO AddressBook (name, email, phone, address) VALUES ('Emma Davis', 'emma.davis@example.com', '2345678901', '321 Birch Lane');
INSERT INTO AddressBook (name, email, phone, address) VALUES ('Michael Wilson', 'michael.wilson@example.com', '3456789012', '876 Cedar Drive');
INSERT INTO AddressBook (name, email, phone, address) VALUES ('Sarah Martinez', 'sarah.martinez@example.com', '5678901234', '987 Walnut Court');
INSERT INTO AddressBook (name, email, phone, address) VALUES ('Kevin Thompson', 'kevin.thompson@example.com', '6789012345', '246 Maple Street');
INSERT INTO AddressBook (name, email, phone, address) VALUES ('Laura Garcia', 'laura.garcia@example.com', '7890123456', '135 Oak Drive');
INSERT INTO AddressBook (name, email, phone, address) VALUES ('David Lee', 'david.lee@example.com', '8901234567', '369 Pine Lane');