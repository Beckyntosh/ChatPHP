CREATE TABLE IF NOT EXISTS Users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS LoyaltyProgram (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    loyalty_points INT(10) DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES Users(id)
);

INSERT INTO Users (name, email, password) VALUES ('John Doe', 'john@example.com', 'password123');
INSERT INTO Users (name, email, password) VALUES ('Jane Smith', 'jane@example.com', 'securepass');
INSERT INTO Users (name, email, password) VALUES ('Alice Johnson', 'alice@example.com', 'mypass123');
INSERT INTO Users (name, email, password) VALUES ('Bob Brown', 'bob@example.com', 'pass1234');
INSERT INTO Users (name, email, password) VALUES ('Eve White', 'eve@example.com', 'secretpass');

INSERT INTO LoyaltyProgram (user_id, loyalty_points) VALUES (1, 50);
INSERT INTO LoyaltyProgram (user_id, loyalty_points) VALUES (2, 100);
INSERT INTO LoyaltyProgram (user_id, loyalty_points) VALUES (3, 75);
INSERT INTO LoyaltyProgram (user_id, loyalty_points) VALUES (4, 200);
INSERT INTO LoyaltyProgram (user_id, loyalty_points) VALUES (5, 30);
