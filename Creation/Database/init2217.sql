CREATE TABLE IF NOT EXISTS subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    code VARCHAR(64) NOT NULL,
    confirmed BOOLEAN DEFAULT 0,
    reg_date TIMESTAMP
);

INSERT INTO subscribers (email, code) VALUES ('email1@example.com', 'code1');
INSERT INTO subscribers (email, code) VALUES ('email2@example.com', 'code2');
INSERT INTO subscribers (email, code) VALUES ('email3@example.com', 'code3');
INSERT INTO subscribers (email, code) VALUES ('email4@example.com', 'code4');
INSERT INTO subscribers (email, code) VALUES ('email5@example.com', 'code5');
INSERT INTO subscribers (email, code) VALUES ('email6@example.com', 'code6');
INSERT INTO subscribers (email, code) VALUES ('email7@example.com', 'code7');
INSERT INTO subscribers (email, code) VALUES ('email8@example.com', 'code8');
INSERT INTO subscribers (email, code) VALUES ('email9@example.com', 'code9');
INSERT INTO subscribers (email, code) VALUES ('email10@example.com', 'code10');
