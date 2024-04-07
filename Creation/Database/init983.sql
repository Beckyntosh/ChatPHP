CREATE TABLE IF NOT EXISTS EventFeedback (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
event_name VARCHAR(255) NOT NULL,
attendee_name VARCHAR(255) NOT NULL,
rating INT(10),
feedback TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO EventFeedback (event_name, attendee_name, rating, feedback) VALUES ('Conference A', 'John Doe', 8, 'Great event overall');
INSERT INTO EventFeedback (event_name, attendee_name, rating, feedback) VALUES ('Concert B', 'Jane Smith', 9, 'Amazing performance');
INSERT INTO EventFeedback (event_name, attendee_name, rating, feedback) VALUES ('Conference C', 'Alice Brown', 7, 'Informative sessions');
INSERT INTO EventFeedback (event_name, attendee_name, rating, feedback) VALUES ('Concert D', 'Bob Johnson', 6, 'Sound quality could be better');
INSERT INTO EventFeedback (event_name, attendee_name, rating, feedback) VALUES ('Conference E', 'Eve White', 9, 'Best event I attended');
INSERT INTO EventFeedback (event_name, attendee_name, rating, feedback) VALUES ('Festival F', 'Sam Black', 8, 'Enjoyed the atmosphere');
INSERT INTO EventFeedback (event_name, attendee_name, rating, feedback) VALUES ('Conference G', 'Olivia Green', 7, 'Good networking opportunities');
INSERT INTO EventFeedback (event_name, attendee_name, rating, feedback) VALUES ('Concert H', 'Max Grey', 8, 'Band was fantastic');
INSERT INTO EventFeedback (event_name, attendee_name, rating, feedback) VALUES ('Festival I', 'Mia Red', 9, 'Memorable experience');
INSERT INTO EventFeedback (event_name, attendee_name, rating, feedback) VALUES ('Conference J', 'Leo Brown', 6, 'Some technical issues');
