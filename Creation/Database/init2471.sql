CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(32) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Appointments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
date DATE NOT NULL,
time TIME NOT NULL,
type VARCHAR(50),
FOREIGN KEY (user_id) REFERENCES Users(id)
);

INSERT INTO Users (username, password) VALUES ('john_doe', 'password123');
INSERT INTO Users (username, password) VALUES ('jane_smith', 'securepass');
INSERT INTO Users (username, password) VALUES ('mike_jackson', 'strongPWD');
INSERT INTO Users (username, password) VALUES ('sarah_carter', 'safePassword');
INSERT INTO Users (username, password) VALUES ('adam_gray', 'pass1234');
INSERT INTO Users (username, password) VALUES ('lisa_parker', 'letmein');
INSERT INTO Users (username, password) VALUES ('chris_hill', 'passwordABC');
INSERT INTO Users (username, password) VALUES ('emily_wong', '123456789');
INSERT INTO Users (username, password) VALUES ('david_green', 'abc12345');
INSERT INTO Users (username, password) VALUES ('amanda_white', 'password321');

INSERT INTO Appointments (user_id, date, time, type) VALUES (1, '2022-10-10', '14:00:00', 'Dental Checkup');
INSERT INTO Appointments (user_id, date, time, type) VALUES (2, '2022-10-12', '10:30:00', 'Cavity Filling');
INSERT INTO Appointments (user_id, date, time, type) VALUES (3, '2022-10-15', '09:00:00', 'Tooth Extraction');
INSERT INTO Appointments (user_id, date, time, type) VALUES (4, '2022-10-20', '15:30:00', 'Teeth Whitening');
INSERT INTO Appointments (user_id, date, time, type) VALUES (5, '2022-10-25', '11:45:00', 'Dental Checkup');
INSERT INTO Appointments (user_id, date, time, type) VALUES (6, '2022-10-28', '13:15:00', 'Cavity Filling');
INSERT INTO Appointments (user_id, date, time, type) VALUES (7, '2022-11-02', '16:00:00', 'Tooth Extraction');
INSERT INTO Appointments (user_id, date, time, type) VALUES (8, '2022-11-05', '09:30:00', 'Teeth Whitening');
INSERT INTO Appointments (user_id, date, time, type) VALUES (9, '2022-11-10', '10:00:00', 'Dental Checkup');
INSERT INTO Appointments (user_id, date, time, type) VALUES (10, '2022-11-15', '14:45:00', 'Cavity Filling');
