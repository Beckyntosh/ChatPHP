CREATE TABLE IF NOT EXISTS pets (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
health_info VARCHAR(255),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO pets (name, health_info) VALUES ('Buddy', 'Golden Retriever, Male, 3 years old, Vaccination up to date');
INSERT INTO pets (name, health_info) VALUES ('Max', 'Labrador Retriever, Female, 2 years old, Regular check-ups');
INSERT INTO pets (name, health_info) VALUES ('Charlie', 'German Shepherd, Male, 4 years old, Allergic to certain foods');
INSERT INTO pets (name, health_info) VALUES ('Bella', 'Poodle, Female, 5 years old, Dental health maintained');
INSERT INTO pets (name, health_info) VALUES ('Lucy', 'Beagle, Female, 1 year old, Energetic and playful');
INSERT INTO pets (name, health_info) VALUES ('Rex', 'Boxer, Male, 6 years old, Arthritis medication');
INSERT INTO pets (name, health_info) VALUES ('Luna', 'Husky, Female, 3 years old, Loves long walks');
INSERT INTO pets (name, health_info) VALUES ('Cooper', 'Dachshund, Male, 2 years old, Weight management required');
INSERT INTO pets (name, health_info) VALUES ('Molly', 'Shih Tzu, Female, 4 years old, Annual vaccinations due');
INSERT INTO pets (name, health_info) VALUES ('Rocky', 'Rottweiler, Male, 7 years old, Hip dysplasia monitoring');