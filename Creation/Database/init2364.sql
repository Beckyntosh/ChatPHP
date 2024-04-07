CREATE TABLE IF NOT EXISTS forum_members (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(255),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO forum_members (username, email, password) VALUES ('alice123', 'alice@example.com', 'password123');
INSERT INTO forum_members (username, email, password) VALUES ('bob456', 'bob@example.com', 'password456');
INSERT INTO forum_members (username, email, password) VALUES ('charlie789', 'charlie@example.com', 'password789');
INSERT INTO forum_members (username, email, password) VALUES ('david101', 'david@example.com', 'password101');
INSERT INTO forum_members (username, email, password) VALUES ('eve202', 'eve@example.com', 'password202');
INSERT INTO forum_members (username, email, password) VALUES ('frank303', 'frank@example.com', 'password303');
INSERT INTO forum_members (username, email, password) VALUES ('grace404', 'grace@example.com', 'password404');
INSERT INTO forum_members (username, email, password) VALUES ('harry505', 'harry@example.com', 'password505');
INSERT INTO forum_members (username, email, password) VALUES ('isabella606', 'isabella@example.com', 'password606');
INSERT INTO forum_members (username, email, password) VALUES ('jack707', 'jack@example.com', 'password707');