CREATE TABLE IF NOT EXISTS Volunteers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
email VARCHAR(50),
event VARCHAR(100),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Volunteers (name, email, event) VALUES ('John Doe', 'john.doe@example.com', 'Community Cleanup');
INSERT INTO Volunteers (name, email, event) VALUES ('Jane Smith', 'jane.smith@example.com', 'Food Drive');
INSERT INTO Volunteers (name, email, event) VALUES ('Michael Johnson', 'michael.johnson@example.com', 'Fundraising Gala');
INSERT INTO Volunteers (name, email, event) VALUES ('Sarah Williams', 'sarah.williams@example.com', 'Beach Cleanup');
INSERT INTO Volunteers (name, email, event) VALUES ('Robert Brown', 'robert.brown@example.com', 'Animal Shelter Event');
INSERT INTO Volunteers (name, email, event) VALUES ('Amanda Lee', 'amanda.lee@example.com', 'Community Garden Project');
INSERT INTO Volunteers (name, email, event) VALUES ('Daniel Garcia', 'daniel.garcia@example.com', 'Habitat Restoration');
INSERT INTO Volunteers (name, email, event) VALUES ('Maria Martinez', 'maria.martinez@example.com', 'Childrens Charity Event');
INSERT INTO Volunteers (name, email, event) VALUES ('William Jones', 'william.jones@example.com', 'Homeless Shelter Volunteer');
INSERT INTO Volunteers (name, email, event) VALUES ('Emily Taylor', 'emily.taylor@example.com', 'Senior Citizen Care Program');
