CREATE TABLE IF NOT EXISTS volunteers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(50),
    age INT,
    skills TEXT,
    availability TEXT
);

INSERT INTO volunteers (name, email, age, skills, availability) 
VALUES ('John Doe', 'john@example.com', 25, 'Programming', 'Weekdays');
INSERT INTO volunteers (name, email, age, skills, availability) 
VALUES ('Jane Smith', 'jane@example.com', 30, 'Design', 'Weekends');
INSERT INTO volunteers (name, email, age, skills, availability) 
VALUES ('Alice Johnson', 'alice@example.com', 28, 'Writing', 'Evenings');
INSERT INTO volunteers (name, email, age, skills, availability) 
VALUES ('Bob Brown', 'bob@example.com', 35, 'Marketing', 'Flexible');
INSERT INTO volunteers (name, email, age, skills, availability) 
VALUES ('Sarah Wilson', 'sarah@example.com', 27, 'Public Speaking', 'Mornings');
INSERT INTO volunteers (name, email, age, skills, availability) 
VALUES ('Michael Lee', 'michael@example.com', 32, 'Sales', 'Afternoons');
INSERT INTO volunteers (name, email, age, skills, availability) 
VALUES ('Emily Taylor', 'emily@example.com', 22, 'Customer Service', 'Weekdays');
INSERT INTO volunteers (name, email, age, skills, availability) 
VALUES ('David Martinez', 'david@example.com', 29, 'Event Planning', 'Weekends');
INSERT INTO volunteers (name, email, age, skills, availability) 
VALUES ('Karen Rodriguez', 'karen@example.com', 31, 'Leadership', 'Flexible');
INSERT INTO volunteers (name, email, age, skills, availability) 
VALUES ('Mark Turner', 'mark@example.com', 26, 'Social Media', 'Evenings');