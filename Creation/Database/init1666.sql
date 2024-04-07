CREATE TABLE IF NOT EXISTS LearningPath (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  createDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Course (
  id INT AUTO_INCREMENT PRIMARY KEY,
  path_id INT,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  FOREIGN KEY (path_id) REFERENCES LearningPath(id)
);

INSERT INTO LearningPath (title, description) VALUES ('Data Science', 'Learning path for Data Science enthusiasts');
INSERT INTO LearningPath (title, description) VALUES ('Machine Learning', 'Learning path for Machine Learning enthusiasts');
INSERT INTO LearningPath (title, description) VALUES ('Web Development', 'Learning path for Web Development skills');
INSERT INTO LearningPath (title, description) VALUES ('Cybersecurity', 'Learning path for Cybersecurity professionals');
INSERT INTO LearningPath (title, description) VALUES ('Digital Marketing', 'Learning path for Digital Marketing strategies');
INSERT INTO LearningPath (title, description) VALUES ('Graphic Design', 'Learning path for Graphic Design skills');
INSERT INTO LearningPath (title, description) VALUES ('Artificial Intelligence', 'Learning path for Artificial Intelligence technologies');
INSERT INTO LearningPath (title, description) VALUES ('Mobile App Development', 'Learning path for Mobile App Development practices');
INSERT INTO LearningPath (title, description) VALUES ('Cloud Computing', 'Learning path for Cloud Computing services');
INSERT INTO LearningPath (title, description) VALUES ('Blockchain', 'Learning path for Blockchain technologies');