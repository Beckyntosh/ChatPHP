CREATE TABLE IF NOT EXISTS uploaded_texts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    content TEXT NOT NULL,
    summary TEXT
);

INSERT INTO uploaded_texts (content, summary) VALUES ("Lorem ipsum dolor sit amet, consectetur adipiscing elit.", "This is a test summary 1.");
INSERT INTO uploaded_texts (content, summary) VALUES ("Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "This is a test summary 2.");
INSERT INTO uploaded_texts (content, summary) VALUES ("Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.", "This is a test summary 3.");
INSERT INTO uploaded_texts (content, summary) VALUES ("Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.", "This is a test summary 4.");
INSERT INTO uploaded_texts (content, summary) VALUES ("Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", "This is a test summary 5.");
INSERT INTO uploaded_texts (content, summary) VALUES ("Fusce interdum tortor ut lacus euismod, eget porttitor nibh dignissim.", "This is a test summary 6.");
INSERT INTO uploaded_texts (content, summary) VALUES ("Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.", "This is a test summary 7.");
INSERT INTO uploaded_texts (content, summary) VALUES ("Vestibulum sit amet dui scelerisque, varius massa ac, interdum justo.", "This is a test summary 8.");
INSERT INTO uploaded_texts (content, summary) VALUES ("Aliquam at metus rhoncus, ultricies purus vel, rutrum felis.", "This is a test summary 9.");
INSERT INTO uploaded_texts (content, summary) VALUES ("Cras eu diam malesuada, porta justo vel, lacinia lorem.", "This is a test summary 10.");
