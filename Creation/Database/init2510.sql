CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
language VARCHAR(10),
reg_date TIMESTAMP
);

INSERT INTO users (username, email, language) VALUES ('JohnDoe', 'johndoe@example.com', 'English');
INSERT INTO users (username, email, language) VALUES ('JaneSmith', 'janesmith@example.com', 'French');
INSERT INTO users (username, email, language) VALUES ('MichaelBrown', 'michaelbrown@example.com', 'Spanish');
INSERT INTO users (username, email, language) VALUES ('MariaGarcia', 'mariagarcia@example.com', 'German');
INSERT INTO users (username, email, language) VALUES ('DavidWang', 'davidwang@example.com', 'Chinese');
INSERT INTO users (username, email, language) VALUES ('SophiaLee', 'sophialee@example.com', 'English');
INSERT INTO users (username, email, language) VALUES ('DanielNguyen', 'danielnguyen@example.com', 'French');
INSERT INTO users (username, email, language) VALUES ('EmmaMartinez', 'emmamartinez@example.com', 'Spanish');
INSERT INTO users (username, email, language) VALUES ('ChristopherLiu', 'christopherliu@example.com', 'German');
INSERT INTO users (username, email, language) VALUES ('OliviaGonzalez', 'oliviagonzalez@example.com', 'Chinese');
