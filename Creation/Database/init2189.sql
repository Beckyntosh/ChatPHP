CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (name, email) VALUES ('John Doe', 'john.doe@example.com');
INSERT INTO users (name, email) VALUES ('Jane Smith', 'jane.smith@example.com');
INSERT INTO users (name, email) VALUES ('Michael Johnson', 'michael.johnson@example.com');
INSERT INTO users (name, email) VALUES ('Emily Brown', 'emily.brown@example.com');
INSERT INTO users (name, email) VALUES ('David Wilson', 'david.wilson@example.com');
INSERT INTO users (name, email) VALUES ('Sarah Davis', 'sarah.davis@example.com');
INSERT INTO users (name, email) VALUES ('Kevin Martinez', 'kevin.martinez@example.com');
INSERT INTO users (name, email) VALUES ('Lisa Garcia', 'lisa.garcia@example.com');
INSERT INTO users (name, email) VALUES ('Brian Adams', 'brian.adams@example.com');
INSERT INTO users (name, email) VALUES ('Amy Rodriguez', 'amy.rodriguez@example.com');
