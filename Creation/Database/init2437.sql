CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
camera_types VARCHAR(255),
brands VARCHAR(255),
FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, password, email) VALUES ('john_doe', 'password123', 'john.doe@example.com');
INSERT INTO preferences (user_id, camera_types, brands) VALUES (1, 'DSLR,Mirrorless', 'Canon,Nikon');

INSERT INTO users (username, password, email) VALUES ('jane_smith', 'pswd456', 'jane.smith@example.com');
INSERT INTO preferences (user_id, camera_types, brands) VALUES (2, 'Mirrorless,Compact', 'Sony,Nikon');

INSERT INTO users (username, password, email) VALUES ('alex_garcia', 'pass789', 'alex.garcia@example.com');
INSERT INTO preferences (user_id, camera_types, brands) VALUES (3, 'DSLR', 'Canon');

INSERT INTO users (username, password, email) VALUES ('sara_wilson', 'pass432', 'sara.wilson@example.com');
INSERT INTO preferences (user_id, camera_types, brands) VALUES (4, 'Compact', 'Sony');

INSERT INTO users (username, password, email) VALUES ('adam_brown', 'secure789', 'adam.brown@example.com');
INSERT INTO preferences (user_id, camera_types, brands) VALUES (5, 'DSLR,Mirrorless,Compact', 'Canon,Sony');

INSERT INTO users (username, password, email) VALUES ('olivia_perez', 'pwd456', 'olivia.perez@example.com');
INSERT INTO preferences (user_id, camera_types, brands) VALUES (6, 'Mirrorless', 'Sony');

INSERT INTO users (username, password, email) VALUES ('michael_cohen', 'password345', 'michael.cohen@example.com');
INSERT INTO preferences (user_id, camera_types, brands) VALUES (7, 'Compact', 'Nikon');

INSERT INTO users (username, password, email) VALUES ('emily_hernandez', 'pswd789', 'emily.hernandez@example.com');
INSERT INTO preferences (user_id, camera_types, brands) VALUES (8, 'DSLR,Mirrorless', 'Canon,Sony');

INSERT INTO users (username, password, email) VALUES ('carlos_gonzalez', 'secure123', 'carlos.gonzalez@example.com');
INSERT INTO preferences (user_id, camera_types, brands) VALUES (9, 'DSLR,Compact', 'Canon,Nikon');

INSERT INTO users (username, password, email) VALUES ('laura_miller', 'pswd789', 'laura.miller@example.com');
INSERT INTO preferences (user_id, camera_types, brands) VALUES (10, 'Mirrorless', 'Sony');