CREATE TABLE IF NOT EXISTS code_reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
code TEXT NOT NULL,
review TEXT,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO code_reviews (title, code) VALUES ('Feature A', 'function add(a, b) { return a + b; }');
INSERT INTO code_reviews (title, code) VALUES ('Feature B', 'function subtract(a, b) { return a - b; }');
INSERT INTO code_reviews (title, code) VALUES ('Feature C', 'function multiply(a, b) { return a * b; }');
INSERT INTO code_reviews (title, code) VALUES ('Feature D', 'function divide(a, b) { return a / b; }');
INSERT INTO code_reviews (title, code) VALUES ('Feature E', 'function power(a, b) { return Math.pow(a, b); }');
INSERT INTO code_reviews (title, code) VALUES ('Feature F', 'function squareRoot(a) { return Math.sqrt(a); }');
INSERT INTO code_reviews (title, code) VALUES ('Feature G', 'function fibonacci(n) { return n <= 1 ? n : fibonacci(n - 1) + fibonacci(n - 2); }');
INSERT INTO code_reviews (title, code) VALUES ('Feature H', 'function factorial(n) { return n <= 1 ? 1 : n * factorial(n - 1); }');
INSERT INTO code_reviews (title, code) VALUES ('Feature I', 'function isPrime(n) { for (let i = 2; i <= Math.sqrt(n); i++) { if (n % i === 0) return false; } return n > 1; }');
INSERT INTO code_reviews (title, code) VALUES ('Feature J', 'function sumArray(arr) { return arr.reduce((acc, curr) => acc + curr, 0); }');
