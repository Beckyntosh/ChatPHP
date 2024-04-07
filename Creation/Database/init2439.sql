CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
preference VARCHAR(100),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (username, email, password, preference) VALUES ('john_doe', 'john@example.com', 'pass123', 'wine_news');
INSERT INTO users (username, email, password, preference) VALUES ('alice_smith', 'alice@example.com', 'pass456', 'industry_news');
INSERT INTO users (username, email, password, preference) VALUES ('bob_jones', 'bob@example.com', 'pass789', 'events');
INSERT INTO users (username, email, password, preference) VALUES ('sara_wilson', 'sara@example.com', 'pass234', 'wine_news');
INSERT INTO users (username, email, password, preference) VALUES ('mike_brown', 'mike@example.com', 'pass567', 'industry_news');
INSERT INTO users (username, email, password, preference) VALUES ('emily_davis', 'emily@example.com', 'pass890', 'events');
INSERT INTO users (username, email, password, preference) VALUES ('ryan_clark', 'ryan@example.com', 'pass345', 'wine_news');
INSERT INTO users (username, email, password, preference) VALUES ('laura_hill', 'laura@example.com', 'pass678', 'industry_news');
INSERT INTO users (username, email, password, preference) VALUES ('chris_parker', 'chris@example.com', 'pass901', 'events');
INSERT INTO users (username, email, password, preference) VALUES ('jane_smith', 'jane@example.com', 'pass456y', 'wine_news');
