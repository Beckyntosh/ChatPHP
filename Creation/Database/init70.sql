CREATE TABLE IF NOT EXISTS legal_documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
content TEXT NOT NULL,
upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO legal_documents (title, content) VALUES 
('Document 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
('Document 2', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('Document 3', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
('Document 4', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'),
('Document 5', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
('Document 6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
('Document 7', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('Document 8', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
('Document 9', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'),
('Document 10', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
