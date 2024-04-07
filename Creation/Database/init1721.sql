CREATE TABLE IF NOT EXISTS PetProfiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    petName VARCHAR(30) NOT NULL,
    petType VARCHAR(30) NOT NULL,
    petBreed VARCHAR(30) NOT NULL,
    healthInfo TEXT,
    reg_date TIMESTAMP
);

INSERT INTO PetProfiles (petName, petType, petBreed, healthInfo) VALUES
("Buddy", "Dog", "Golden Retriever", "Up to date with vaccinations and regular check-ups"),
("Whiskers", "Cat", "Siamese", "Indoor cat, very playful"),
("Max", "Dog", "Poodle", "On a special diet due to allergies"),
("Mittens", "Cat", "Maine Coon", "Loves chasing laser pointers"),
("Rocky", "Turtle", "Red-Eared Slider", "Requires regular clean water and basking area"),
("Bella", "Dog", "Labrador Retriever", "Enjoys swimming and long walks"),
("Simba", "Cat", "Persian", "Needs regular grooming and attention"),
("Charlie", "Dog", "Siberian Husky", "High energy, needs lots of exercise"),
("Luna", "Cat", "Bengal", "Loves climbing and exploring"),
("Daisy", "Dog", "Dachshund", "Great with kids, very playful");
