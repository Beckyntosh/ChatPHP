CREATE TABLE IF NOT EXISTS code_review_submissions (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  code TEXT NOT NULL,
  submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO code_review_submissions (filename, code) VALUES ('Feature_X_SourceCode', 'Sample code for Feature X review');
INSERT INTO code_review_submissions (filename, code) VALUES ('Update_Function_SourceCode', 'Sample code for function update review');
INSERT INTO code_review_submissions (filename, code) VALUES ('Bug_Fixes_SourceCode', 'Sample code for bug fixes review');
INSERT INTO code_review_submissions (filename, code) VALUES ('Feature_Y_SourceCode', 'Sample code for Feature Y review');
INSERT INTO code_review_submissions (filename, code) VALUES ('Refactoring_SourceCode', 'Sample code for refactoring review');
INSERT INTO code_review_submissions (filename, code) VALUES ('Performance_Optimization_SourceCode', 'Sample code for performance optimization review');
INSERT INTO code_review_submissions (filename, code) VALUES ('Security_Enhancements_SourceCode', 'Sample code for security enhancements review');
INSERT INTO code_review_submissions (filename, code) VALUES ('UI_Improvements_SourceCode', 'Sample code for UI improvements review');
INSERT INTO code_review_submissions (filename, code) VALUES ('Database_Optimization_SourceCode', 'Sample code for database optimization review');
INSERT INTO code_review_submissions (filename, code) VALUES ('Feature_Z_SourceCode', 'Sample code for Feature Z review');
