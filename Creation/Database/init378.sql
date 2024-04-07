CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    is_loyalty_member BOOLEAN DEFAULT FALSE,
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS loyalty_members (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    points INT(10) DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, password, is_loyalty_member) VALUES ('JohnDoe', 'password1', 1);
INSERT INTO users (username, password, is_loyalty_member) VALUES ('JaneSmith', 'password2', 0);
INSERT INTO users (username, password, is_loyalty_member) VALUES ('AliceJohnson', 'password3', 1);
INSERT INTO users (username, password, is_loyalty_member) VALUES ('BobBrown', 'password4', 0);
INSERT INTO users (username, password, is_loyalty_member) VALUES ('SarahLee', 'password5', 1);
INSERT INTO users (username, password, is_loyalty_member) VALUES ('MichaelNguyen', 'password6', 0);
INSERT INTO users (username, password, is_loyalty_member) VALUES ('EmilyGarcia', 'password7', 1);
INSERT INTO users (username, password, is_loyalty_member) VALUES ('DavidMartinez', 'password8', 0);
INSERT INTO users (username, password, is_loyalty_member) VALUES ('JessicaLopez', 'password9', 1);
INSERT INTO users (username, password, is_loyalty_member) VALUES ('RyanHall', 'password10', 0);
