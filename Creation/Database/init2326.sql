-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(64) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create events table
CREATE TABLE IF NOT EXISTS events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    eventName VARCHAR(50) NOT NULL,
    eventDate DATE NOT NULL
);

-- Create user_events table
CREATE TABLE IF NOT EXISTS user_events (
    userID INT(6) UNSIGNED,
    eventID INT(6) UNSIGNED,
    FOREIGN KEY (userID) REFERENCES users(id),
    FOREIGN KEY (eventID) REFERENCES events(id)
);

-- Insert data into the users table
INSERT INTO users (username, password, email) VALUES 
("JohnDoe", "3a5b14c55702a1972e77bc3929f3f0a64c5b7554501a688969f3ec36c7f203cb", "john.doe@example.com"),
("JaneSmith", "abc123", "jane.smith@example.com"),
("AliceJohnson", "def456", "alice.johnson@example.com"),
("BobBrown", "ghi789", "bob.brown@example.com"),
("SarahTaylor", "password123", "sarah.taylor@example.com"),
("MikeAnderson", "welcome321", "mike.anderson@example.com"),
("EmilyClark", "securepassword", "emily.clark@example.com"),
("DavidWhite", "david123", "david.white@example.com"),
("LisaThomas", "testing321", "lisa.thomas@example.com"),
("KevinYoung", "kevinpass", "kevin.young@example.com");

-- Insert data into the events table
INSERT INTO events (eventName, eventDate) VALUES 
("Webinar A", "2022-06-15"),
("Conference X", "2022-07-20"),
("Workshop Y", "2022-08-10"),
("Seminar Z", "2022-09-05"),
("Training Session 1", "2022-10-15"),
("Virtual Meetup", "2022-11-12"),
("Panel Discussion", "2022-12-08"),
("Networking Event", "2023-01-20"),
("Product Launch", "2023-02-18"),
("Industry Summit", "2023-03-25");