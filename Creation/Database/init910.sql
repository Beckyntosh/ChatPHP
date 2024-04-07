CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

CREATE TABLE sensitive_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    data TEXT,
    encrypted_data TEXT
);

INSERT INTO users (name, email) VALUES ('John Doe', 'john.doe@example.com');
INSERT INTO users (name, email) VALUES ('Jane Smith', 'jane.smith@example.com');
INSERT INTO users (name, email) VALUES ('Alice Johnson', 'alice.johnson@example.com');
INSERT INTO users (name, email) VALUES ('Bob Brown', 'bob.brown@example.com');
INSERT INTO users (name, email) VALUES ('Emily Davis', 'emily.davis@example.com');
INSERT INTO users (name, email) VALUES ('Michael Wilson', 'michael.wilson@example.com');
INSERT INTO users (name, email) VALUES ('Sarah Lee', 'sarah.lee@example.com');
INSERT INTO users (name, email) VALUES ('David Clark', 'david.clark@example.com');
INSERT INTO users (name, email) VALUES ('Olivia Rodriguez', 'olivia.rodriguez@example.com');
INSERT INTO users (name, email) VALUES ('William Martinez', 'william.martinez@example.com');

INSERT INTO sensitive_data (user_id, data, encrypted_data) VALUES (1, 'Top secret information 1', 'encrypted_data_1');
INSERT INTO sensitive_data (user_id, data, encrypted_data) VALUES (2, 'Confidential data 2', 'encrypted_data_2');
INSERT INTO sensitive_data (user_id, data, encrypted_data) VALUES (3, 'Sensitive details 3', 'encrypted_data_3');
INSERT INTO sensitive_data (user_id, data, encrypted_data) VALUES (4, 'Classified information 4', 'encrypted_data_4');
INSERT INTO sensitive_data (user_id, data, encrypted_data) VALUES (5, 'Secret report 5', 'encrypted_data_5');
INSERT INTO sensitive_data (user_id, data, encrypted_data) VALUES (6, 'Private message 6', 'encrypted_data_6');
INSERT INTO sensitive_data (user_id, data, encrypted_data) VALUES (7, 'Restricted document 7', 'encrypted_data_7');
INSERT INTO sensitive_data (user_id, data, encrypted_data) VALUES (8, 'Secure file 8', 'encrypted_data_8');
INSERT INTO sensitive_data (user_id, data, encrypted_data) VALUES (9, 'Confidential memo 9', 'encrypted_data_9');
INSERT INTO sensitive_data (user_id, data, encrypted_data) VALUES (10, 'Top classified data 10', 'encrypted_data_10');
