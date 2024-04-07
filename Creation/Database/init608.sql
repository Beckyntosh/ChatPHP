CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS game_saves (
    id INT AUTO_INCREMENT PRIMARY KEY,
    userid INT,
    filename VARCHAR(255),
    filepath VARCHAR(255),
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username, password, email) VALUES ('john_doe', 'john123', 'john.doe@example.com');
INSERT INTO users (username, password, email) VALUES ('jane_smith', 'jane456', 'jane.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('mark_jones', 'mark789', 'mark.jones@example.com');
INSERT INTO users (username, password, email) VALUES ('sarah_wilson', 'sarah111', 'sarah.wilson@example.com');
INSERT INTO users (username, password, email) VALUES ('alex_roberts', 'alex222', 'alex.roberts@example.com');
INSERT INTO users (username, password, email) VALUES ('lisa_adams', 'lisa333', 'lisa.adams@example.com');
INSERT INTO users (username, password, email) VALUES ('matt_brown', 'matt444', 'matt.brown@example.com');
INSERT INTO users (username, password, email) VALUES ('emily_taylor', 'emily555', 'emily.taylor@example.com');
INSERT INTO users (username, password, email) VALUES ('david_clark', 'david666', 'david.clark@example.com');
INSERT INTO users (username, password, email) VALUES ('natalie_white', 'natalie777', 'natalie.white@example.com');