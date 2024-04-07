CREATE TABLE users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  email VARCHAR(50) NOT NULL,
  qualification VARCHAR(50) NOT NULL,
  experience VARCHAR(50) NOT NULL
);

INSERT INTO users (name, email, qualification, experience) VALUES ('John Doe', 'johndoe@example.com', 'Bachelor\'s Degree', '3 years');
INSERT INTO users (name, email, qualification, experience) VALUES ('Jane Smith', 'janesmith@example.com', 'Master\'s Degree', '5 years');
INSERT INTO users (name, email, qualification, experience) VALUES ('Michael Johnson', 'michaeljohnson@example.com', 'PhD', '10 years');
INSERT INTO users (name, email, qualification, experience) VALUES ('Sarah Lee', 'sarahlee@example.com', 'Bachelor\'s Degree', '2 years');
INSERT INTO users (name, email, qualification, experience) VALUES ('Chris Brown', 'chrisbrown@example.com', 'Master\'s Degree', '4 years');
INSERT INTO users (name, email, qualification, experience) VALUES ('Emily Davis', 'emilydavis@example.com', 'PhD', '8 years');
INSERT INTO users (name, email, qualification, experience) VALUES ('Matthew Wilson', 'matthewwilson@example.com', 'Bachelor\'s Degree', '1 year');
INSERT INTO users (name, email, qualification, experience) VALUES ('Laura Garcia', 'lauragarcia@example.com', 'Master\'s Degree', '6 years');
INSERT INTO users (name, email, qualification, experience) VALUES ('Daniel Martinez', 'danielmartinez@example.com', 'PhD', '12 years');
INSERT INTO users (name, email, qualification, experience) VALUES ('Amanda Robinson', 'amandarobinson@example.com', 'Bachelor\'s Degree', '4 years');
