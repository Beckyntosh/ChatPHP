CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES ('john_doe', 'john.doe@example.com', 'password123');
INSERT INTO users (username, email, password) VALUES ('jane_smith', 'jane.smith@example.com', 'password456');
INSERT INTO users (username, email, password) VALUES ('lisa_jones', 'lisa.jones@example.com', 'password789');
INSERT INTO users (username, email, password) VALUES ('mike_brown', 'mike.brown@example.com', 'passwordabc');
INSERT INTO users (username, email, password) VALUES ('sara_miller', 'sara.miller@example.com', 'passworddef');
INSERT INTO users (username, email, password) VALUES ('chris_taylor', 'chris.taylor@example.com', 'passwordghi');
INSERT INTO users (username, email, password) VALUES ('amy_wilson', 'amy.wilson@example.com', 'passwordjkl');
INSERT INTO users (username, email, password) VALUES ('kevin_adams', 'kevin.adams@example.com', 'passwordmno');
INSERT INTO users (username, email, password) VALUES ('laura_roberts', 'laura.roberts@example.com', 'passwordpqr');
INSERT INTO users (username, email, password) VALUES ('sam_clark', 'sam.clark@example.com', 'passwordstu');