CREATE TABLE IF NOT EXISTS code_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    creator_name VARCHAR(30) NOT NULL,
    feature_name VARCHAR(50),
    code TEXT NOT NULL,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO code_reviews (creator_name, feature_name, code) VALUES 
('John Doe', 'Feature A', 'function greet() {
    return "Hello, World!";
}'),
('Alice Smith', 'Feature B', 'function addNumbers(a, b) {
    return a + b;
}'),
('Bob Johnson', 'Feature C', 'function multiplyNumbers(a, b) {
    return a * b;
}'),
('Emily Brown', 'Feature D', 'function divideNumbers(a, b) {
    return a / b;
}'),
('Chris Lee', 'Feature E', 'function capitalizeString(str) {
    return str.toUpperCase();
}'),
('Ella Davis', 'Feature F', 'function reverseString(str) {
    return str.split("").reverse().join("");
}'),
('Mike Wilson', 'Feature G', 'function checkPalindrome(str) {
    return str === str.split("").reverse().join("");
}'),
('Sarah Jones', 'Feature H', 'function countWords(str) {
    return str.trim().split(/\s+/).length;
}'),
('David Brown', 'Feature I', 'function sumArray(arr) {
    return arr.reduce((a, b) => a + b, 0);
}'),
('Emma Taylor', 'Feature J', 'function isEqual(a, b) {
    return a === b;
}');
