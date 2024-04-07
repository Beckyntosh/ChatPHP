CREATE TABLE IF NOT EXISTS Pets (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        petName VARCHAR(30) NOT NULL,
        petType VARCHAR(30) NOT NULL,
        age INT(3),
        healthInfo TEXT,
        reg_date TIMESTAMP
    );

INSERT INTO Pets (petName, petType, age, healthInfo) VALUES ('Buddy', 'Dog', 5, 'Healthy and active');
INSERT INTO Pets (petName, petType, age, healthInfo) VALUES ('Whiskers', 'Cat', 3, 'Indoor cat, playful');
INSERT INTO Pets (petName, petType, age, healthInfo) VALUES ('Rocky', 'Hamster', 2, 'Enjoys running on wheel');
INSERT INTO Pets (petName, petType, age, healthInfo) VALUES ('Shadow', 'Parrot', 4, 'Loves to mimic sounds');
INSERT INTO Pets (petName, petType, age, healthInfo) VALUES ('Luna', 'Rabbit', 1, 'Litter trained and friendly');
INSERT INTO Pets (petName, petType, age, healthInfo) VALUES ('Simba', 'Lion', 7, 'King of the jungle');
INSERT INTO Pets (petName, petType, age, healthInfo) VALUES ('Max', 'Goldfish', 1, 'Swims gracefully');
INSERT INTO Pets (petName, petType, age, healthInfo) VALUES ('Milo', 'Guinea Pig', 3, 'Loves veggies and hay');
INSERT INTO Pets (petName, petType, age, healthInfo) VALUES ('Daisy', 'Horse', 10, 'Elegant and majestic');
INSERT INTO Pets (petName, petType, age, healthInfo) VALUES ('Coco', 'Snake', 5, 'Non-venomous, docile');
