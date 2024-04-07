CREATE TABLE IF NOT EXISTS Users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  password VARCHAR(50) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Preferences (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT(6) UNSIGNED,
  preference_type VARCHAR(50) NOT NULL,
  FOREIGN KEY (user_id) REFERENCES Users(id) ON DELETE CASCADE
);

INSERT INTO Users (username, password, email) VALUES ('JohnDoe', 'password123', 'johndoe@example.com');
INSERT INTO Users (username, password, email) VALUES ('JaneSmith', 'hello456', 'janesmith@example.com');
INSERT INTO Users (username, password, email) VALUES ('ArtLover', 'artpass', 'artlover@example.com');

INSERT INTO Preferences (user_id, preference_type) VALUES (1, 'Painting');
INSERT INTO Preferences (user_id, preference_type) VALUES (1, 'Drawing');
INSERT INTO Preferences (user_id, preference_type) VALUES (2, 'Sculpture');
INSERT INTO Preferences (user_id, preference_type) VALUES (3, 'Photography');
INSERT INTO Preferences (user_id, preference_type) VALUES (3, 'Drawing');
INSERT INTO Preferences (user_id, preference_type) VALUES (3, 'Painting');
INSERT INTO Preferences (user_id, preference_type) VALUES (3, 'Sculpture');
INSERT INTO Preferences (user_id, preference_type) VALUES (3, 'Photography');
INSERT INTO Preferences (user_id, preference_type) VALUES (3, 'Painting');
INSERT INTO Preferences (user_id, preference_type) VALUES (3, 'Drawing');
