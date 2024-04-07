CREATE TABLE IF NOT EXISTS code_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    feature VARCHAR(255) NOT NULL,
    code TEXT NOT NULL,
    status VARCHAR(50) NOT NULL DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data
INSERT INTO code_reviews (feature, code, status) VALUES ('Feature X', 'Sample code 1', 'pending');
INSERT INTO code_reviews (feature, code, status) VALUES ('Feature Y', 'Sample code 2', 'pending');
INSERT INTO code_reviews (feature, code, status) VALUES ('Feature Z', 'Sample code 3', 'pending');
INSERT INTO code_reviews (feature, code, status) VALUES ('Feature A', 'Sample code 4', 'pending');
INSERT INTO code_reviews (feature, code, status) VALUES ('Feature B', 'Sample code 5', 'pending');
INSERT INTO code_reviews (feature, code, status) VALUES ('Feature C', 'Sample code 6', 'pending');
INSERT INTO code_reviews (feature, code, status) VALUES ('Feature D', 'Sample code 7', 'pending');
INSERT INTO code_reviews (feature, code, status) VALUES ('Feature E', 'Sample code 8', 'pending');
INSERT INTO code_reviews (feature, code, status) VALUES ('Feature F', 'Sample code 9', 'pending');
INSERT INTO code_reviews (feature, code, status) VALUES ('Feature G', 'Sample code 10', 'pending');
