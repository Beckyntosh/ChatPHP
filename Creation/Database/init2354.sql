CREATE TABLE IF NOT EXISTS members (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO members (username, password, email) VALUES ('john_doe', '$2y$10$NL2sG2Kl9J/ieNq3Zz6jTe2idjvuyP5SP3ErqxvUCJg8Kgt3QBwie', 'john.doe@example.com');
INSERT INTO members (username, password, email) VALUES ('jane_smith', '$2y$10$wXXkyFAz5F8bKdb1.4Li2ulYmPX1w8hdpawJ9tJgJdHHBSkoJ/7sm', 'jane.smith@example.com');
INSERT INTO members (username, password, email) VALUES ('alice_carter', '$2y$10$97BfspiUcU2bZmq8dikkne9hXg5WvsQycuV3teVR/nProm5LtiAe2', 'alice.carter@example.com');
INSERT INTO members (username, password, email) VALUES ('bob_wilson', '$2y$10$JR/VztRg6ePbJj9Ue7cl0OV5pe45v4C47f18qLbiOjHP3Y/vMHMpW', 'bob.wilson@example.com');
INSERT INTO members (username, password, email) VALUES ('sara_jones', '$2y$10$Uqzg4dP8K9fQ4HHbInt2e.lXSdbR59/S3JjjW.R7taBW3Q8aKJi3u', 'sara.jones@example.com');
INSERT INTO members (username, password, email) VALUES ('michael_brown', '$2y$10$QZNiXZbFaza2cgaJZSyYCeg9wS1TIvdvu5JFPukWpZxDmT5TdNHe6', 'michael.brown@example.com');
INSERT INTO members (username, password, email) VALUES ('emily_davis', '$2y$10$UK4MREAIqth6wqFQ.Nkv8.WpZP/NKK.WByTDtbyrIWQ1DU0g1oVve', 'emily.davis@example.com');
INSERT INTO members (username, password, email) VALUES ('alex_clark', '$2y$10$4uOTwhNYzGBj2O9XWF/y/uD541yw893hs1MnTOfAzsLPlIuA8joJS', 'alex.clark@example.com');
INSERT INTO members (username, password, email) VALUES ('laura_roberts', '$2y$10$FU1HLn08Duy0v3eFMRR06uJmB1gAL7DYFmEgt9H9rWJNS5S5e6DR2', 'laura.roberts@example.com');
INSERT INTO members (username, password, email) VALUES ('kevin_adams', '$2y$10$JgZWm/mTm4Gq7cWAq/T2GO0PO/mi6dFunTTdkIyj6UVzaiy66.P8W', 'kevin.adams@example.com');
