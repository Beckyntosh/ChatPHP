CREATE TABLE IF NOT EXISTS VolunteerEvents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
event VARCHAR(50) NOT NULL,
registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO VolunteerEvents (name, email, event) VALUES ('John Doe', 'johndoe@example.com', 'Local Charity Event');
INSERT INTO VolunteerEvents (name, email, event) VALUES ('Jane Smith', 'janesmith@example.com', 'Beach Clean-up');
INSERT INTO VolunteerEvents (name, email, event) VALUES ('Alice Johnson', 'alicejohnson@example.com', 'Book Drive');
INSERT INTO VolunteerEvents (name, email, event) VALUES ('Bob Brown', 'bobbrown@example.com', 'Local Charity Event');
INSERT INTO VolunteerEvents (name, email, event) VALUES ('Emily Davis', 'emilydavis@example.com', 'Beach Clean-up');
INSERT INTO VolunteerEvents (name, email, event) VALUES ('Michael Wilson', 'michaelwilson@example.com', 'Book Drive');
INSERT INTO VolunteerEvents (name, email, event) VALUES ('Sarah Lee', 'sarahlee@example.com', 'Local Charity Event');
INSERT INTO VolunteerEvents (name, email, event) VALUES ('Kevin Martinez', 'kevinmartinez@example.com', 'Beach Clean-up');
INSERT INTO VolunteerEvents (name, email, event) VALUES ('Olivia Rodriguez', 'oliviarodriguez@example.com', 'Book Drive');
INSERT INTO VolunteerEvents (name, email, event) VALUES ('Daniel Jackson', 'danieljackson@example.com', 'Local Charity Event');
