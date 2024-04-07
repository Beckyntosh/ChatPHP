CREATE TABLE IF NOT EXISTS documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
signature TEXT NOT NULL,
verified BOOLEAN DEFAULT FALSE,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO documents (filename, signature) VALUES ('document1.pdf', 'JDJhJDEwJDVzaG43RGRYQWJKd1k2RmptRFZwM0VVL0kvbFc0Q2ZDRkEucDZBb3JKYTg0N2lYdjF2dUsy'); 
INSERT INTO documents (filename, signature) VALUES ('document2.txt', 'JDJhJDEwJFRnTG9XRU5UT21uelRRUHpDeWY1OUtiRjh1TFd4cFZvQzlLeTVrMi9Rd3JtOHpmMW1yL0FD'); 
INSERT INTO documents (filename, signature) VALUES ('document3.docx', 'JDJhJDEwJE52YjdvWjJqeW9GRFlBS1c0M3M1Rm9CS3BMMzdNbGM4YlZqVStxRjc5ZjduT0t6VEpqZmd3');
INSERT INTO documents (filename, signature) VALUES ('document4.pdf', 'JDJhJDEwJHdTa1BqVm9uNlh1V3ovUHdhRXdKdkI1VWpCTTZmL3lxQkxRbmFjaEZQcmJHRi9yYmpHRVBv'); 
INSERT INTO documents (filename, signature) VALUES ('document5.docx', 'JDJhJDEwJDhBanNtSHE4UFEzR3hhL3FFVEVKaG1rSkVtWFIxTW1wYzVtYnM4ZzNTbkVJSVBwR0hVcHJz'); 
INSERT INTO documents (filename, signature) VALUES ('document6.pdf', 'JDJhJDEwJGd0U0RKVXlWZVhtU0lRODhHeC9ZdTRyV29JVkdzSTQxREhaNkx5UEJvZXFLVU1FZVN4WHJD');
INSERT INTO documents (filename, signature) VALUES ('document7.docx', 'JDJhJDEwJGxDbE1UV3F1NXd3OFpuMmpJUzlCdWRqdlFuZ0hHVkg1ZTc0bG9oNmJHTmZtSG5hZDU0ekdI'); 
INSERT INTO documents (filename, signature) VALUES ('document8.pdf', 'JDJhJDEwJHJLWEhQMHdYTHlGWTFtdzZISWFpQjhqVlNFRFJIMEJYV0d6VXh1amRIanQyY0VQdkFUbXBR');
INSERT INTO documents (filename, signature) VALUES ('document9.txt', 'JDJhJDEwJExLQnVnU1dHdGtGZVNGQXIvL3BubHdaMlJJYmVnU1B1SDZ6b3RoSGlpbUJvTlF5VGpkZ3Fx');
INSERT INTO documents (filename, signature) VALUES ('document10.pdf', 'JDJhJDEwJHR5NXc3Y0xDYVFUeUw5SW5rTG9sdFRSc1JKNW9xYktZTzEwWXdIS3ZQd29wRjBLYjBpY2VZ');