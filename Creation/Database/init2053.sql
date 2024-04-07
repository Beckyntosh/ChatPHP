CREATE TABLE IF NOT EXISTS pets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    petName VARCHAR(255) NOT NULL,
    petType VARCHAR(50) NOT NULL,
    petBreed VARCHAR(50),
    healthInfo TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO pets (petName, petType, petBreed, healthInfo) VALUES ('Buddy', 'Dog', 'Golden Retriever', 'Active and healthy pup');
INSERT INTO pets (petName, petType, petBreed, healthInfo) VALUES ('Fluffy', 'Cat', 'Persian', 'Likes to sleep all day');
INSERT INTO pets (petName, petType, petBreed, healthInfo) VALUES ('Max', 'Dog', 'Labrador Retriever', 'Loves to play fetch');
INSERT INTO pets (petName, petType, petBreed, healthInfo) VALUES ('Whiskers', 'Cat', 'Siamese', 'Enjoys cuddling in the sun');
INSERT INTO pets (petName, petType, petBreed, healthInfo) VALUES ('Rocky', 'Dog', 'Bulldog', 'A bit lazy but loves treats');
INSERT INTO pets (petName, petType, petBreed, healthInfo) VALUES ('Mittens', 'Cat', 'Maine Coon', 'Adventurous and playful');
INSERT INTO pets (petName, petType, petBreed, healthInfo) VALUES ('Daisy', 'Dog', 'Dalmatian', 'Great at agility training');
INSERT INTO pets (petName, petType, petBreed, healthInfo) VALUES ('Oreo', 'Cat', 'Mixed Breed', 'Loves chasing laser pointers');
INSERT INTO pets (petName, petType, petBreed, healthInfo) VALUES ('Bella', 'Dog', 'Poodle', 'Hypoallergenic and friendly');
INSERT INTO pets (petName, petType, petBreed, healthInfo) VALUES ('Luna', 'Cat', 'Scottish Fold', 'Likes to be pampered');
