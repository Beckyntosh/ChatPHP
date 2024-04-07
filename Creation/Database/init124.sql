CREATE TABLE IF NOT EXISTS patients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(30) NOT NULL,
    lastName VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(15),
    reg_date TIMESTAMP
);

INSERT INTO patients (firstName, lastName, email, phone) VALUES ('John', 'Doe', 'johndoe@example.com', '1234567890');
INSERT INTO patients (firstName, lastName, email, phone) VALUES ('Alice', 'Smith', 'alice.smith@example.com', '9876543210');
INSERT INTO patients (firstName, lastName, email, phone) VALUES ('Bob', 'Johnson', 'bob.johnson@example.com', '5647382910');
INSERT INTO patients (firstName, lastName, email, phone) VALUES ('Emily', 'Brown', 'emily.brown@example.com', '9081726354');
INSERT INTO patients (firstName, lastName, email, phone) VALUES ('Michael', 'Lee', 'michael.lee@example.com', '2468091735');
INSERT INTO patients (firstName, lastName, email, phone) VALUES ('Sarah', 'Lewis', 'sarah.lewis@example.com', '4356728901');
INSERT INTO patients (firstName, lastName, email, phone) VALUES ('Ryan', 'Clark', 'ryan.clark@example.com', '9876543211');
INSERT INTO patients (firstName, lastName, email, phone) VALUES ('Kim', 'Taylor', 'kim.taylor@example.com', '1234567891');
INSERT INTO patients (firstName, lastName, email, phone) VALUES ('Eva', 'Martinez', 'eva.martinez@example.com', '6758492013');
INSERT INTO patients (firstName, lastName, email, phone) VALUES ('Alex', 'Garcia', 'alex.garcia@example.com', '1928374650');
