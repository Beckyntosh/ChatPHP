CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    google_id VARCHAR(30) NOT NULL,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    profile_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (google_id, first_name, last_name, email, profile_url) VALUES ('123456', 'John', 'Doe', 'johndoe@gmail.com', 'https://example.com/johndoe.jpg');
INSERT INTO users (google_id, first_name, last_name, email, profile_url) VALUES ('789012', 'Alice', 'Smith', 'alicesmith@gmail.com', 'https://example.com/alicesmith.jpg');
INSERT INTO users (google_id, first_name, last_name, email, profile_url) VALUES ('345678', 'Bob', 'Johnson', 'bobjohnson@gmail.com', 'https://example.com/bobjohnson.jpg');
INSERT INTO users (google_id, first_name, last_name, email, profile_url) VALUES ('901234', 'Jane', 'Brown', 'janebrown@gmail.com', 'https://example.com/janebrown.jpg');
INSERT INTO users (google_id, first_name, last_name, email, profile_url) VALUES ('567890', 'Sam', 'Taylor', 'samtaylor@gmail.com', 'https://example.com/samtaylor.jpg');
INSERT INTO users (google_id, first_name, last_name, email, profile_url) VALUES ('234567', 'Mary', 'Clark', 'maryclark@gmail.com', 'https://example.com/maryclark.jpg');
INSERT INTO users (google_id, first_name, last_name, email, profile_url) VALUES ('890123', 'David', 'Lee', 'davidlee@gmail.com', 'https://example.com/davidlee.jpg');
INSERT INTO users (google_id, first_name, last_name, email, profile_url) VALUES ('456789', 'Emily', 'Wang', 'emilywang@gmail.com', 'https://example.com/emilywang.jpg');
INSERT INTO users (google_id, first_name, last_name, email, profile_url) VALUES ('012345', 'Michael', 'Garcia', 'michaelgarcia@gmail.com', 'https://example.com/michaelgarcia.jpg');
INSERT INTO users (google_id, first_name, last_name, email, profile_url) VALUES ('678901', 'Olivia', 'Martinez', 'oliviamartinez@gmail.com', 'https://example.com/oliviamartinez.jpg');
