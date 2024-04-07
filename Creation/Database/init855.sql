CREATE TABLE IF NOT EXISTS galleries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    gallery_id INT,
    filename VARCHAR(255),
    uploaded_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (gallery_id) REFERENCES galleries(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description TEXT,
    is_completed BOOLEAN DEFAULT FALSE
);

-- Insert values into tables
INSERT INTO galleries (title) VALUES ('Gallery 1');
INSERT INTO galleries (title) VALUES ('Gallery 2');
INSERT INTO galleries (title) VALUES ('Gallery 3');
INSERT INTO galleries (title) VALUES ('Gallery 4');
INSERT INTO galleries (title) VALUES ('Gallery 5');
INSERT INTO galleries (title) VALUES ('Gallery 6');
INSERT INTO galleries (title) VALUES ('Gallery 7');
INSERT INTO galleries (title) VALUES ('Gallery 8');
INSERT INTO galleries (title) VALUES ('Gallery 9');
INSERT INTO galleries (title) VALUES ('Gallery 10');
