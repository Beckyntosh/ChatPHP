CREATE TABLE IF NOT EXISTS VolunteerEvents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
eventName VARCHAR(30) NOT NULL,
description TEXT NOT NULL,
eventDate DATE NOT NULL,
registrantName VARCHAR(50),
registrantEmail VARCHAR(50),
registrationDate TIMESTAMP
);

INSERT INTO VolunteerEvents (eventName, registrantName, registrantEmail, description, eventDate) VALUES 
('Charity Gala', 'John Doe', 'johndoe@example.com', 'Fundraising event for local charity', '2022-08-15'),
('Community Clean-up', 'Jane Smith', 'janesmith@example.com', 'Cleaning the local park', '2022-09-20'),
('Food Drive', 'Alice Johnson', 'alicejohnson@example.com', 'Collecting food donations for the needy', '2022-10-10'),
('Veterans Day Parade', 'Michael Brown', 'michaelbrown@example.com', 'Honoring our veterans', '2022-11-11'),
('Environmental Awareness Seminar', 'Sarah Lee', 'sarahlee@example.com', 'Educating about climate change', '2023-01-05'),
('Blood Donation Drive', 'Kevin Wilson', 'kevinwilson@example.com', 'Helping save lives by donating blood', '2023-02-17'),
('Animal Shelter Volunteer Day', 'Emily Davis', 'emilydavis@example.com', 'Caring for homeless animals', '2023-03-22'),
('Senior Center Bingo Night', 'James Roberts', 'jamesroberts@example.com', 'Entertaining seniors with a fun bingo night', '2023-04-18'),
('Childrens Hospital Visit', 'Olivia Taylor', 'oliviataylor@example.com', 'Spreading joy to sick children', '2023-06-07'),
('Holiday Toy Drive', 'Ethan Martinez', 'ethanmartinez@example.com', 'Collecting toys for underprivileged kids', '2023-12-15');
