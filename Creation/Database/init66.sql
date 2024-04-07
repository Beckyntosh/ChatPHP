CREATE TABLE IF NOT EXISTS legal_documents (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO legal_documents (title, content, reg_date) VALUES ('Document 1 Title', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', CURRENT_TIMESTAMP);
INSERT INTO legal_documents (title, content, reg_date) VALUES ('Document 2 Title', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', CURRENT_TIMESTAMP);
INSERT INTO legal_documents (title, content, reg_date) VALUES ('Document 3 Title', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', CURRENT_TIMESTAMP);
INSERT INTO legal_documents (title, content, reg_date) VALUES ('Document 4 Title', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', CURRENT_TIMESTAMP);
INSERT INTO legal_documents (title, content, reg_date) VALUES ('Document 5 Title', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', CURRENT_TIMESTAMP);
INSERT INTO legal_documents (title, content, reg_date) VALUES ('Document 6 Title', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', CURRENT_TIMESTAMP);
INSERT INTO legal_documents (title, content, reg_date) VALUES ('Document 7 Title', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', CURRENT_TIMESTAMP);
INSERT INTO legal_documents (title, content, reg_date) VALUES ('Document 8 Title', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', CURRENT_TIMESTAMP);
INSERT INTO legal_documents (title, content, reg_date) VALUES ('Document 9 Title', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', CURRENT_TIMESTAMP);
INSERT INTO legal_documents (title, content, reg_date) VALUES ('Document 10 Title', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', CURRENT_TIMESTAMP);
