CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (name, email) VALUES ('John Doe', 'john.doe@example.com');
INSERT INTO users (name, email) VALUES ('Jane Smith', 'jane.smith@example.com');
INSERT INTO users (name, email) VALUES ('Alice Brown', 'alice.brown@example.com');
INSERT INTO users (name, email) VALUES ('Bob Johnson', 'bob.johnson@example.com');
INSERT INTO users (name, email) VALUES ('Sarah White', 'sarah.white@example.com');
INSERT INTO users (name, email) VALUES ('Michael Lee', 'michael.lee@example.com');
INSERT INTO users (name, email) VALUES ('Emily Davis', 'emily.davis@example.com');
INSERT INTO users (name, email) VALUES ('David Martinez', 'david.martinez@example.com');
INSERT INTO users (name, email) VALUES ('Karen Wilson', 'karen.wilson@example.com');
INSERT INTO users (name, email) VALUES ('Richard Jones', 'richard.jones@example.com');
