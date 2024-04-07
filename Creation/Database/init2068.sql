-- init.sql

CREATE TABLE IF NOT EXISTS Pets (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    petName VARCHAR(30) NOT NULL,
    petType VARCHAR(30) NOT NULL,
    petBreed VARCHAR(50),
    petAge INT,
    healthInfo TEXT,
    reg_date TIMESTAMP
);

INSERT INTO Pets (petName, petType, petBreed, petAge, healthInfo) VALUES
('Buddy', 'Dog', 'Labrador Retriever', 5, 'Up to date on vaccinations'),
('Fluffy', 'Cat', 'Persian', 3, 'Needs regular grooming'),
('Max', 'Dog', 'German Shepherd', 7, 'Has hip dysplasia'),
('Bella', 'Cat', 'Siamese', 2, 'Loves playing with toys'),
('Rocky', 'Dog', 'Golden Retriever', 4, 'Enjoys long walks'),
('Mittens', 'Cat', 'Maine Coon', 8, 'Indoor cat, doesnt like outdoors'),
('Charlie', 'Dog', 'Poodle', 6, 'Allergic to certain foods'),
('Luna', 'Cat', 'Sphynx', 1, 'Requires regular skin care'),
('Duke', 'Dog', 'Bulldog', 9, 'Loves to sleep all day'),
('Oreo', 'Cat', 'Tabby', 5, 'Very playful and energetic');