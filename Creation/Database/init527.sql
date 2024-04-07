CREATE TABLE IF NOT EXISTS user_tokens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    token VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO user_tokens (user_id, token) VALUES (1, 'VGhpcyBpcyBhbiBlbmNyeXB0aW9uIGtleQ==');
INSERT INTO user_tokens (user_id, token) VALUES (1, 'dGhpcyBpcyBhIHNlY3VyZSB0b2tlbg==');
INSERT INTO user_tokens (user_id, token) VALUES (1, 'dGhpcyBpcyBhIG5vdGUgZXhjZWxzZW50ZWQgdG9rZW4=');
INSERT INTO user_tokens (user_id, token) VALUES (1, 'dGhpcyBpcyBhIG1hbmFnZW1lbnQgdG9rZW4=');
INSERT INTO user_tokens (user_id, token) VALUES (1, 'dGhpcyBpcyBhIGxlYXZlIGV4aXN0ZW50IHRva2Vu');
INSERT INTO user_tokens (user_id, token) VALUES (1, 'dGhpcyBpcyBhIGZlbWFsZSB0b2tlbg==');
INSERT INTO user_tokens (user_id, token) VALUES (1, 'dGhpcyBpcyBhIGxvYWRlZCB0b2tlbg==');
INSERT INTO user_tokens (user_id, token) VALUES (1, 'dGhpcyBpcyBhIG5lZWRsZXNzZW50IHRva2Vu');
INSERT INTO user_tokens (user_id, token) VALUES (1, 'dGhpcyBpcyBhIG1hc3RlciB0b2tlbg==');
INSERT INTO user_tokens (user_id, token) VALUES (1, 'dGhpcyBpcyBhIG1hc3NpbmcgdG9rZW4=');
