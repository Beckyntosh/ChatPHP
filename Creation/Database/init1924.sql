CREATE TABLE IF NOT EXISTS code_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    code TEXT NOT NULL,
    review TEXT,
    reviewed_by VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO code_reviews (title, code) VALUES ('Feature A', 'function add(a, b) { return a + b; }');
INSERT INTO code_reviews (title, code) VALUES ('Feature B', 'function subtract(a, b) { return a - b; }');
INSERT INTO code_reviews (title, code) VALUES ('Feature C', 'function multiply(a, b) { return a * b; }');
INSERT INTO code_reviews (title, code) VALUES ('Feature D', 'function divide(a, b) { return a / b; }');
INSERT INTO code_reviews (title, code) VALUES ('Feature E', 'function power(a, b) { return Math.pow(a, b); }');
INSERT INTO code_reviews (title, code) VALUES ('Feature F', 'function squareRoot(a) { return Math.sqrt(a); }');
INSERT INTO code_reviews (title, code) VALUES ('Feature G', 'function absoluteValue(a) { return Math.abs(a); }');
INSERT INTO code_reviews (title, code) VALUES ('Feature H', 'function max(a, b) { return Math.max(a, b); }');
INSERT INTO code_reviews (title, code) VALUES ('Feature I', 'function min(a, b) { return Math.min(a, b); }');
INSERT INTO code_reviews (title, code) VALUES ('Feature J', 'function factorial(n) { if (n === 0) { return 1; } return n * factorial(n - 1); }');
