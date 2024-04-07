CREATE TABLE IF NOT EXISTS newsletter_subscribers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    token VARCHAR(64) NOT NULL,
    verified TINYINT(1) NOT NULL DEFAULT 0,
    reg_date TIMESTAMP
);

INSERT INTO newsletter_subscribers (email, token) VALUES ('john@example.com', '7f597d15bb580a842a7d8d0b67e156a73f4bb7c51eb8f5ab468606dcbd48ca66');
INSERT INTO newsletter_subscribers (email, token) VALUES ('jane@example.com', '7f597d15bb580a842a7d8d0b67e156a73f4bb7c51eb8f5ab468606dcbd48ca99');
INSERT INTO newsletter_subscribers (email, token) VALUES ('mark@example.com', '7f597d15bb580a842a7d8d0b67e156a73f4bb7c51eb8f5ab468606dcbd48caff');
INSERT INTO newsletter_subscribers (email, token) VALUES ('sara@example.com', '7f597d15bb580a842a7d8d0b67e156a73f4bb7c51eb8f5ab468606dcbd48caaa');
INSERT INTO newsletter_subscribers (email, token) VALUES ('sam@example.com', '7f597d15bb580a842a7d8d0b67e156a73f4bb7c51eb8f5ab468606dcbd48cabb');
INSERT INTO newsletter_subscribers (email, token) VALUES ('emily@example.com', '7f597d15bb580a842a7d8d0b67e156a73f4bb7c51eb8f5ab468606dcbd48cab5');
INSERT INTO newsletter_subscribers (email, token) VALUES ('alex@example.com', '7f597d15bb580a842a7d8d0b67e156a73f4bb7c51eb8f5ab468606dcbd48cab6');
INSERT INTO newsletter_subscribers (email, token) VALUES ('lucas@example.com', '7f597d15bb580a842a7d8d0b67e156a73f4bb7c51eb8f5ab468606dcbd48cab8');
INSERT INTO newsletter_subscribers (email, token) VALUES ('chloe@example.com', '7f597d15bb580a842a7d8d0b67e156a73f4bb7c51eb8f5ab468606dcbd48cab9');
INSERT INTO newsletter_subscribers (email, token) VALUES ('olivia@example.com', '7f597d15bb580a842a7d8d0b67e156a73f4bb7c51eb8f5ab468606dcbd48cac0');
