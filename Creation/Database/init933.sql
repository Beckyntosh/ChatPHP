CREATE TABLE IF NOT EXISTS messages (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    sender VARCHAR(30) NOT NULL,
    receiver VARCHAR(30) NOT NULL,
    message TEXT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO messages (sender, receiver, message) VALUES ('Alice', 'Bob', 'aW5zZXJ0IG1lc3NhZ2UgZm9yIGJhcg==');
INSERT INTO messages (sender, receiver, message) VALUES ('Bob', 'Alice', 'cGFzc3dvcmQgZm9yIGVudGVycHJpc2UgY3JlZGVudGlhbHM=');
INSERT INTO messages (sender, receiver, message) VALUES ('Charlie', 'Alice', 'cGFzc3dvcmQgZm9yIGNoYXJhY3RlciB0aGF0IGF1dG9tYXRvciA=');
INSERT INTO messages (sender, receiver, message) VALUES ('Alice', 'David', 'YXNkZWVwb3NpdGlvbmVzc2VudCBkZXRvbWlkZW50aWZ5');
INSERT INTO messages (sender, receiver, message) VALUES ('Eve', 'Alice', 'aW50ZXJzZWN0IG9mIGVudGVycHJpc2UgYWN0aXZlIHRpbWUgc3RyZWV0cw==');
INSERT INTO messages (sender, receiver, message) VALUES ('Frank', 'Bob', 'c3Rha2luZyB0aGF0IG1zZyBmb3IgY3VzdG9tIHN1cGVyaW9y');
INSERT INTO messages (sender, receiver, message) VALUES ('Bob', 'Eve', 'cGFzc3dvcmQgZm9yIGVudGVycHJpc2UgY3JlZGVudGlhbHM=');
INSERT INTO messages (sender, receiver, message) VALUES ('David', 'Charlie', 'bG9uZyBkZXZlbG9wZXJzIHNjb3JlZW5zaG90IHJlc3BvbnNpYXRl');
INSERT INTO messages (sender, receiver, message) VALUES ('Alice', 'Frank', 'c3RyaW5nIHRoYXQgY2FzZSBwYXNzZXRz');
INSERT INTO messages (sender, receiver, message) VALUES ('Eve', 'David', 'dGhpcyBpcyBhbiBlbmNyeXB0aW9uYXJpYWw=');
