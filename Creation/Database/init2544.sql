CREATE TABLE IF NOT EXISTS volunteer_signups (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(50) NOT NULL,
email VARCHAR(50),
event VARCHAR(100),
signup_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO volunteer_signups (fullname, email, event) VALUES ('John Doe', 'john.doe@example.com', 'Local Charity Event');
INSERT INTO volunteer_signups (fullname, email, event) VALUES ('Jane Smith', 'jane.smith@example.com', 'Beach Clean-Up');
INSERT INTO volunteer_signups (fullname, email, event) VALUES ('Michael Johnson', 'michael.johnson@example.com', 'Food Drive');
INSERT INTO volunteer_signups (fullname, email, event) VALUES ('Emily White', 'emily.white@example.com', 'Local Charity Event');
INSERT INTO volunteer_signups (fullname, email, event) VALUES ('David Brown', 'david.brown@example.com', 'Beach Clean-Up');
INSERT INTO volunteer_signups (fullname, email, event) VALUES ('Sarah Wilson', 'sarah.wilson@example.com', 'Food Drive');
INSERT INTO volunteer_signups (fullname, email, event) VALUES ('Alex Garcia', 'alex.garcia@example.com', 'Local Charity Event');
INSERT INTO volunteer_signups (fullname, email, event) VALUES ('Olivia Martinez', 'olivia.martinez@example.com', 'Beach Clean-Up');
INSERT INTO volunteer_signups (fullname, email, event) VALUES ('Ryan Lee', 'ryan.lee@example.com', 'Food Drive');
INSERT INTO volunteer_signups (fullname, email, event) VALUES ('Ava Rodriguez', 'ava.rodriguez@example.com', 'Local Charity Event');
