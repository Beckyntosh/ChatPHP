CREATE TABLE IF NOT EXISTS Games (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  description TEXT,
  release_date DATE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  game_id INT(6) UNSIGNED,
  user VARCHAR(50),
  rating INT(1),
  review TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (game_id) REFERENCES Games(id)
);

INSERT INTO Games (name, description, release_date) VALUES 
("Game A", "Description for Game A", "2022-01-10"),
("Game B", "Description for Game B", "2022-01-15"),
("Game C", "Description for Game C", "2022-01-20"),
("Game D", "Description for Game D", "2022-01-25"),
("Game E", "Description for Game E", "2022-02-01"),
("Game F", "Description for Game F", "2022-02-05"),
("Game G", "Description for Game G", "2022-02-10"),
("Game H", "Description for Game H", "2022-02-15"),
("Game I", "Description for Game I", "2022-02-20"),
("Game J", "Description for Game J", "2022-02-25");
