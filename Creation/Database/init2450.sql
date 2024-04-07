CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
google_id VARCHAR(255) NOT NULL,
email VARCHAR(50) NOT NULL,
name VARCHAR(50) NOT NULL,
registration_date TIMESTAMP,
UNIQUE (google_id),
UNIQUE (email)
);

INSERT INTO users (google_id, email, name, registration_date) VALUES ('uniqueGoogleId123', 'john.doe@gmail.com', 'John Doe', NOW());
INSERT INTO users (google_id, email, name, registration_date) VALUES ('uniqueGoogleId456', 'jane.smith@gmail.com', 'Jane Smith', NOW());
INSERT INTO users (google_id, email, name, registration_date) VALUES ('uniqueGoogleId789', 'mike.jones@gmail.com', 'Mike Jones', NOW());
INSERT INTO users (google_id, email, name, registration_date) VALUES ('uniqueGoogleId321', 'sarah.wilson@gmail.com', 'Sarah Wilson', NOW());
INSERT INTO users (google_id, email, name, registration_date) VALUES ('uniqueGoogleId654', 'megan.brown@gmail.com', 'Megan Brown', NOW());
INSERT INTO users (google_id, email, name, registration_date) VALUES ('uniqueGoogleId987', 'alex.richards@gmail.com', 'Alex Richards', NOW());
INSERT INTO users (google_id, email, name, registration_date) VALUES ('uniqueGoogleId135', 'lisa.green@gmail.com', 'Lisa Green', NOW());
INSERT INTO users (google_id, email, name, registration_date) VALUES ('uniqueGoogleId246', 'kevin.white@gmail.com', 'Kevin White', NOW());
INSERT INTO users (google_id, email, name, registration_date) VALUES ('uniqueGoogleId579', 'emily.adams@gmail.com', 'Emily Adams', NOW());
INSERT INTO users (google_id, email, name, registration_date) VALUES ('uniqueGoogleId468', 'ryan.clark@gmail.com', 'Ryan Clark', NOW());
