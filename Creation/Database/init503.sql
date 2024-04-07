CREATE TABLE IF NOT EXISTS Documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
signature VARCHAR(255) NOT NULL,
upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Documents (filename, signature) VALUES ('document1.pdf', 'a2e33f3ae0d7cbf3bebeccd5379beb75');
INSERT INTO Documents (filename, signature) VALUES ('document2.docx', 'f0a11b951a587921e5f2f07ade05ecba');
INSERT INTO Documents (filename, signature) VALUES ('document3.txt', '453ab6712d00a32c811745fca7dd3741');
INSERT INTO Documents (filename, signature) VALUES ('document4.jpg', '7d22c9daed0ac2f9a6bfc31ae7506056');
INSERT INTO Documents (filename, signature) VALUES ('document5.png', '8cb1e98a12c448b55c589b7c39034e21');
INSERT INTO Documents (filename, signature) VALUES ('document6.xlsx', '5aaa5a8533fc98b92bbc0d95163c4c62');
INSERT INTO Documents (filename, signature) VALUES ('document7.pptx', 'f92c11bec0a68ed3f64b1aedc19d5243');
INSERT INTO Documents (filename, signature) VALUES ('document8.csv', 'e1b08bd3dbeb79e3af87f8dc1a3e308c');
INSERT INTO Documents (filename, signature) VALUES ('document9.rar', 'e3f464c52fa457d73418cc8ad8fdf7c2');
INSERT INTO Documents (filename, signature) VALUES ('document10.zip', '24b32f559b78c935f6d1f0ff489553e1');
