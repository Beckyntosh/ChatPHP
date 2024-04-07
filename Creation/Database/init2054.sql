CREATE TABLE IF NOT EXISTS PetProfiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
species VARCHAR(30) NOT NULL,
breed VARCHAR(30),
age INT(3),
health_info TEXT,
reg_date TIMESTAMP
);

INSERT INTO PetProfiles (name, species, breed, age, health_info)
VALUES ('Buddy', 'Dog', 'Labrador Retriever', 5, 'Up to date on vaccinations and flea prevention.');

INSERT INTO PetProfiles (name, species, breed, age, health_info)
VALUES ('Whiskers', 'Cat', 'Siamese', 3, 'Strictly indoors, fed with premium cat food.');

INSERT INTO PetProfiles (name, species, breed, age, health_info)
VALUES ('Rocky', 'Dog', 'German Shepherd', 2, 'Loves long walks and playing fetch.');

INSERT INTO PetProfiles (name, species, breed, age, health_info)
VALUES ('Simba', 'Cat', 'Maine Coon', 4, 'Enjoys catnip toys and lounging in the sun.');

INSERT INTO PetProfiles (name, species, breed, age, health_info)
VALUES ('Oreo', 'Dog', 'Miniature Poodle', 7, 'Has allergies, requires special diet and medication.');

INSERT INTO PetProfiles (name, species, breed, age, health_info)
VALUES ('Smokey', 'Cat', 'Persian', 5, 'Needs regular grooming due to long fur.');

INSERT INTO PetProfiles (name, species, breed, age, health_info)
VALUES ('Luna', 'Dog', 'Siberian Husky', 1, 'High energy, needs daily exercise.');

INSERT INTO PetProfiles (name, species, breed, age, health_info)
VALUES ('Mittens', 'Cat', 'British Shorthair', 6, 'Indoor lifestyle, prefers cozy cat beds.');

INSERT INTO PetProfiles (name, species, breed, age, health_info)
VALUES ('Max', 'Dog', 'Golden Retriever', 4, 'Friendly and sociable, loves meeting new people.');

INSERT INTO PetProfiles (name, species, breed, age, health_info)
VALUES ('Lucky', 'Cat', 'American Shorthair', 8, 'Loves canned tuna as a treat.');
