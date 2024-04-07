CREATE TABLE IF NOT EXISTS courses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
course_name VARCHAR(255) NOT NULL,
registration_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS feedback (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
course_id INT(6) UNSIGNED,
feedback_text TEXT NOT NULL,
rating INT(1),
FOREIGN KEY (course_id) REFERENCES courses(id),
submission_date TIMESTAMP
);

INSERT INTO courses (course_name, registration_date) VALUES ('Introduction to Beauty Products', '2022-01-01');
INSERT INTO courses (course_name, registration_date) VALUES ('Advanced Makeup Techniques', '2022-02-15');
INSERT INTO courses (course_name, registration_date) VALUES ('Skincare Essentials', '2022-03-10');
INSERT INTO courses (course_name, registration_date) VALUES ('Hair Styling Mastery', '2022-04-20');
INSERT INTO courses (course_name, registration_date) VALUES ('Nail Art Workshop', '2022-05-05');
INSERT INTO courses (course_name, registration_date) VALUES ('Fashion Trends Analysis', '2022-06-30');
INSERT INTO courses (course_name, registration_date) VALUES ('Wellness and Beauty Balance', '2022-07-12');
INSERT INTO courses (course_name, registration_date) VALUES ('Beauty Product Marketing Strategies', '2022-08-25');
INSERT INTO courses (course_name, registration_date) VALUES ('Celebrities Beauty Secrets Revealed', '2022-09-18');
INSERT INTO courses (course_name, registration_date) VALUES ('DIY Beauty Recipes', '2022-10-03');

