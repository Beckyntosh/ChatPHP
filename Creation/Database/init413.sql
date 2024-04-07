CREATE TABLE IF NOT EXISTS VolunteerEvents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
eventName VARCHAR(30) NOT NULL,
eventDate DATE NOT NULL,
volunteerName VARCHAR(50),
volunteerEmail VARCHAR(50),
reg_date TIMESTAMP
);

INSERT INTO VolunteerEvents (eventName, eventDate, volunteerName, volunteerEmail) VALUES ('Event1', '2022-06-15', 'John Doe', 'john.doe@example.com');
INSERT INTO VolunteerEvents (eventName, eventDate, volunteerName, volunteerEmail) VALUES ('Event2', '2022-06-20', 'Jane Smith', 'jane.smith@example.com');
INSERT INTO VolunteerEvents (eventName, eventDate, volunteerName, volunteerEmail) VALUES ('Event3', '2022-06-25', 'Michael Brown', 'michael.brown@example.com');
INSERT INTO VolunteerEvents (eventName, eventDate, volunteerName, volunteerEmail) VALUES ('Event4', '2022-07-01', 'Sarah Wilson', 'sarah.wilson@example.com');
INSERT INTO VolunteerEvents (eventName, eventDate, volunteerName, volunteerEmail) VALUES ('Event5', '2022-07-05', 'Adam Taylor', 'adam.taylor@example.com');
INSERT INTO VolunteerEvents (eventName, eventDate, volunteerName, volunteerEmail) VALUES ('Event6', '2022-07-10', 'Emily Anderson', 'emily.anderson@example.com');
INSERT INTO VolunteerEvents (eventName, eventDate, volunteerName, volunteerEmail) VALUES ('Event7', '2022-07-15', 'Chris Roberts', 'chris.roberts@example.com');
INSERT INTO VolunteerEvents (eventName, eventDate, volunteerName, volunteerEmail) VALUES ('Event8', '2022-07-20', 'Laura Davis', 'laura.davis@example.com');
INSERT INTO VolunteerEvents (eventName, eventDate, volunteerName, volunteerEmail) VALUES ('Event9', '2022-07-25', 'Kevin Jackson', 'kevin.jackson@example.com');
INSERT INTO VolunteerEvents (eventName, eventDate, volunteerName, volunteerEmail) VALUES ('Event10', '2022-07-30', 'Amanda White', 'amanda.white@example.com');