CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50),
    loyalty_member TINYINT(1) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO users (username, password, email, loyalty_member) VALUES ('john_doe', 'password123', 'john.doe@example.com', 1);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('jane_smith', 'pass456', 'jane.smith@example.com', 0);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('bob_johnson', 'bob123', 'bob.johnson@example.com', 1);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('mary_white', 'mary456', 'mary.white@example.com', 0);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('sam_green', 'green123', 'sam.green@example.com', 1);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('lisa_brown', 'brown456', 'lisa.brown@example.com', 0);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('alex_black', 'black123', 'alex.black@example.com', 1);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('emily_gray', 'gray456', 'emily.gray@example.com', 0);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('mike_white', 'white123', 'mike.white@example.com', 1);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('sarah_smith', 'sarah456', 'sarah.smith@example.com', 0);
