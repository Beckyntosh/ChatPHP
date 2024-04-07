CREATE TABLE IF NOT EXISTS code_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    code TEXT NOT NULL,
    status ENUM('submitted', 'reviewed') DEFAULT 'submitted',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO code_reviews (title, code, status) VALUES ('Feature A', 'function test() { console.log("Hello World!"); }', 'submitted');
INSERT INTO code_reviews (title, code, status) VALUES ('Feature B', 'echo "This is a test."; ', 'reviewed');
INSERT INTO code_reviews (title, code, status) VALUES ('Feature C', 'var x = 5; console.log(x);', 'submitted');
INSERT INTO code_reviews (title, code, status) VALUES ('Feature D', 'html <h1>Heading</h1>', 'submitted');
INSERT INTO code_reviews (title, code, status) VALUES ('Feature E', 'function add(a, b) { return a + b; }', 'reviewed');
INSERT INTO code_reviews (title, code, status) VALUES ('Feature F', 'print("Print statement");', 'submitted');
INSERT INTO code_reviews (title, code, status) VALUES ('Feature G', 'var y = "Hello"; console.log(y);', 'submitted');
INSERT INTO code_reviews (title, code, status) VALUES ('Feature H', 'echo "Another test."; ', 'reviewed');
INSERT INTO code_reviews (title, code, status) VALUES ('Feature I', 'const pi = 3.14; console.log(pi);', 'submitted');
INSERT INTO code_reviews (title, code, status) VALUES ('Feature J', 'document.write("Document Write");', 'submitted');
