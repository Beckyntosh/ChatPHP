CREATE TABLE IF NOT EXISTS notifications (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO notifications (email) VALUES ('example1@example.com');
INSERT INTO notifications (email) VALUES ('example2@example.com');
INSERT INTO notifications (email) VALUES ('example3@example.com');
INSERT INTO notifications (email) VALUES ('example4@example.com');
INSERT INTO notifications (email) VALUES ('example5@example.com');
INSERT INTO notifications (email) VALUES ('example6@example.com');
INSERT INTO notifications (email) VALUES ('example7@example.com');
INSERT INTO notifications (email) VALUES ('example8@example.com');
INSERT INTO notifications (email) VALUES ('example9@example.com');
INSERT INTO notifications (email) VALUES ('example10@example.com');
