CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    join_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    loyalty_member BOOLEAN NOT NULL DEFAULT FALSE
);

INSERT INTO users (username, password, email, loyalty_member) VALUES ('john_doe', 'password123', 'john.doe@example.com', 1);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('jane_smith', 'qwerty456', 'jane.smith@example.com', 0);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('bob_jones', 'pass321word', 'bob.jones@example.com', 1);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('mary_wilson', 'abc789xyz', 'mary.wilson@example.com', 0);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('sam_gray', 'sunshine456', 'sam.gray@example.com', 1);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('lisa_brown', 'ilovecoding', 'lisa.brown@example.com', 0);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('kevin_black', 'letmein123', 'kevin.black@example.com', 1);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('angela_green', 'mypassword321', 'angela.green@example.com', 0);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('david_white', 'securepass789', 'david.white@example.com', 1);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('susan_taylor', 'p@ssw0rd!', 'susan.taylor@example.com', 0);
