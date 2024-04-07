CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    google_id VARCHAR(255) NOT NULL,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO users (google_id, firstname, lastname, email) VALUES ('001', 'John', 'Doe', 'john.doe@example.com');
INSERT INTO users (google_id, firstname, lastname, email) VALUES ('002', 'Jane', 'Smith', 'jane.smith@example.com');
INSERT INTO users (google_id, firstname, lastname, email) VALUES ('003', 'Mike', 'Johnson', 'mike.johnson@example.com');
INSERT INTO users (google_id, firstname, lastname, email) VALUES ('004', 'Sarah', 'Brown', 'sarah.brown@example.com');
INSERT INTO users (google_id, firstname, lastname, email) VALUES ('005', 'Chris', 'Wilson', 'chris.wilson@example.com');
INSERT INTO users (google_id, firstname, lastname, email) VALUES ('006', 'Emily', 'Davis', 'emily.davis@example.com');
INSERT INTO users (google_id, firstname, lastname, email) VALUES ('007', 'Daniel', 'Martinez', 'daniel.martinez@example.com');
INSERT INTO users (google_id, firstname, lastname, email) VALUES ('008', 'Amy', 'Garcia', 'amy.garcia@example.com');
INSERT INTO users (google_id, firstname, lastname, email) VALUES ('009', 'Mark', 'Perez', 'mark.perez@example.com');
INSERT INTO users (google_id, firstname, lastname, email) VALUES ('010', 'Laura', 'Rodriguez', 'laura.rodriguez@example.com');
