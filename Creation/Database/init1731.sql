CREATE TABLE IF NOT EXISTS pets (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(30) NOT NULL,
    pet_type VARCHAR(30) NOT NULL,
    health_info TEXT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO pets (pet_name, pet_type, health_info) VALUES ('Buddy', 'Dog', 'Healthy and active');
INSERT INTO pets (pet_name, pet_type, health_info) VALUES ('Whiskers', 'Cat', 'Vaccination due next month');
INSERT INTO pets (pet_name, pet_type, health_info) VALUES ('Charlie', 'Bird', 'Likes to sing and play');
INSERT INTO pets (pet_name, pet_type, health_info) VALUES ('Max', 'Dog', 'Needs daily walks and treats');
INSERT INTO pets (pet_name, pet_type, health_info) VALUES ('Smokey', 'Cat', 'Indoor cat, loves napping');
INSERT INTO pets (pet_name, pet_type, health_info) VALUES ('Rocky', 'Fish', 'Swims happily in the tank');
INSERT INTO pets (pet_name, pet_type, health_info) VALUES ('Luna', 'Dog', 'Likes to chase squirrels');
INSERT INTO pets (pet_name, pet_type, health_info) VALUES ('Mittens', 'Cat', 'Enjoys playing with toys');
INSERT INTO pets (pet_name, pet_type, health_info) VALUES ('Fluffy', 'Rabbit', 'Loves carrots and running around');
INSERT INTO pets (pet_name, pet_type, health_info) VALUES ('Oscar', 'Dog', 'Obedient and well-trained');
