CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(60) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (username, password)
VALUES ('john_doe', 'password123'),
       ('jane_smith', 'securepass'),
       ('bob_jones', 'pass1234'),
       ('alice_wilson', 'abcde4321'),
       ('sam_thompson', 'p@ssw0rd'),
       ('lisa_parker', 'password789'),
       ('kevin_adams', 'securepass567'),
       ('natalie_green', 'p@ssword!'),
       ('michael_brown', 'passw0rd!'),
       ('sophia_hill', 'securepassw0rd');
