CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS loyalty_program (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    points INT(6) DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (firstname, lastname, email) VALUES ('John', 'Doe', 'john.doe@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Jane', 'Smith', 'jane.smith@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Michael', 'Johnson', 'michael.johnson@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Sarah', 'Williams', 'sarah.williams@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('David', 'Brown', 'david.brown@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Laura', 'Davis', 'laura.davis@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Kevin', 'Martinez', 'kevin.martinez@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Amy', 'Garcia', 'amy.garcia@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Brian', 'Rodriguez', 'brian.rodriguez@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Jessica', 'Hernandez', 'jessica.hernandez@example.com');