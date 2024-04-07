CREATE TABLE IF NOT EXISTS code_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    code TEXT NOT NULL,
    status ENUM('pending', 'approved', 'rejected') NOT NULL DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO code_reviews (title, code, status) VALUES ('Feature A', 'function test() { console.log("Hello World"); }', 'pending');
INSERT INTO code_reviews (title, code, status) VALUES ('Feature B', 'for (let i = 0; i < 10; i++) { console.log(i); }', 'approved');
INSERT INTO code_reviews (title, code, status) VALUES ('Feature C', 'if (true) { console.log("True"); } else { console.log("False"); }', 'rejected');
INSERT INTO code_reviews (title, code, status) VALUES ('Feature D', 'const greeting = "Hello"; console.log(greeting);', 'pending');
INSERT INTO code_reviews (title, code, status) VALUES ('Feature E', 'let x = 5; let y = 10; console.log(x + y);', 'approved');
INSERT INTO code_reviews (title, code, status) VALUES ('Feature F', 'const PI = 3.14159; console.log("The value of PI is: " + PI);', 'pending');
INSERT INTO code_reviews (title, code, status) VALUES ('Feature G', 'const arr = [1, 2, 3]; console.log("Array length: " + arr.length);', 'approved');
INSERT INTO code_reviews (title, code, status) VALUES ('Feature H', 'let name = "Alice"; console.log("Hello, " + name);', 'pending');
INSERT INTO code_reviews (title, code, status) VALUES ('Feature I', 'const num = 7; console.log(num * 2);', 'rejected');
INSERT INTO code_reviews (title, code, status) VALUES ('Feature J', 'function multiply(a, b) { return a * b; } console.log(multiply(3, 4));', 'approved');
