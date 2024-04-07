CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (name, email) VALUES ('John Doe', 'john.doe@example.com');
INSERT INTO users (name, email) VALUES ('Jane Smith', 'jane.smith@example.com');
INSERT INTO users (name, email) VALUES ('Alice Johnson', 'alice.johnson@example.com');
INSERT INTO users (name, email) VALUES ('Bob Brown', 'bob.brown@example.com');
INSERT INTO users (name, email) VALUES ('Eva Garcia', 'eva.garcia@example.com');
INSERT INTO users (name, email) VALUES ('Michael Clark', 'michael.clark@example.com');
INSERT INTO users (name, email) VALUES ('Sara Lee', 'sara.lee@example.com');
INSERT INTO users (name, email) VALUES ('Tom Wilson', 'tom.wilson@example.com');
INSERT INTO users (name, email) VALUES ('Laura Davis', 'laura.davis@example.com');
INSERT INTO users (name, email) VALUES ('Chris Roberts', 'chris.roberts@example.com');
