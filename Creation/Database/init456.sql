CREATE TABLE IF NOT EXISTS event_feedback (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  attendee_name VARCHAR(50) NOT NULL,
  event_name VARCHAR(100),
  rating INT(1),
  feedback VARCHAR(255),
  reg_date TIMESTAMP
);

INSERT INTO event_feedback (attendee_name, event_name, rating, feedback)
VALUES ('John Doe', 'Conference 2021', 4, 'Great event overall.'),
       ('Jane Smith', 'Workshop 2022', 5, 'Amazing workshop experience.'),
       ('Michael Johnson', 'Seminar 2021', 3, 'Could improve on time management.'),
       ('Sarah Adams', 'Webinar 2022', 5, 'Excellent content and speaker.'),
       ('Robert Brown', 'Training 2021', 2, 'Not satisfied with the organization.'),
       ('Lisa Davis', 'Conference 2022', 4, 'Enjoyed networking opportunities.'),
       ('Kevin White', 'Workshop 2021', 3, 'Informative but lacked interaction.'),
       ('Emily Wilson', 'Seminar 2022', 4, 'Engaging session with good insights.'),
       ('Ryan Martinez', 'Webinar 2021', 5, 'Perfectly delivered and structured.'),
       ('Amanda Garcia', 'Training 2022', 3, 'Average training material offered.');