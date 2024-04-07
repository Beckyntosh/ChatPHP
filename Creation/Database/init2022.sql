CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    verification_code VARCHAR(255) NOT NULL,
    is_verified BOOLEAN DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username, email, password, verification_code) VALUES ('JohnDoe', 'johndoe@example.com', 'password123', 'abc123');
INSERT INTO users (username, email, password, verification_code) VALUES ('JaneSmith', 'janesmith@example.com', 'hello123', 'def456');
INSERT INTO users (username, email, password, verification_code) VALUES ('AliceJones', 'alicejones@example.com', 'qwerty', 'ghi789');
INSERT INTO users (username, email, password, verification_code) VALUES ('BobJohnson', 'bjohnson@example.com', 'pass1234', 'jkl012');
INSERT INTO users (username, email, password, verification_code) VALUES ('EmilyDavis', 'emilydavis@example.com', 'mypassword', 'mno345');
INSERT INTO users (username, email, password, verification_code) VALUES ('DavidBrown', 'dbrown@example.com', 'welcome123', 'pqr678');
INSERT INTO users (username, email, password, verification_code) VALUES ('SarahWilson', 'swilson@example.com', 'test12345', 'stu901');
INSERT INTO users (username, email, password, verification_code) VALUES ('MichaelClark', 'mclark@example.com', 'securepass', 'vwx234');
INSERT INTO users (username, email, password, verification_code) VALUES ('LauraAdams', 'ladams@example.com', 'p@ssw0rd', 'yza567');
INSERT INTO users (username, email, password, verification_code) VALUES ('KevinLee', 'klee@example.com', 'passwordabc', 'bcd890');
