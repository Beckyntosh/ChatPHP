CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  language VARCHAR(10) NOT NULL,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (username, language) VALUES ('JohnDoe', 'English');
INSERT INTO users (username, language) VALUES ('JaneDoe', 'Spanish');
INSERT INTO users (username, language) VALUES ('AliceSmith', 'French');
INSERT INTO users (username, language) VALUES ('BobJohnson', 'German');
INSERT INTO users (username, language) VALUES ('EvaBrown', 'English');
INSERT INTO users (username, language) VALUES ('MaxKlein', 'Spanish');
INSERT INTO users (username, language) VALUES ('SophieMüller', 'French');
INSERT INTO users (username, language) VALUES ('TomSchmidt', 'German');
INSERT INTO users (username, language) VALUES ('LauraWolf', 'English');
INSERT INTO users (username, language) VALUES ('ChrisBauer', 'Spanish');
