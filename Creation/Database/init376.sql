CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
loyalty_member BOOLEAN NOT NULL DEFAULT FALSE
);

CREATE TABLE IF NOT EXISTS loyalty_program (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
points INT(10) NOT NULL DEFAULT 0,
FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, password, email, loyalty_member) VALUES ('john_doe', 'password123', 'john.doe@example.com', 1);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('jane_smith', 'qwerty', 'jane.smith@example.com', 0);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('alex_wong', 'pass123', 'alex.wong@example.com', 1);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('sarah_davis', 'abc123', 'sarah.davis@example.com', 0);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('michael_brown', 'password', 'michael.brown@example.com', 1);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('emily_jones', 'password456', 'emily.jones@example.com', 0);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('ryan_garcia', 'ryan123', 'ryan.garcia@example.com', 1);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('laura_smith', 'laura456', 'laura.smith@example.com', 0);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('nathan_nguyen', 'nathanpass', 'nathan.nguyen@example.com', 1);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('olivia_miller', 'olivia123', 'olivia.miller@example.com', 0);