CREATE TABLE IF NOT EXISTS provider_ratings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    provider_name VARCHAR(50) NOT NULL,
    rating INT NOT NULL,
    review TEXT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO provider_ratings (provider_name, rating, review) VALUES ('Dr. Smith', 5, 'Great experience with the doctor');
INSERT INTO provider_ratings (provider_name, rating, review) VALUES ('Clinic A', 4, 'Friendly staff and efficient service');
INSERT INTO provider_ratings (provider_name, rating, review) VALUES ('Dr. Johnson', 3, 'Okay experience, room for improvement');
INSERT INTO provider_ratings (provider_name, rating, review) VALUES ('Clinic B', 5, 'Highly recommend, excellent care');
INSERT INTO provider_ratings (provider_name, rating, review) VALUES ('Dr. Brown', 2, 'Not satisfied with the treatment');
INSERT INTO provider_ratings (provider_name, rating, review) VALUES ('Clinic C', 4, 'Good overall service');
INSERT INTO provider_ratings (provider_name, rating, review) VALUES ('Dr. White', 5, 'Best doctor Ive ever had');
INSERT INTO provider_ratings (provider_name, rating, review) VALUES ('Clinic D', 3, 'Average experience, could be better');
INSERT INTO provider_ratings (provider_name, rating, review) VALUES ('Dr. Lee', 4, 'Professional and caring physician');
INSERT INTO provider_ratings (provider_name, rating, review) VALUES ('Clinic E', 5, 'Top-notch facility with excellent doctors');
