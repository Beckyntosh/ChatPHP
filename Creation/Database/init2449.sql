CREATE TABLE IF NOT EXISTS users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    google_id VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (google_id, name, email) VALUES ('1', 'John Doe', 'john.doe@gmail.com');
INSERT INTO users (google_id, name, email) VALUES ('2', 'Jane Smith', 'jane.smith@gmail.com');
INSERT INTO users (google_id, name, email) VALUES ('3', 'Mike Johnson', 'mike.johnson@gmail.com');
INSERT INTO users (google_id, name, email) VALUES ('4', 'Emily Brown', 'emily.brown@gmail.com');
INSERT INTO users (google_id, name, email) VALUES ('5', 'David Wilson', 'david.wilson@gmail.com');
INSERT INTO users (google_id, name, email) VALUES ('6', 'Sarah Miller', 'sarah.miller@gmail.com');
INSERT INTO users (google_id, name, email) VALUES ('7', 'Chris Davis', 'chris.davis@gmail.com');
INSERT INTO users (google_id, name, email) VALUES ('8', 'Lisa Garcia', 'lisa.garcia@gmail.com');
INSERT INTO users (google_id, name, email) VALUES ('9', 'Kevin Martinez', 'kevin.martinez@gmail.com');
INSERT INTO users (google_id, name, email) VALUES ('10', 'Amanda Hernandez', 'amanda.hernandez@gmail.com');
