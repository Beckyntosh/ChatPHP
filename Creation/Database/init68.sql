CREATE TABLE IF NOT EXISTS legal_documents (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content LONGTEXT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO legal_documents (title, content, reg_date) VALUES ('Document 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', NOW());
INSERT INTO legal_documents (title, content, reg_date) VALUES ('Document 2', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NOW());
INSERT INTO legal_documents (title, content, reg_date) VALUES ('Document 3', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NOW());
INSERT INTO legal_documents (title, content, reg_date) VALUES ('Document 4', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', NOW());
INSERT INTO legal_documents (title, content, reg_date) VALUES ('Document 5', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NOW());
INSERT INTO legal_documents (title, content, reg_date) VALUES ('Document 6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', NOW());
INSERT INTO legal_documents (title, content, reg_date) VALUES ('Document 7', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NOW());
INSERT INTO legal_documents (title, content, reg_date) VALUES ('Document 8', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NOW());
INSERT INTO legal_documents (title, content, reg_date) VALUES ('Document 9', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', NOW());
INSERT INTO legal_documents (title, content, reg_date) VALUES ('Document 10', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NOW());
