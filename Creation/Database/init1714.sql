CREATE TABLE IF NOT EXISTS pets (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
petName VARCHAR(30) NOT NULL,
petType VARCHAR(30) NOT NULL,
healthInfo TEXT,
reg_date TIMESTAMP
);

INSERT INTO pets (petName, petType, healthInfo) VALUES ('Buddy', 'Dog', 'Regular checkups required');
INSERT INTO pets (petName, petType, healthInfo) VALUES ('Whiskers', 'Cat', 'Allergic to certain foods');
INSERT INTO pets (petName, petType, healthInfo) VALUES ('Rocky', 'Turtle', 'Requires UV light for shell health');
INSERT INTO pets (petName, petType, healthInfo) VALUES ('Fluffy', 'Rabbit', 'Needs daily exercise and fresh vegetables');
INSERT INTO pets (petName, petType, healthInfo) VALUES ('Max', 'Dog', 'Has a heart condition, needs medication');
INSERT INTO pets (petName, petType, healthInfo) VALUES ('Nemo', 'Fish', 'Tank temperature should be maintained at 78°F');
INSERT INTO pets (petName, petType, healthInfo) VALUES ('Daisy', 'Hamster', 'Regular cage cleaning is essential');
INSERT INTO pets (petName, petType, healthInfo) VALUES ('Oreo', 'Guinea Pig', 'Fresh hay should be provided for eating and nesting');
INSERT INTO pets (petName, petType, healthInfo) VALUES ('Charlie', 'Parrot', 'Requires mental stimulation and social interaction');
INSERT INTO pets (petName, petType, healthInfo) VALUES ('Simba', 'Lion', 'King of the jungle, needs a spacious habitat');
