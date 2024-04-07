CREATE TABLE IF NOT EXISTS PetProfiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
petName VARCHAR(30) NOT NULL,
petType VARCHAR(30) NOT NULL,
healthInfo TEXT,
reg_date TIMESTAMP
);

INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES
("Buddy", "Dog", "Likes to play fetch in the park"),
("Fluffy", "Cat", "Enjoys sleeping in sunny spots"),
("Max", "Dog", "Needs daily walks and plenty of exercise"),
("Whiskers", "Cat", "Loves chasing laser pointers"),
("Rocky", "Turtle", "Requires a basking spot to stay warm"),
("Coco", "Rabbit", "Enjoys chewing on fresh vegetables"),
("Oreo", "Guinea Pig", "Needs a constant supply of hay"),
("Sunny", "Parrot", "Talkative and loves to mimic sounds"),
("Bella", "Hamster", "Likes running on exercise wheel"),
("Shadow", "Fish", "Needs a well-maintained tank environment");
