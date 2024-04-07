CREATE TABLE IF NOT EXISTS Pets (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
type VARCHAR(30) NOT NULL,
healthInfo TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Pets (name, type, healthInfo) VALUES ('Buddy', 'Dog', 'Vaccinated, regular check-ups');
INSERT INTO Pets (name, type, healthInfo) VALUES ('Fluffy', 'Cat', 'Indoor cat, loves treats');
INSERT INTO Pets (name, type, healthInfo) VALUES ('Rocky', 'Hamster', 'Likes to run on wheel');
INSERT INTO Pets (name, type, healthInfo) VALUES ('Lucy', 'Bird', 'Colorful feathers, chirps a lot');
INSERT INTO Pets (name, type, healthInfo) VALUES ('Max', 'Dog', 'Loves to play fetch');
INSERT INTO Pets (name, type, healthInfo) VALUES ('Whiskers', 'Cat', 'Likes to nap in sunlight');
INSERT INTO Pets (name, type, healthInfo) VALUES ('Snowball', 'Rabbit', 'Enjoys hopping around');
INSERT INTO Pets (name, type, healthInfo) VALUES ('Midnight', 'Snake', 'Non-venomous species');
INSERT INTO Pets (name, type, healthInfo) VALUES ('Oreo', 'Guinea Pig', 'Loves veggies and fruits');
INSERT INTO Pets (name, type, healthInfo) VALUES ('Luna', 'Dog', 'Friendly with children, needs regular walks');
