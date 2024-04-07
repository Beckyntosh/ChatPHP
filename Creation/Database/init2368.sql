CREATE TABLE IF NOT EXISTS forum_users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP
);

INSERT INTO forum_users (username, email, password) VALUES ('john_doe', 'johndoe@example.com', 'password1');
INSERT INTO forum_users (username, email, password) VALUES ('jane_smith', 'janesmith@example.com', 'password2');
INSERT INTO forum_users (username, email, password) VALUES ('mike123', 'mike123@example.com', 'password3');
INSERT INTO forum_users (username, email, password) VALUES ('emily_g', 'emilyg@example.com', 'password4');
INSERT INTO forum_users (username, email, password) VALUES ('sam456', 'sam456@example.com', 'password5');
INSERT INTO forum_users (username, email, password) VALUES ('lisa_t', 'lisat@example.com', 'password6');
INSERT INTO forum_users (username, email, password) VALUES ('nick789', 'nick789@example.com', 'password7');
INSERT INTO forum_users (username, email, password) VALUES ('sara_m', 'saram@example.com', 'password8');
INSERT INTO forum_users (username, email, password) VALUES ('adam_d', 'adamd@example.com', 'password9');
INSERT INTO forum_users (username, email, password) VALUES ('kate11', 'kate11@example.com', 'password10');
