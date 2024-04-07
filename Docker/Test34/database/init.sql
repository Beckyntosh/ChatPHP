CREATE TABLE IF NOT EXISTS volunteers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    event VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO volunteers (fullname, email, event) VALUES ('John Doe', 'john@example.com', 'charity');
INSERT INTO volunteers (fullname, email, event) VALUES ('Jane Smith', 'jane@example.com', 'cleaning');
INSERT INTO volunteers (fullname, email, event) VALUES ('Michael Johnson', 'michael@example.com', 'planting');
INSERT INTO volunteers (fullname, email, event) VALUES ('Sarah Davis', 'sarah@example.com', 'charity');
INSERT INTO volunteers (fullname, email, event) VALUES ('Kevin Brown', 'kevin@example.com', 'cleaning');
INSERT INTO volunteers (fullname, email, event) VALUES ('Emily Wilson', 'emily@example.com', 'planting');
INSERT INTO volunteers (fullname, email, event) VALUES ('Alex Clark', 'alex@example.com', 'charity');
INSERT INTO volunteers (fullname, email, event) VALUES ('Jessica Lee', 'jessica@example.com', 'cleaning');
INSERT INTO volunteers (fullname, email, event) VALUES ('Ryan Martinez', 'ryan@example.com', 'planting');
INSERT INTO volunteers (fullname, email, event) VALUES ('Laura Taylor', 'laura@example.com', 'charity');
