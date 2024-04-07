CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS episodes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_id INT,
    title VARCHAR(255),
    description TEXT,
    release_date DATE,
    FOREIGN KEY (project_id) REFERENCES projects(id)
);

INSERT INTO projects (title, description) VALUES ('Project 1', 'Description for Project 1');

INSERT INTO projects (title, description) VALUES ('Project 2', 'Description for Project 2');

INSERT INTO projects (title, description) VALUES ('Project 3', 'Description for Project 3');

INSERT INTO projects (title, description) VALUES ('Project 4', 'Description for Project 4');

INSERT INTO projects (title, description) VALUES ('Project 5', 'Description for Project 5');

INSERT INTO projects (title, description) VALUES ('Project 6', 'Description for Project 6');

INSERT INTO projects (title, description) VALUES ('Project 7', 'Description for Project 7');

INSERT INTO projects (title, description) VALUES ('Project 8', 'Description for Project 8');

INSERT INTO projects (title, description) VALUES ('Project 9', 'Description for Project 9');

INSERT INTO projects (title, description) VALUES ('Project 10', 'Description for Project 10');
