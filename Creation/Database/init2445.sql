CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
google_id VARCHAR(255) NOT NULL,
email VARCHAR(50) NOT NULL,
name VARCHAR(50) NOT NULL,
registration_date TIMESTAMP,
UNIQUE (google_id),
UNIQUE (email)
);

INSERT INTO users (google_id, email, name) VALUES ('google_id_1', 'email1@example.com', 'Alice');
INSERT INTO users (google_id, email, name) VALUES ('google_id_2', 'email2@example.com', 'Bob');
INSERT INTO users (google_id, email, name) VALUES ('google_id_3', 'email3@example.com', 'Charlie');
INSERT INTO users (google_id, email, name) VALUES ('google_id_4', 'email4@example.com', 'David');
INSERT INTO users (google_id, email, name) VALUES ('google_id_5', 'email5@example.com', 'Eve');
INSERT INTO users (google_id, email, name) VALUES ('google_id_6', 'email6@example.com', 'Frank');
INSERT INTO users (google_id, email, name) VALUES ('google_id_7', 'email7@example.com', 'Grace');
INSERT INTO users (google_id, email, name) VALUES ('google_id_8', 'email8@example.com', 'Harry');
INSERT INTO users (google_id, email, name) VALUES ('google_id_9', 'email9@example.com', 'Ivy');
INSERT INTO users (google_id, email, name) VALUES ('google_id_10', 'email10@example.com', 'Jack');
