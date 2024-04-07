CREATE TABLE IF NOT EXISTS volunteers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(50) NOT NULL,
email VARCHAR(50),
event VARCHAR(100),
registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO volunteers (fullname, email, event) VALUES ('John Doe', 'john.doe@example.com', 'Local Charity Event');
INSERT INTO volunteers (fullname, email, event) VALUES ('Jane Smith', 'jane.smith@example.com', 'Community Clean-up');
INSERT INTO volunteers (fullname, email, event) VALUES ('Michael Johnson', 'michael.johnson@example.com', 'Food Drive');
INSERT INTO volunteers (fullname, email, event) VALUES ('Sarah Brown', 'sarah.brown@example.com', 'Local Charity Event');
INSERT INTO volunteers (fullname, email, event) VALUES ('David Lee', 'david.lee@example.com', 'Community Clean-up');
INSERT INTO volunteers (fullname, email, event) VALUES ('Emily Davis', 'emily.davis@example.com', 'Local Charity Event');
INSERT INTO volunteers (fullname, email, event) VALUES ('Alex Wilson', 'alex.wilson@example.com', 'Community Clean-up');
INSERT INTO volunteers (fullname, email, event) VALUES ('Olivia Taylor', 'olivia.taylor@example.com', 'Food Drive');
INSERT INTO volunteers (fullname, email, event) VALUES ('Daniel Clark', 'daniel.clark@example.com', 'Local Charity Event');
INSERT INTO volunteers (fullname, email, event) VALUES ('Sophia Martinez', 'sophia.martinez@example.com', 'Food Drive');
