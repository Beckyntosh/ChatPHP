CREATE TABLE IF NOT EXISTS HealthcareRatings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
providerName VARCHAR(50) NOT NULL,
rating INT(1),
review TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO HealthcareRatings (providerName, rating, review) VALUES ('Dr. Smith', 4, 'Great experience with Dr. Smith.');
INSERT INTO HealthcareRatings (providerName, rating, review) VALUES ('Clinic A', 5, 'Highly recommend Clinic A for their excellent service.');
INSERT INTO HealthcareRatings (providerName, rating, review) VALUES ('Dr. Johnson', 3, 'Average experience with Dr. Johnson.');
INSERT INTO HealthcareRatings (providerName, rating, review) VALUES ('Clinic B', 5, 'Outstanding care provided at Clinic B.');
INSERT INTO HealthcareRatings (providerName, rating, review) VALUES ('Dr. Brown', 2, 'Disappointed with the service from Dr. Brown.');
INSERT INTO HealthcareRatings (providerName, rating, review) VALUES ('Clinic C', 4, 'Good facility and staff at Clinic C.');
INSERT INTO HealthcareRatings (providerName, rating, review) VALUES ('Dr. Lee', 4, 'Happy with the treatment received from Dr. Lee.');
INSERT INTO HealthcareRatings (providerName, rating, review) VALUES ('Clinic D', 3, 'Satisfactory experience at Clinic D.');
INSERT INTO HealthcareRatings (providerName, rating, review) VALUES ('Dr. White', 5, 'Impressed with the expertise of Dr. White.');
INSERT INTO HealthcareRatings (providerName, rating, review) VALUES ('Clinic E', 4, 'Overall positive experience at Clinic E.');
