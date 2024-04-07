CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (name, email, password) VALUES ('John Doe', 'john.doe@example.com', MD5('password1'));
INSERT INTO users (name, email, password) VALUES ('Jane Smith', 'jane.smith@example.com', MD5('password2'));
INSERT INTO users (name, email, password) VALUES ('Michael Johnson', 'michael.johnson@example.com', MD5('password3'));
INSERT INTO users (name, email, password) VALUES ('Sarah Lee', 'sarah.lee@example.com', MD5('password4'));
INSERT INTO users (name, email, password) VALUES ('Robert Taylor', 'robert.taylor@example.com', MD5('password5'));
INSERT INTO users (name, email, password) VALUES ('Emily Brown', 'emily.brown@example.com', MD5('password6'));
INSERT INTO users (name, email, password) VALUES ('Christopher Davis', 'christopher.davis@example.com', MD5('password7'));
INSERT INTO users (name, email, password) VALUES ('Amanda Wilson', 'amanda.wilson@example.com', MD5('password8'));
INSERT INTO users (name, email, password) VALUES ('Kevin Martinez', 'kevin.martinez@example.com', MD5('password9'));
INSERT INTO users (name, email, password) VALUES ('Jessica Garcia', 'jessica.garcia@example.com', MD5('password10'));