CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(32),
    reg_date TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES ('john_doe', 'john.doe@example.com', 'password123');
INSERT INTO users (username, email, password) VALUES ('jane_smith', 'jane.smith@example.com', 'securepass');
INSERT INTO users (username, email, password) VALUES ('gardener123', 'gardener123@gmail.com', 'mysecretgarden');
INSERT INTO users (username, email, password) VALUES ('green_thumb', 'greenthumb@yahoo.com', 'greengrows');
INSERT INTO users (username, email, password) VALUES ('flowerlover', 'flowerpower@outlook.com', 'iloveflowers');
INSERT INTO users (username, email, password) VALUES ('plantwhisperer', 'plantwhisperer@example.com', 'speak2plants');
INSERT INTO users (username, email, password) VALUES ('gardenmaster', 'gmaster@gmail.com', 'masterofgardens');
INSERT INTO users (username, email, password) VALUES ('bloomer123', 'bloomer1234@hotmail.com', 'bloominglife');
INSERT INTO users (username, email, password) VALUES ('veggieguru', 'veggieguru@domain.com', 'veggieking');
INSERT INTO users (username, email, password) VALUES ('rosegarden', 'rose.garden@yahoo.com', 'rosepetals');
