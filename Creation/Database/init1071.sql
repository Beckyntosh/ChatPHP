CREATE TABLE Providers (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Ratings (
id INT AUTO_INCREMENT PRIMARY KEY,
provider_id INT NOT NULL,
rating INT NOT NULL,
comment TEXT,
FOREIGN KEY (provider_id) REFERENCES Providers(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO Providers (name) VALUES ('Dr. Smith');
INSERT INTO Providers (name) VALUES ('Dr. Johnson');
INSERT INTO Providers (name) VALUES ('Dr. Williams');
INSERT INTO Providers (name) VALUES ('Dr. Brown');
INSERT INTO Providers (name) VALUES ('Dr. Lee');
INSERT INTO Providers (name) VALUES ('Dr. Garcia');
INSERT INTO Providers (name) VALUES ('Dr. Martinez');
INSERT INTO Providers (name) VALUES ('Dr. Robinson');
INSERT INTO Providers (name) VALUES ('Dr. Clark');
INSERT INTO Providers (name) VALUES ('Dr. Rodriguez');

INSERT INTO Ratings (provider_id, rating, comment) VALUES (1, 5, 'Excellent service, highly recommend');
INSERT INTO Ratings (provider_id, rating, comment) VALUES (2, 4, 'Good experience overall');
INSERT INTO Ratings (provider_id, rating, comment) VALUES (3, 3, 'Average care, room for improvement');
INSERT INTO Ratings (provider_id, rating, comment) VALUES (4, 2, 'Not satisfied with the treatment');
INSERT INTO Ratings (provider_id, rating, comment) VALUES (5, 5, 'Amazing doctor, very caring');
INSERT INTO Ratings (provider_id, rating, comment) VALUES (6, 4, 'Professional and knowledgeable');
INSERT INTO Ratings (provider_id, rating, comment) VALUES (7, 3, 'Could be more attentive to patient needs');
INSERT INTO Ratings (provider_id, rating, comment) VALUES (8, 2, 'Long wait times, mediocre service');
INSERT INTO Ratings (provider_id, rating, comment) VALUES (9, 5, 'Great bedside manner, made me feel comfortable');
INSERT INTO Ratings (provider_id, rating, comment) VALUES (10, 4, 'Helpful and understanding doctor');
