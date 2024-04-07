CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (name, email) VALUES ('John Doe', 'john.doe@example.com');
INSERT INTO users (name, email) VALUES ('Jane Smith', 'jane.smith@example.com');
INSERT INTO users (name, email) VALUES ('Michael Johnson', 'michael.johnson@example.com');
INSERT INTO users (name, email) VALUES ('Sarah Williams', 'sarah.williams@example.com');
INSERT INTO users (name, email) VALUES ('Ryan Brown', 'ryan.brown@example.com');
INSERT INTO users (name, email) VALUES ('Emily Davis', 'emily.davis@example.com');
INSERT INTO users (name, email) VALUES ('Matthew Wilson', 'matthew.wilson@example.com');
INSERT INTO users (name, email) VALUES ('Olivia Martinez', 'olivia.martinez@example.com');
INSERT INTO users (name, email) VALUES ('Daniel Garcia', 'daniel.garcia@example.com');
INSERT INTO users (name, email) VALUES ('Sophia Rodriguez', 'sophia.rodriguez@example.com');
