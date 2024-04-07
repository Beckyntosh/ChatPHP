CREATE TABLE IF NOT EXISTS code_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    code TEXT NOT NULL,
    status ENUM('pending', 'reviewed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS comments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    review_id INT(6) UNSIGNED,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (review_id) REFERENCES code_reviews(id)
);


INSERT INTO code_reviews (title, description, code, status, created_at) VALUES ('Review 1', 'Description 1', 'Code 1', 'reviewed', NOW());
INSERT INTO code_reviews (title, description, code, status, created_at) VALUES ('Review 2', 'Description 2', 'Code 2', 'pending', NOW());
INSERT INTO code_reviews (title, description, code, status, created_at) VALUES ('Review 3', 'Description 3', 'Code 3', 'pending', NOW());
INSERT INTO code_reviews (title, description, code, status, created_at) VALUES ('Review 4', 'Description 4', 'Code 4', 'reviewed', NOW());
INSERT INTO code_reviews (title, description, code, status, created_at) VALUES ('Review 5', 'Description 5', 'Code 5', 'pending', NOW());
INSERT INTO code_reviews (title, description, code, status, created_at) VALUES ('Review 6', 'Description 6', 'Code 6', 'reviewed', NOW());
INSERT INTO code_reviews (title, description, code, status, created_at) VALUES ('Review 7', 'Description 7', 'Code 7', 'pending', NOW());
INSERT INTO code_reviews (title, description, code, status, created_at) VALUES ('Review 8', 'Description 8', 'Code 8', 'reviewed', NOW());
INSERT INTO code_reviews (title, description, code, status, created_at) VALUES ('Review 9', 'Description 9', 'Code 9', 'reviewed', NOW());
INSERT INTO code_reviews (title, description, code, status, created_at) VALUES ('Review 10', 'Description 10', 'Code 10', 'pending', NOW());