CREATE TABLE IF NOT EXISTS event_feedback (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
event_name VARCHAR(255) NOT NULL,
attendee_name VARCHAR(255),
feedback TEXT,
reg_date TIMESTAMP
);

INSERT INTO event_feedback (event_name, attendee_name, feedback) VALUES ('Conference A', 'John Doe', 'Great conference, learned a lot');
INSERT INTO event_feedback (event_name, attendee_name, feedback) VALUES ('Conference A', 'Jane Smith', 'Well-organized event, enjoyed the speakers');
INSERT INTO event_feedback (event_name, attendee_name, feedback) VALUES ('Conference B', 'Michael Johnson', 'Informative sessions, good networking opportunities');
INSERT INTO event_feedback (event_name, attendee_name, feedback) VALUES ('Conference B', 'Sarah Lee', 'Would love to see more interactive sessions next time');
INSERT INTO event_feedback (event_name, attendee_name, feedback) VALUES ('Seminar X', 'Chris Brown', 'Excellent presentation, engaging speaker');
INSERT INTO event_feedback (event_name, attendee_name, feedback) VALUES ('Seminar X', 'Emily Davis', 'Interesting topic, would attend again');
INSERT INTO event_feedback (event_name, attendee_name, feedback) VALUES ('Workshop Z', 'Alex Robinson', 'Hands-on activities were very helpful');
INSERT INTO event_feedback (event_name, attendee_name, feedback) VALUES ('Workshop Z', 'Lisa White', 'Instructors were knowledgeable and approachable');
INSERT INTO event_feedback (event_name, attendee_name, feedback) VALUES ('Webinar Y', 'Matthew Taylor', 'Convenient way to learn, would recommend to others');
INSERT INTO event_feedback (event_name, attendee_name, feedback) VALUES ('Webinar Y', 'Olivia Martinez', 'Interactive Q&A session was a great addition');