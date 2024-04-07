CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES
("john_doe", "john.doe@example.com", "password123"),
("jane_smith", "jane.smith@example.com", "qwerty"),
("michael_jackson", "michael.jackson@example.com", "mjkingofpop"),
("sara_adams", "sara.adams@example.com", "sara123"),
("alex_watson", "alex.watson@example.com", "password123"),
("lisa_brown", "lisa.brown@example.com", "lisabrown123"),
("david_miller", "david.miller@example.com", "miller345"),
("sophia_clark", "sophia.clark@example.com", "sophia456"),
("william_turner", "william.turner@example.com", "turner789"),
("olivia_jones", "olivia.jones@example.com", "olivia902");