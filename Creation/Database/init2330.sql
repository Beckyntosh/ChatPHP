CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    eventName VARCHAR(50) NOT NULL,
    eventDate DATE NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    createdBy INT(6) UNSIGNED,
    FOREIGN KEY (createdBy) REFERENCES users(id)
);

INSERT INTO users (username, password, email) VALUES ('john_doe', 'password123', 'john.doe@example.com');
INSERT INTO users (username, password, email) VALUES ('jane_smith', 'abc456', 'jane.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('mike_jones', 'pass432', 'mike.jones@example.com');
INSERT INTO users (username, password, email) VALUES ('amy_wilson', 'secret789', 'amy.wilson@example.com');
INSERT INTO users (username, password, email) VALUES ('chris_brown', 'chris1234', 'chris.brown@example.com');
INSERT INTO users (username, password, email) VALUES ('sara_carter', 'letmein', 'sara.carter@example.com');
INSERT INTO users (username, password, email) VALUES ('david_smith', 'hellothere', 'david.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('emily_jones', 'welcomeme', 'emily.jones@example.com');
INSERT INTO users (username, password, email) VALUES ('matt_taylor', 'matt123', 'matt.taylor@example.com');
INSERT INTO users (username, password, email) VALUES ('laura_miller', 'greenapples', 'laura.miller@example.com');