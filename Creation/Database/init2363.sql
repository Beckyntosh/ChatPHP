CREATE TABLE IF NOT EXISTS members (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO members (username, password, email) VALUES ('john_doe', 'password123', 'john.doe@example.com');
INSERT INTO members (username, password, email) VALUES ('jane_smith', 'abc456', 'jane.smith@example.com');
INSERT INTO members (username, password, email) VALUES ('mike_jones', 'p@ssw0rd', 'mike.jones@example.com');
INSERT INTO members (username, password, email) VALUES ('sarah_white', 'securePass', 'sarah.white@example.com');
INSERT INTO members (username, password, email) VALUES ('david_wong', 'blue42!', 'david.wong@example.com');
INSERT INTO members (username, password, email) VALUES ('amanda_green', 'greenTea12', 'amanda.green@example.com');
INSERT INTO members (username, password, email) VALUES ('sam_carter', 's@goodP@ss', 'sam.carter@example.com');
INSERT INTO members (username, password, email) VALUES ('lisa_brown', 'Browny7', 'lisa.brown@example.com');
INSERT INTO members (username, password, email) VALUES ('kevin_adams', 'KevAdams@85', 'kevin.adams@example.com');
INSERT INTO members (username, password, email) VALUES ('emily_wilson', 'Cha0s!23', 'emily.wilson@example.com');
