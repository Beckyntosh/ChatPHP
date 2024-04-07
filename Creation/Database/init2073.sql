CREATE TABLE IF NOT EXISTS Pets (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
type VARCHAR(30) NOT NULL,
health_info TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Pets (name, type, health_info) VALUES ('Buddy', 'Dog', 'Regular checkups scheduled for Buddy');
INSERT INTO Pets (name, type, health_info) VALUES ('Fluffy', 'Cat', 'Allergic to certain foods');
INSERT INTO Pets (name, type, health_info) VALUES ('Max', 'Dog', 'Needs daily exercise');
INSERT INTO Pets (name, type, health_info) VALUES ('Snowball', 'Rabbit', 'Likes to hop around');
INSERT INTO Pets (name, type, health_info) VALUES ('Whiskers', 'Cat', 'Indoor cat, needs playtime');
INSERT INTO Pets (name, type, health_info) VALUES ('Rocky', 'Bird', 'Loves singing and music');
INSERT INTO Pets (name, type, health_info) VALUES ('Rex', 'Dog', 'Training in progress');
INSERT INTO Pets (name, type, health_info) VALUES ('Mittens', 'Cat', 'Loves cuddles and sleeping');
INSERT INTO Pets (name, type, health_info) VALUES ('Chirpy', 'Bird', 'Talkative and friendly');
INSERT INTO Pets (name, type, health_info) VALUES ('Spike', 'Dog', 'Guard dog, loyal and protective');
