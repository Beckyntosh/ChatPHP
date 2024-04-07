CREATE TABLE pwdReset (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pwdResetEmail VARCHAR(255) NOT NULL,
    pwdResetToken VARCHAR(64) NOT NULL,
    pwdResetExpires INT NOT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO pwdReset (pwdResetEmail, pwdResetToken, pwdResetExpires) VALUES ('john@example.com', 'abc123', 1634050800);
INSERT INTO pwdReset (pwdResetEmail, pwdResetToken, pwdResetExpires) VALUES ('jane@example.com', 'def456', 1634052000);
INSERT INTO pwdReset (pwdResetEmail, pwdResetToken, pwdResetExpires) VALUES ('alice@example.com', 'ghi789', 1634053200);
INSERT INTO pwdReset (pwdResetEmail, pwdResetToken, pwdResetExpires) VALUES ('bob@example.com', 'jkl012', 1634054400);
INSERT INTO pwdReset (pwdResetEmail, pwdResetToken, pwdResetExpires) VALUES ('sarah@example.com', 'mno345', 1634055600);
INSERT INTO pwdReset (pwdResetEmail, pwdResetToken, pwdResetExpires) VALUES ('mike@example.com', 'pqr678', 1634056800);
INSERT INTO pwdReset (pwdResetEmail, pwdResetToken, pwdResetExpires) VALUES ('lisa@example.com', 'stu901', 1634058000);
INSERT INTO pwdReset (pwdResetEmail, pwdResetToken, pwdResetExpires) VALUES ('tom@example.com', 'vwx234', 1634059200);
INSERT INTO pwdReset (pwdResetEmail, pwdResetToken, pwdResetExpires) VALUES ('emily@example.com', 'yz5678', 1634060400);
INSERT INTO pwdReset (pwdResetEmail, pwdResetToken, pwdResetExpires) VALUES ('peter@example.com', '123abc', 1634061600);
