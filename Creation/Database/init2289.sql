CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    token VARCHAR(50) NOT NULL,
    verified TINYINT(1) NOT NULL DEFAULT 0,
    reg_date TIMESTAMP
);

INSERT INTO users (email, token, verified) VALUES ('john@example.com', 'abc123', 1);
INSERT INTO users (email, token, verified) VALUES ('jane@example.com', 'def456', 0);
INSERT INTO users (email, token, verified) VALUES ('smith@example.com', 'ghi789', 1);
INSERT INTO users (email, token, verified) VALUES ('emily@example.com', 'jkl012', 0);
INSERT INTO users (email, token, verified) VALUES ('michael@example.com', 'mno345', 1);
INSERT INTO users (email, token, verified) VALUES ('sarah@example.com', 'pqr678', 0);
INSERT INTO users (email, token, verified) VALUES ('david@example.com', 'stu901', 1);
INSERT INTO users (email, token, verified) VALUES ('linda@example.com', 'vwx234', 0);
INSERT INTO users (email, token, verified) VALUES ('peter@example.com', 'yza567', 1);
INSERT INTO users (email, token, verified) VALUES ('amanda@example.com', 'bcd890', 0);
