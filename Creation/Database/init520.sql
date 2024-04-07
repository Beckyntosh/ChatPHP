CREATE TABLE IF NOT EXISTS captcha_codes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    captcha_code VARCHAR(6) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Insert data into captcha_codes table
INSERT INTO captcha_codes (captcha_code) VALUES ('ABC123'), ('DEF456'), ('GHI789'), ('JKL012'), ('MNO345'), ('PQR678'), ('STU901'), ('VWX234'), ('YZA567'), ('BCD890');