CREATE TABLE IF NOT EXISTS UserNotifications (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO UserNotifications (email) VALUES ('john.doe@example.com');
INSERT INTO UserNotifications (email) VALUES ('jane.smith@example.com');
INSERT INTO UserNotifications (email) VALUES ('alex.wilson@example.com');
INSERT INTO UserNotifications (email) VALUES ('sara.jones@example.com');
INSERT INTO UserNotifications (email) VALUES ('mike.brown@example.com');
INSERT INTO UserNotifications (email) VALUES ('emily.white@example.com');
INSERT INTO UserNotifications (email) VALUES ('ryan.green@example.com');
INSERT INTO UserNotifications (email) VALUES ('lisa.miller@example.com');
INSERT INTO UserNotifications (email) VALUES ('kevin.james@example.com');
INSERT INTO UserNotifications (email) VALUES ('natalie.baker@example.com');
