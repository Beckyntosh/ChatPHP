CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE IF NOT EXISTS profiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    address VARCHAR(255),
    phone VARCHAR(20),
    CONSTRAINT fk_user
        FOREIGN KEY(user_id) 
        REFERENCES users(id)
        ON DELETE CASCADE
);

INSERT INTO users VALUES (NULL);
INSERT INTO profiles (user_id, address, phone) VALUES (1, '123 Main St', '555-1234');
INSERT INTO profiles (user_id, address, phone) VALUES (1, '456 Elm St', '555-5678');
INSERT INTO profiles (user_id, address, phone) VALUES (1, '789 Oak St', '555-9012');
INSERT INTO profiles (user_id, address, phone) VALUES (1, '321 Birch St', '555-3456');
INSERT INTO profiles (user_id, address, phone) VALUES (1, '654 Maple St', '555-7890');
INSERT INTO profiles (user_id, address, phone) VALUES (1, '987 Pine St', '555-2345');
INSERT INTO profiles (user_id, address, phone) VALUES (1, '123 Cedar St', '555-6789');
INSERT INTO profiles (user_id, address, phone) VALUES (1, '456 Walnut St', '555-1234');
INSERT INTO profiles (user_id, address, phone) VALUES (1, '789 Ash St', '555-5678');
INSERT INTO profiles (user_id, address, phone) VALUES (1, '321 Spruce St', '555-9012');
