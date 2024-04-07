CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  language VARCHAR(10) NOT NULL,
  reg_date TIMESTAMP
);

INSERT INTO users (username, email, language) VALUES ('JohnDoe', 'johndoe@example.com', 'en');
INSERT INTO users (username, email, language) VALUES ('JaneSmith', 'janesmith@example.com', 'es');
INSERT INTO users (username, email, language) VALUES ('AliceJohnson', 'alicejohnson@example.com', 'fr');
INSERT INTO users (username, email, language) VALUES ('BobBrown', 'bobbrown@example.com', 'en');
INSERT INTO users (username, email, language) VALUES ('MariaGarcia', 'mariagarcia@example.com', 'es');
INSERT INTO users (username, email, language) VALUES ('DavidLee', 'davidlee@example.com', 'fr');
INSERT INTO users (username, email, language) VALUES ('SarahClark', 'sarahclark@example.com', 'en');
INSERT INTO users (username, email, language) VALUES ('JamesNguyen', 'jamesnguyen@example.com', 'es');
INSERT INTO users (username, email, language) VALUES ('LauraMoore', 'lauramoore@example.com', 'fr');
INSERT INTO users (username, email, language) VALUES ('MichaelMartinez', 'michaelmartinez@example.com', 'en');