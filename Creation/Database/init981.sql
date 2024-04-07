CREATE TABLE IF NOT EXISTS event_feedback (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
event_name VARCHAR(50) NOT NULL,
attendee_name VARCHAR(50),
rating INT(1),
feedback TEXT,
reg_date TIMESTAMP
) CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO event_feedback (event_name, attendee_name, rating, feedback) VALUES ("Music Festival", "John Doe", 4, "Great atmosphere and performances");
INSERT INTO event_feedback (event_name, attendee_name, rating, feedback) VALUES ("Conference", "Alice Smith", 5, "Informative talks and well-organized event");
INSERT INTO event_feedback (event_name, attendee_name, rating, feedback) VALUES ("Concert", "Bob Johnson", 3, "Sound quality could have been better");
INSERT INTO event_feedback (event_name, attendee_name, rating, feedback) VALUES ("Music Festival", "Emily Brown", 5, "Fantastic experience, will definitely come again");
INSERT INTO event_feedback (event_name, attendee_name, rating, feedback) VALUES ("Conference", "Sam Wilson", 4, "Networking opportunities were valuable");
INSERT INTO event_feedback (event_name, attendee_name, rating, feedback) VALUES ("Music Festival", "Sarah Davis", 4, "Loved the food options");
INSERT INTO event_feedback (event_name, attendee_name, rating, feedback) VALUES ("Concert", "Michael Lee", 2, "Disappointing performance");
INSERT INTO event_feedback (event_name, attendee_name, rating, feedback) VALUES ("Conference", "Olivia Taylor", 4, "Good variety of topics covered");
INSERT INTO event_feedback (event_name, attendee_name, rating, feedback) VALUES ("Music Festival", "James White", 3, "Crowded venue, but fun overall");
INSERT INTO event_feedback (event_name, attendee_name, rating, feedback) VALUES ("Conference", "Emma Green", 5, "Engaging speakers and interactive sessions");
