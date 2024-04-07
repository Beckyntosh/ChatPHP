CREATE TABLE IF NOT EXISTS code_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    filename VARCHAR(255) NOT NULL, 
    code TEXT NOT NULL, 
    review TEXT, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO code_reviews (filename, code) VALUES ('file1.php', '<?php echo "Code for file 1"; ?>');
INSERT INTO code_reviews (filename, code) VALUES ('file2.js', 'console.log("Code for file 2");');
INSERT INTO code_reviews (filename, code) VALUES ('file3.py', 'print("Code for file 3")');
INSERT INTO code_reviews (filename, code) VALUES ('file4.rb', 'puts "Code for file 4"');
INSERT INTO code_reviews (filename, code) VALUES ('file5.java', 'System.out.println("Code for file 5");');
INSERT INTO code_reviews (filename, code) VALUES ('file6.html', '<html><body><h1>Code for file 6</h1></body></html>');
INSERT INTO code_reviews (filename, code) VALUES ('file7.css', 'body { background-color: lightblue; }');
INSERT INTO code_reviews (filename, code) VALUES ('file8.sql', 'SELECT * FROM table');
INSERT INTO code_reviews (filename, code) VALUES ('file9.lua', 'print("Code for file 9")');
INSERT INTO code_reviews (filename, code) VALUES ('file10.php', '<?php echo "Code for file 10"; ?>');
