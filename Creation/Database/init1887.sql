CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    google_id VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (google_id, email) VALUES ('123456', 'example1@gmail.com');
INSERT INTO users (google_id, email) VALUES ('987654', 'example2@gmail.com');
INSERT INTO users (google_id, email) VALUES ('456789', 'example3@gmail.com');
INSERT INTO users (google_id, email) VALUES ('654321', 'example4@gmail.com');
INSERT INTO users (google_id, email) VALUES ('987123', 'example5@gmail.com');
INSERT INTO users (google_id, email) VALUES ('321789', 'example6@gmail.com');
INSERT INTO users (google_id, email) VALUES ('654789', 'example7@gmail.com');
INSERT INTO users (google_id, email) VALUES ('321654', 'example8@gmail.com');
INSERT INTO users (google_id, email) VALUES ('987456', 'example9@gmail.com');
INSERT INTO users (google_id, email) VALUES ('456321', 'example10@gmail.com');
