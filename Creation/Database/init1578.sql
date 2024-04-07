CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    status ENUM('active', 'deactivated') DEFAULT 'active',
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (username, email, status) VALUES ('JohnDoe', 'johndoe@example.com', 'active');
INSERT INTO users (username, email, status) VALUES ('JaneSmith', 'janesmith@example.com', 'active');
INSERT INTO users (username, email, status) VALUES ('RobertJohnson', 'robertjohnson@example.com', 'deactivated');
INSERT INTO users (username, email, status) VALUES ('EmilyBrown', 'emilybrown@example.com', 'deactivated');
INSERT INTO users (username, email, status) VALUES ('MichaelDavis', 'michaeldavis@example.com', 'active');
INSERT INTO users (username, email, status) VALUES ('SarahWilson', 'sarahwilson@example.com', 'deactivated');
INSERT INTO users (username, email, status) VALUES ('DavidMartinez', 'davidmartinez@example.com', 'active');
INSERT INTO users (username, email, status) VALUES ('LauraGarcia', 'lauragarcia@example.com', 'active');
INSERT INTO users (username, email, status) VALUES ('KevinJones', 'kevinjones@example.com', 'deactivated');
INSERT INTO users (username, email, status) VALUES ('AmandaThomas', 'amandathomas@example.com', 'active');