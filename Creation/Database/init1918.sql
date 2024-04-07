CREATE TABLE IF NOT EXISTS code_submissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    code TEXT NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO code_submissions (title, code) VALUES ('Feature X Review 1', 'Sample code 1');
INSERT INTO code_submissions (title, code) VALUES ('Feature Y Review', 'Sample code 2');
INSERT INTO code_submissions (title, code) VALUES ('Feature Z Review', 'Sample code 3');
INSERT INTO code_submissions (title, code) VALUES ('Feature A Review', 'Sample code 4');
INSERT INTO code_submissions (title, code) VALUES ('Feature B Review', 'Sample code 5');
INSERT INTO code_submissions (title, code) VALUES ('Feature C Review', 'Sample code 6');
INSERT INTO code_submissions (title, code) VALUES ('Feature D Review', 'Sample code 7');
INSERT INTO code_submissions (title, code) VALUES ('Feature E Review', 'Sample code 8');
INSERT INTO code_submissions (title, code) VALUES ('Feature F Review', 'Sample code 9');
INSERT INTO code_submissions (title, code) VALUES ('Feature G Review', 'Sample code 10');
