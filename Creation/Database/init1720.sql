CREATE TABLE IF NOT EXISTS pets (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
species VARCHAR(30) NOT NULL,
breed VARCHAR(50),
age INT(3),
health_info TEXT,
reg_date TIMESTAMP
);

INSERT INTO pets (name, species, breed, age, health_info) VALUES ('Buddy', 'Dog', 'Golden Retriever', 3, 'Healthy and active');
INSERT INTO pets (name, species, breed, age, health_info) VALUES ('Whiskers', 'Cat', 'Siamese', 2, 'Indoor cat with no health issues');
INSERT INTO pets (name, species, breed, age, health_info) VALUES ('Fluffy', 'Rabbit', 'Lionhead', 1, 'Regular vet check-ups, enjoys carrots');
INSERT INTO pets (name, species, breed, age, health_info) VALUES ('Sunny', 'Parrot', 'Sun Conure', 5, 'Loves to mimic sounds, good feather condition');
INSERT INTO pets (name, species, breed, age, health_info) VALUES ('Oreo', 'Hamster', 'Syrian', 1, 'Energetic and loves running in the wheel');
INSERT INTO pets (name, species, breed, age, health_info) VALUES ('Stripe', 'Snake', 'Corn Snake', 4, 'Eats frozen mice, sheds skin regularly');
INSERT INTO pets (name, species, breed, age, health_info) VALUES ('Nemo', 'Fish', 'Clownfish', 3, 'Colorful and active in the tank');
INSERT INTO pets (name, species, breed, age, health_info) VALUES ('Luna', 'Guinea Pig', 'Abyssinian', 2, 'Likes fresh veggies and hay, friendly personality');
INSERT INTO pets (name, species, breed, age, health_info) VALUES ('Shadow', 'Dog', 'Labrador Retriever', 4, 'Loyal companion with good health');
INSERT INTO pets (name, species, breed, age, health_info) VALUES ('Mittens', 'Cat', 'Maine Coon', 5, 'Big fluffy cat, loves to nap in the sun');
