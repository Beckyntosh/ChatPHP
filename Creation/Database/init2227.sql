CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS coupons (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
code VARCHAR(50) NOT NULL,
discount INT(3) NOT NULL,
status VARCHAR(10) NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (firstname, lastname, email) VALUES ('John', 'Doe', 'john.doe@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Jane', 'Smith', 'jane.smith@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Alice', 'Johnson', 'alice.johnson@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Bob', 'Brown', 'bob.brown@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Catherine', 'Wilson', 'catherine.wilson@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('David', 'Miller', 'david.miller@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Emily', 'Clark', 'emily.clark@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Frank', 'Taylor', 'frank.taylor@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Grace', 'Anderson', 'grace.anderson@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Henry', 'Parker', 'henry.parker@example.com');
