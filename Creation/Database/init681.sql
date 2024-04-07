CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    text TEXT NOT NULL,
    productId INT NOT NULL
);

INSERT INTO reviews (name, text, productId) VALUES ('John Doe', 'This game is awesome!', 1);
INSERT INTO reviews (name, text, productId) VALUES ('Jane Smith', 'Great graphics and gameplay', 2);
INSERT INTO reviews (name, text, productId) VALUES ('Mike Johnson', 'Highly recommend this game', 3);
INSERT INTO reviews (name, text, productId) VALUES ('Sarah Parker', 'Addictive gameplay', 1);
INSERT INTO reviews (name, text, productId) VALUES ('Chris Brown', 'Best game Ive played in years', 2);
INSERT INTO reviews (name, text, productId) VALUES ('Emily White', 'Good value for money', 3);
INSERT INTO reviews (name, text, productId) VALUES ('Alex Green', 'Fun for the whole family', 1);
INSERT INTO reviews (name, text, productId) VALUES ('Megan Gray', 'Must buy for any gamer', 2);
INSERT INTO reviews (name, text, productId) VALUES ('Ryan Adams', 'Cant stop playing it!', 3);
INSERT INTO reviews (name, text, productId) VALUES ('Amanda Reed', 'Excellent customer service', 1);
