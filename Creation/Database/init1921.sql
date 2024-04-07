CREATE TABLE IF NOT EXISTS review_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    creator_name VARCHAR(255) NOT NULL,
    feature_name VARCHAR(255) NOT NULL,
    code_text TEXT NOT NULL,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO review_table (creator_name, feature_name, code_text) VALUES ('Alice', 'Feature A', 'Sample code for Feature A');
INSERT INTO review_table (creator_name, feature_name, code_text) VALUES ('Bob', 'Feature B', 'Sample code for Feature B');
INSERT INTO review_table (creator_name, feature_name, code_text) VALUES ('Charlie', 'Feature C', 'Sample code for Feature C');
INSERT INTO review_table (creator_name, feature_name, code_text) VALUES ('David', 'Feature D', 'Sample code for Feature D');
INSERT INTO review_table (creator_name, feature_name, code_text) VALUES ('Eve', 'Feature E', 'Sample code for Feature E');
INSERT INTO review_table (creator_name, feature_name, code_text) VALUES ('Frank', 'Feature F', 'Sample code for Feature F');
INSERT INTO review_table (creator_name, feature_name, code_text) VALUES ('Grace', 'Feature G', 'Sample code for Feature G');
INSERT INTO review_table (creator_name, feature_name, code_text) VALUES ('Henry', 'Feature H', 'Sample code for Feature H');
INSERT INTO review_table (creator_name, feature_name, code_text) VALUES ('Ivy', 'Feature I', 'Sample code for Feature I');
INSERT INTO review_table (creator_name, feature_name, code_text) VALUES ('Jack', 'Feature J', 'Sample code for Feature J');

