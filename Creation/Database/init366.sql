CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(32) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
coupon_code VARCHAR(50)
);

INSERT INTO users (username, password, coupon_code) VALUES ('JohnDoe', MD5('password123'), 'ABC123'),
('JaneSmith', MD5('ilovecoding'), 'DEF456'),
('MikeJohnson', MD5('securepass'), 'GHI789'),
('SarahLee', MD5('p@ssw0rd'), 'JKL012'),
('TomBrown', MD5('1234567'), 'MNO345'),
('EmilyDavis', MD5('password321'), 'PQR678'),
('AlexClark', MD5('secretpass123'), 'STU901'),
('OliviaTaylor', MD5('pass123'), 'VWX234'),
('RyanMoore', MD5('p@ssword'), 'YZA567'),
('SophiaKing', MD5('letmein'), 'BCD890');
