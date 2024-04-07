CREATE TABLE IF NOT EXISTS captcha_codes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    captcha_code VARCHAR(6) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO captcha_codes (captcha_code) VALUES ('ABC123');
INSERT INTO captcha_codes (captcha_code) VALUES ('DEF456');
INSERT INTO captcha_codes (captcha_code) VALUES ('GHI789');
INSERT INTO captcha_codes (captcha_code) VALUES ('JKL321');
INSERT INTO captcha_codes (captcha_code) VALUES ('MNO654');
INSERT INTO captcha_codes (captcha_code) VALUES ('PQR987');
INSERT INTO captcha_codes (captcha_code) VALUES ('STU123');
INSERT INTO captcha_codes (captcha_code) VALUES ('VWX456');
INSERT INTO captcha_codes (captcha_code) VALUES ('YZA789');
INSERT INTO captcha_codes (captcha_code) VALUES ('BCD123');
