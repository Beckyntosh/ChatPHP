CREATE TABLE IF NOT EXISTS event_feedback (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
event_name VARCHAR(100) NOT NULL,
attendee_email VARCHAR(50),
feedback TEXT,
reg_date TIMESTAMP
);

INSERT INTO event_feedback (event_name, attendee_email, feedback) VALUES ('Conference A', 'attendee1@example.com', 'Great conference overall, but could improve on speaker selection.');
INSERT INTO event_feedback (event_name, attendee_email, feedback) VALUES ('Seminar B', 'attendee2@example.com', 'Informative seminar, but room temperature was too cold.');
INSERT INTO event_feedback (event_name, attendee_email, feedback) VALUES ('Workshop C', 'attendee3@example.com', 'Interactive workshop, would love more hands-on activities.');
INSERT INTO event_feedback (event_name, attendee_email, feedback) VALUES ('Symposium D', 'attendee4@example.com', 'Diverse range of topics covered, very engaging discussions.');
INSERT INTO event_feedback (event_name, attendee_email, feedback) VALUES ('Training E', 'attendee5@example.com', 'Well-organized training session, but time management could be improved.');
INSERT INTO event_feedback (event_name, attendee_email, feedback) VALUES ('Festival F', 'attendee6@example.com', 'Fun festival, but food options were limited.');
INSERT INTO event_feedback (event_name, attendee_email, feedback) VALUES ('Exhibition G', 'attendee7@example.com', 'Interesting exhibits, but signage could be clearer.');
INSERT INTO event_feedback (event_name, attendee_email, feedback) VALUES ('Conference H', 'attendee8@example.com', 'Networking opportunities were great, but schedule was too packed.');
INSERT INTO event_feedback (event_name, attendee_email, feedback) VALUES ('Seminar I', 'attendee9@example.com', 'Educational seminar, would have liked more Q&A time.');
INSERT INTO event_feedback (event_name, attendee_email, feedback) VALUES ('Workshop J', 'attendee10@example.com', 'Engaging workshop, but venue was a bit noisy.');
