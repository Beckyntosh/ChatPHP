CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    google_id VARCHAR(30) NOT NULL,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (google_id, firstname, lastname, email) VALUES ('123456', 'John', 'Doe', 'john.doe@gmail.com');
INSERT INTO users (google_id, firstname, lastname, email) VALUES ('7891011', 'Jane', 'Smith', 'jane.smith@gmail.com');
INSERT INTO users (google_id, firstname, lastname, email) VALUES ('121314', 'Alice', 'Johnson', 'alice.johnson@gmail.com');
INSERT INTO users (google_id, firstname, lastname, email) VALUES ('151617', 'Bob', 'Brown', 'bob.brown@gmail.com');
INSERT INTO users (google_id, firstname, lastname, email) VALUES ('181920', 'Sarah', 'Taylor', 'sarah.taylor@gmail.com');
INSERT INTO users (google_id, firstname, lastname, email) VALUES ('212223', 'Mike', 'Wilson', 'mike.wilson@gmail.com');
INSERT INTO users (google_id, firstname, lastname, email) VALUES ('242526', 'Emily', 'Clark', 'emily.clark@gmail.com');
INSERT INTO users (google_id, firstname, lastname, email) VALUES ('272829', 'David', 'Martinez', 'david.martinez@gmail.com');
INSERT INTO users (google_id, firstname, lastname, email) VALUES ('303132', 'Laura', 'Hernandez', 'laura.hernandez@gmail.com');
INSERT INTO users (google_id, firstname, lastname, email) VALUES ('333435', 'Chris', 'Garcia', 'chris.garcia@gmail.com');
