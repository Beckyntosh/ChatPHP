CREATE TABLE IF NOT EXISTS text_files (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
content LONGTEXT,
analysis LONGTEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO text_files (content, analysis) VALUES ('Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Analysis result 1');
INSERT INTO text_files (content, analysis) VALUES ('Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Analysis result 2');
INSERT INTO text_files (content, analysis) VALUES ('Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Analysis result 3');
INSERT INTO text_files (content, analysis) VALUES ('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'Analysis result 4');
INSERT INTO text_files (content, analysis) VALUES ('Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Analysis result 5');
INSERT INTO text_files (content, analysis) VALUES ('Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Analysis result 6');
INSERT INTO text_files (content, analysis) VALUES ('Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Analysis result 7');
INSERT INTO text_files (content, analysis) VALUES ('Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Analysis result 8');
INSERT INTO text_files (content, analysis) VALUES ('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'Analysis result 9');
INSERT INTO text_files (content, analysis) VALUES ('Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Analysis result 10');