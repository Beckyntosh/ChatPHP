CREATE TABLE IF NOT EXISTS pets (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
type VARCHAR(30) NOT NULL,
breed VARCHAR(50),
age INT(3),
health_info VARCHAR(255),
reg_date TIMESTAMP
);

INSERT INTO pets (name, type, breed, age, health_info) VALUES ('Buddy', 'Dog', 'Labrador', 3, 'Active and healthy');
INSERT INTO pets (name, type, breed, age, health_info) VALUES ('Whiskers', 'Cat', 'Persian', 5, 'Indoor cat, needs regular grooming');
INSERT INTO pets (name, type, breed, age, health_info) VALUES ('Rocky', 'Dog', 'German Shepherd', 6, 'Loves to run and play');
INSERT INTO pets (name, type, breed, age, health_info) VALUES ('Fluffy', 'Rabbit', 'Holland Lop', 2, 'Eats a lot of greens');
INSERT INTO pets (name, type, breed, age, health_info) VALUES ('Smokey', 'Cat', 'Siamese', 4, 'Very vocal and affectionate');
INSERT INTO pets (name, type, breed, age, health_info) VALUES ('Max', 'Dog', 'Golden Retriever', 8, 'Requires regular walks and grooming');
INSERT INTO pets (name, type, breed, age, health_info) VALUES ('Bella', 'Dog', 'Poodle', 1, 'Training in progress, leash trained');
INSERT INTO pets (name, type, breed, age, health_info) VALUES ('Simba', 'Cat', 'Maine Coon', 7, 'Indoor/outdoor cat, loves to climb trees');
INSERT INTO pets (name, type, breed, age, health_info) VALUES ('Luna', 'Dog', 'Siberian Husky', 4, 'Needs plenty of exercise and cool environment');
INSERT INTO pets (name, type, breed, age, health_info) VALUES ('Oliver', 'Cat', 'Tabby', 6, 'Likes to nap in sunny spots and chase toys');
