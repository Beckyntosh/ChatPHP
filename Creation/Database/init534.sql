CREATE TABLE IF NOT EXISTS password_reset (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    token VARCHAR(255) NOT NULL,
    expiration DATETIME NOT NULL
);

INSERT INTO password_reset (email, token, expiration) VALUES ('john@example.com', 'token1234', '2022-12-31 23:59:59');
INSERT INTO password_reset (email, token, expiration) VALUES ('mary@example.com', 'token5678', '2022-12-30 12:00:00');
INSERT INTO password_reset (email, token, expiration) VALUES ('alex@example.com', 'tokenabcd', '2022-12-29 18:30:00');
INSERT INTO password_reset (email, token, expiration) VALUES ('susan@example.com', 'tokenefgh', '2022-12-28 20:45:00');
INSERT INTO password_reset (email, token, expiration) VALUES ('david@example.com', 'tokenijkl', '2022-12-27 10:15:00');
INSERT INTO password_reset (email, token, expiration) VALUES ('linda@example.com', 'tokenmnop', '2022-12-26 14:20:00');
INSERT INTO password_reset (email, token, expiration) VALUES ('steve@example.com', 'tokenqrst', '2022-12-25 17:30:00');
INSERT INTO password_reset (email, token, expiration) VALUES ('emily@example.com', 'tokenuvwx', '2022-12-24 08:45:00');
INSERT INTO password_reset (email, token, expiration) VALUES ('peter@example.com', 'tokenyzab', '2022-12-23 11:00:00');
INSERT INTO password_reset (email, token, expiration) VALUES ('jane@example.com', 'tokencdef', '2022-12-22 19:00:00');
