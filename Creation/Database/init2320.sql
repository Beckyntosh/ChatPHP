CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS events (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    event_name VARCHAR(255) NOT NULL,
    registration_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

INSERT INTO users (username, password) VALUES ('JohnDoe', 'password123');
INSERT INTO users (username, password) VALUES ('JaneSmith', 'password456');
INSERT INTO users (username, password) VALUES ('AliceClark', 'pass1234');
INSERT INTO users (username, password) VALUES ('BobJohnson', 'securepass');
INSERT INTO users (username, password) VALUES ('EvaGreen', 'mysecretpassword');
INSERT INTO users (username, password) VALUES ('MaxBrown', 'Brownie123');
INSERT INTO users (username, password) VALUES ('SarahLee', 'passwordxyz');
INSERT INTO users (username, password) VALUES ('DavidKing', 'letmein');
INSERT INTO users (username, password) VALUES ('OliviaPark', 'securepassword');
INSERT INTO users (username, password) VALUES ('MarkWhite', 'password1234');
