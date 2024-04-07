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
INSERT INTO users (name, email) VALUES ('Emma White', 'emma.white@example.com');
INSERT INTO users (name, email) VALUES ('Mike Davis', 'mike.davis@example.com');
INSERT INTO users (name, email) VALUES ('Sarah Lee', 'sarah.lee@example.com');
INSERT INTO users (name, email) VALUES ('Alex Wilson', 'alex.wilson@example.com');
INSERT INTO users (name, email) VALUES ('Ella Martinez', 'ella.martinez@example.com');
INSERT INTO users (name, email) VALUES ('Ryan Adams', 'ryan.adams@example.com');
