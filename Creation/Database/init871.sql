CREATE TABLE IF NOT EXISTS enrolment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    date DATE,
    location VARCHAR(255)
);

INSERT INTO enrolment (user_id, product_id) VALUES
(1, 101),
(2, 102),
(3, 103),
(4, 104),
(5, 105),
(6, 106),
(7, 107),
(8, 108),
(9, 109),
(10, 110);

INSERT INTO users (username, name, email, password) VALUES
('john_doe', 'John Doe', 'john.doe@example.com', 'password123'),
('jane_smith', 'Jane Smith', 'jane.smith@example.com', 'securepass'),
('mike_jones', 'Mike Jones', 'mike.jones@example.com', 'qwerty123'),
('sara_adams', 'Sara Adams', 'sara.adams@example.com', 'pass1234'),
('alex_brown', 'Alex Brown', 'alex.brown@example.com', 'mysecret'),
('lisa_white', 'Lisa White', 'lisa.white@example.com', 'letmein'),
('ryan_grey', 'Ryan Grey', 'ryan.grey@example.com', 'password2022'),
('emily_clark', 'Emily Clark', 'emily.clark@example.com', 'p@ssw0rd'),
('david_taylor', 'David Taylor', 'david.taylor@example.com', 'user123'),
('olivia_ross', 'Olivia Ross', 'olivia.ross@example.com', '12345678');

INSERT INTO events (title, description, date, location) VALUES
('Conference', 'Annual tech conference.', '2022-08-15', 'Convention Center'),
('Workshop', 'Digital marketing workshop.', '2022-09-10', 'Marketing Agency'),
('Seminar', 'Leadership skills seminar.', '2022-07-25', 'Business Center'),
('Hackathon', '24-hour coding competition.', '2022-10-05', 'Tech Hub'),
('Expo', 'Industry expo showcasing innovations.', '2022-11-20', 'Exhibition Center'),
('Webinar', 'Online webinar on AI technologies.', '2022-06-30', 'Virtual Event'),
('Training Session', 'Employee training session.', '2022-08-05', 'Company HQ'),
('Meetup', 'Networking meetup for professionals.', '2022-09-18', 'Café'),
('Health Fair', 'Health and wellness fair.', '2022-07-10', 'Community Center'),
('Symposium', 'Academic symposium on global issues.', '2022-10-30', 'University Auditorium');
