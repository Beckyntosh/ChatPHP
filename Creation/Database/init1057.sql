CREATE TABLE IF NOT EXISTS event_feedback (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
event_name VARCHAR(50) NOT NULL,
attendee_name VARCHAR(50),
feedback VARCHAR(1000),
submit_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO event_feedback (event_name, attendee_name, feedback) VALUES ('Conference', 'John Doe', 'Great event, learned a lot!');
INSERT INTO event_feedback (event_name, attendee_name, feedback) VALUES ('Workshop', 'Jane Smith', 'Interactive sessions and engaging speakers.');
INSERT INTO event_feedback (event_name, attendee_name, feedback) VALUES ('Seminar', 'Alice Johnson', 'Informative content and well-organized.');
INSERT INTO event_feedback (event_name, attendee_name, feedback) VALUES ('Webinar', 'Bob Brown', 'Easy to access and valuable insights.');
INSERT INTO event_feedback (event_name, attendee_name, feedback) VALUES ('Training', 'Emma Clark', 'Practical exercises were very helpful.');
INSERT INTO event_feedback (event_name, attendee_name, feedback) VALUES ('Symposium', 'Mark Wilson', 'Networking opportunities were fantastic.');
INSERT INTO event_feedback (event_name, attendee_name, feedback) VALUES ('Panel Discussion', 'Sarah Adams', 'Diverse perspectives and engaging discussions.');
INSERT INTO event_feedback (event_name, attendee_name, feedback) VALUES ('Exhibition', 'Michael Lee', 'Impressive showcase of products and services.');
INSERT INTO event_feedback (event_name, attendee_name, feedback) VALUES ('Meetup', 'Laura Taylor', 'Great way to connect with like-minded individuals.');
INSERT INTO event_feedback (event_name, attendee_name, feedback) VALUES ('Summit', 'Chris Roberts', 'Keynote speakers were inspiring and insightful.');