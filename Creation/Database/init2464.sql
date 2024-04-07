CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    google_id VARCHAR(255) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO users (google_id, email) VALUES ('123456', 'example1@gmail.com');
INSERT INTO users (google_id, email) VALUES ('234567', 'example2@gmail.com');
INSERT INTO users (google_id, email) VALUES ('345678', 'example3@gmail.com');
INSERT INTO users (google_id, email) VALUES ('456789', 'example4@gmail.com');
INSERT INTO users (google_id, email) VALUES ('567890', 'example5@gmail.com');
INSERT INTO users (google_id, email) VALUES ('678901', 'example6@gmail.com');
INSERT INTO users (google_id, email) VALUES ('789012', 'example7@gmail.com');
INSERT INTO users (google_id, email) VALUES ('890123', 'example8@gmail.com');
INSERT INTO users (google_id, email) VALUES ('901234', 'example9@gmail.com');
INSERT INTO users (google_id, email) VALUES ('012345', 'example10@gmail.com');
