CREATE TABLE IF NOT EXISTS users (
                  id INT AUTO_INCREMENT PRIMARY KEY,
                  username VARCHAR(255) NOT NULL,
                  email VARCHAR(255) NOT NULL,
                  password VARCHAR(255) NOT NULL,
                  opt_in_loyalty_program BOOLEAN NOT NULL DEFAULT FALSE,
                  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP) ENGINE=INNODB;
                  
INSERT INTO users (username, email, password, opt_in_loyalty_program) VALUES ('Alice', 'alice@example.com', 'password123', 1);
INSERT INTO users (username, email, password, opt_in_loyalty_program) VALUES ('Bob', 'bob@example.com', 'pass123', 0);
INSERT INTO users (username, email, password, opt_in_loyalty_program) VALUES ('Charlie', 'charlie@example.com', 'testpass', 1);
INSERT INTO users (username, email, password, opt_in_loyalty_program) VALUES ('Diana', 'diana@example.com', 'mypassword', 0);
INSERT INTO users (username, email, password, opt_in_loyalty_program) VALUES ('Eve', 'eve@example.com', 'passme123', 1);
INSERT INTO users (username, email, password, opt_in_loyalty_program) VALUES ('Frank', 'frank@example.com', 'qwerty', 0);
INSERT INTO users (username, email, password, opt_in_loyalty_program) VALUES ('Grace', 'grace@example.com', 'letmein', 1);
INSERT INTO users (username, email, password, opt_in_loyalty_program) VALUES ('Henry', 'henry@example.com', '123456', 0);
INSERT INTO users (username, email, password, opt_in_loyalty_program) VALUES ('Ivy', 'ivy@example.com', 'password', 1);
INSERT INTO users (username, email, password, opt_in_loyalty_program) VALUES ('Jack', 'jack@example.com', 'userpass', 0);
