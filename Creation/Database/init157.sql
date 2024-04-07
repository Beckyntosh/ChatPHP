CREATE TABLE IF NOT EXISTS language_modules (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO language_modules (title, description) VALUES 
("Module 1", "Description 1"),
("Module 2", "Description 2"),
("Module 3", "Description 3"),
("Module 4", "Description 4"),
("Module 5", "Description 5"),
("Module 6", "Description 6"),
("Module 7", "Description 7"),
("Module 8", "Description 8"),
("Module 9", "Description 9"),
("Module 10", "Description 10");
