CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    verified TINYINT(1) DEFAULT 0,
    token VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (username, email, token) VALUES ('john_doe', 'john.doe@example.com', 'abc123');
INSERT INTO users (username, email, token) VALUES ('jane_smith', 'jane.smith@example.com', 'def456');
INSERT INTO users (username, email, token) VALUES ('bob_jones', 'bob.jones@example.com', 'ghi789');
INSERT INTO users (username, email, token) VALUES ('alice_wilson', 'alice.wilson@example.com', 'jkl012');
INSERT INTO users (username, email, token) VALUES ('mike_thomas', 'mike.thomas@example.com', 'mno345');
INSERT INTO users (username, email, token) VALUES ('sara_adams', 'sara.adams@example.com', 'pqr678');
INSERT INTO users (username, email, token) VALUES ('chris_brown', 'chris.brown@example.com', 'stu901');
INSERT INTO users (username, email, token) VALUES ('lisa_white', 'lisa.white@example.com', 'vwx234');
INSERT INTO users (username, email, token) VALUES ('kevin_black', 'kevin.black@example.com', 'yzab56');
INSERT INTO users (username, email, token) VALUES ('emily_green', 'emily.green@example.com', 'cdef78');
