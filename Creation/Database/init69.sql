CREATE TABLE IF NOT EXISTS legal_docs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO legal_docs (title, content) VALUES ('Document 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
INSERT INTO legal_docs (title, content) VALUES ('Document 2', 'Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.');
INSERT INTO legal_docs (title, content) VALUES ('Document 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
INSERT INTO legal_docs (title, content) VALUES ('Document 4', 'Nunc ut tristique massa. Nam sodales mi vitae dolor.');
INSERT INTO legal_docs (title, content) VALUES ('Document 5', 'Vestibulum aliquam porta odio. Nulla facilisi.');

INSERT INTO legal_docs (title, content) VALUES ('Document 6', 'Sed non mi vitae eros malesuada lacinia.');
INSERT INTO legal_docs (title, content) VALUES ('Document 7', 'Vestibulum tincidunt augue vel libero. In consequat.');
INSERT INTO legal_docs (title, content) VALUES ('Document 8', 'Suspendisse potenti. Phasellus feugiat sem eu fermentum.');
INSERT INTO legal_docs (title, content) VALUES ('Document 9', 'Vivamus eget lacus. Nam bibendum euismod maximus.');
INSERT INTO legal_docs (title, content) VALUES ('Document 10', 'Donec tempus odio eget mauris feugiat.');
