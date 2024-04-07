CREATE TABLE IF NOT EXISTS members (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO members (username, email, password) VALUES ('JohnDoe', 'johndoe@example.com', 'password1');
INSERT INTO members (username, email, password) VALUES ('AliceSmith', 'alice.smith@example.com', 'password2');
INSERT INTO members (username, email, password) VALUES ('BobJohnson', 'bob.johnson@example.com', 'password3');
INSERT INTO members (username, email, password) VALUES ('EmmaBrown', 'emma.brown@example.com', 'password4');
INSERT INTO members (username, email, password) VALUES ('MichaelLee', 'michael.lee@example.com', 'password5');
INSERT INTO members (username, email, password) VALUES ('SarahJones', 'sarah.jones@example.com', 'password6');
INSERT INTO members (username, email, password) VALUES ('RyanWilliams', 'ryan.williams@example.com', 'password7');
INSERT INTO members (username, email, password) VALUES ('OliviaDavis', 'olivia.davis@example.com', 'password8');
INSERT INTO members (username, email, password) VALUES ('JamesMartinez', 'james.martinez@example.com', 'password9');
INSERT INTO members (username, email, password) VALUES ('EllaGarcia', 'ella.garcia@example.com', 'password10');
