CREATE TABLE IF NOT EXISTS subscribers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    email VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO subscribers (email) VALUES ('john.doe@example.com');
INSERT INTO subscribers (email) VALUES ('jane.smith@example.com');
INSERT INTO subscribers (email) VALUES ('mark.watson@example.com');
INSERT INTO subscribers (email) VALUES ('sara.jones@example.com');
INSERT INTO subscribers (email) VALUES ('michael.brown@example.com');
INSERT INTO subscribers (email) VALUES ('lisa.white@example.com');
INSERT INTO subscribers (email) VALUES ('kevin.wilson@example.com');
INSERT INTO subscribers (email) VALUES ('pamela.robinson@example.com');
INSERT INTO subscribers (email) VALUES ('chris.evans@example.com');
INSERT INTO subscribers (email) VALUES ('emily.baker@example.com');
