CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    google_id VARCHAR(255) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO users (google_id, email) VALUES ('123456789', 'john.doe@gmail.com');
INSERT INTO users (google_id, email) VALUES ('987654321', 'jane.smith@yahoo.com');
INSERT INTO users (google_id, email) VALUES ('456789123', 'sam.johnson@hotmail.com');
INSERT INTO users (google_id, email) VALUES ('789123456', 'emily.carter@gmail.com');
INSERT INTO users (google_id, email) VALUES ('321654987', 'william.brown@yahoo.com');
INSERT INTO users (google_id, email) VALUES ('654789123', 'sarah.white@hotmail.com');
INSERT INTO users (google_id, email) VALUES ('123987456', 'michael.adams@gmail.com');
INSERT INTO users (google_id, email) VALUES ('654321987', 'laura.miller@yahoo.com');
INSERT INTO users (google_id, email) VALUES ('456123789', 'peter.wilson@hotmail.com');
INSERT INTO users (google_id, email) VALUES ('987456321', 'olivia.jones@gmail.com');
