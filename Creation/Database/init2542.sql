CREATE TABLE IF NOT EXISTS Volunteers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullName VARCHAR(30) NOT NULL,
email VARCHAR(50),
event VARCHAR(50) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Volunteers (fullName, email, event) VALUES ('John Doe', 'john.doe@example.com', 'Local Charity Event');
INSERT INTO Volunteers (fullName, email, event) VALUES ('Jane Smith', 'jane.smith@example.com', 'Community Cleanup');
INSERT INTO Volunteers (fullName, email, event) VALUES ('David Lee', 'david.lee@example.com', 'Food Drive');
INSERT INTO Volunteers (fullName, email, event) VALUES ('Emily Brown', 'emily.brown@example.com', 'Local Charity Event');
INSERT INTO Volunteers (fullName, email, event) VALUES ('Michael Johnson', 'michael.johnson@example.com', 'Community Cleanup');
INSERT INTO Volunteers (fullName, email, event) VALUES ('Sarah Williams', 'sarah.williams@example.com', 'Food Drive');
INSERT INTO Volunteers (fullName, email, event) VALUES ('Kevin Davis', 'kevin.davis@example.com', 'Local Charity Event');
INSERT INTO Volunteers (fullName, email, event) VALUES ('Laura Martinez', 'laura.martinez@example.com', 'Community Cleanup');
INSERT INTO Volunteers (fullName, email, event) VALUES ('Ryan Taylor', 'ryan.taylor@example.com', 'Food Drive');
INSERT INTO Volunteers (fullName, email, event) VALUES ('Amanda Clark', 'amanda.clark@example.com', 'Local Charity Event');