CREATE TABLE IF NOT EXISTS UserProfile (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
favorite_jewelry VARCHAR(50),
newsletter_subscription TINYINT(1),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO UserProfile (firstname, lastname, email, favorite_jewelry, newsletter_subscription) VALUES ('John', 'Doe', 'john.doe@example.com', 'Gold Necklace', 1);
INSERT INTO UserProfile (firstname, lastname, email, favorite_jewelry, newsletter_subscription) VALUES ('Jane', 'Smith', 'jane.smith@example.com', 'Silver Earrings', 0);
INSERT INTO UserProfile (firstname, lastname, email, favorite_jewelry, newsletter_subscription) VALUES ('Mike', 'Johnson', 'mike.johnson@example.com', 'Diamond Ring', 1);
INSERT INTO UserProfile (firstname, lastname, email, favorite_jewelry, newsletter_subscription) VALUES ('Sarah', 'Williams', 'sarah.williams@example.com', 'Pearl Bracelet', 0);
INSERT INTO UserProfile (firstname, lastname, email, favorite_jewelry, newsletter_subscription) VALUES ('Chris', 'Brown', 'chris.brown@example.com', 'Gemstone Brooch', 1);
INSERT INTO UserProfile (firstname, lastname, email, favorite_jewelry, newsletter_subscription) VALUES ('Emily', 'Taylor', 'emily.taylor@example.com', 'Crystal Pendant', 0);
INSERT INTO UserProfile (firstname, lastname, email, favorite_jewelry, newsletter_subscription) VALUES ('Adam', 'Clark', 'adam.clark@example.com', 'Rose Gold Watch', 1);
INSERT INTO UserProfile (firstname, lastname, email, favorite_jewelry, newsletter_subscription) VALUES ('Laura', 'Martinez', 'laura.martinez@example.com', 'Platinum Necklace', 0);
INSERT INTO UserProfile (firstname, lastname, email, favorite_jewelry, newsletter_subscription) VALUES ('Peter', 'Garcia', 'peter.garcia@example.com', 'Sapphire Ring', 1);
INSERT INTO UserProfile (firstname, lastname, email, favorite_jewelry, newsletter_subscription) VALUES ('Megan', 'Lopez', 'megan.lopez@example.com', 'Crystal Earrings', 0);
