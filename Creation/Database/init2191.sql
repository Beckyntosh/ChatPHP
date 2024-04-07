CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Users (fullname, email) VALUES ('Alice Johnson', 'alice@example.com');
INSERT INTO Users (fullname, email) VALUES ('Bob Smith', 'bob@example.com');
INSERT INTO Users (fullname, email) VALUES ('Charlie Brown', 'charlie@example.com');
INSERT INTO Users (fullname, email) VALUES ('David Lee', 'david@example.com');
INSERT INTO Users (fullname, email) VALUES ('Eva Wilson', 'eva@example.com');
INSERT INTO Users (fullname, email) VALUES ('Fiona Davis', 'fiona@example.com');
INSERT INTO Users (fullname, email) VALUES ('George Miller', 'george@example.com');
INSERT INTO Users (fullname, email) VALUES ('Hannah Taylor', 'hannah@example.com');
INSERT INTO Users (fullname, email) VALUES ('Ian Roberts', 'ian@example.com');
INSERT INTO Users (fullname, email) VALUES ('Jackie Brown', 'jackie@example.com');
