CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    time TIMESTAMP NOT NULL,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (name) VALUES
('John Doe'),
('Alice Smith'),
('Bob Johnson'),
('Lisa Brown'),
('Mike Wilson'),
('Sarah Davis'),
('Tom Jones'),
('Emily White'),
('Chris Lee'),
('Jenny Kim');

INSERT INTO products (title, time, user_id) VALUES
('Concert Ticket', '2023-09-15 18:30:00', 1),
('Movie Ticket', '2023-09-20 15:45:00', 2),
('Sports Event Ticket', '2023-09-25 12:00:00', 3),
('Theatre Show Ticket', '2023-09-30 20:00:00', 4),
('Music Festival Ticket', '2023-10-05 14:00:00', 5),
('Art Exhibition Ticket', '2023-10-10 10:30:00', 6),
('Comedy Show Ticket', '2023-10-15 19:15:00', 7),
('Dance Performance Ticket', '2023-10-20 17:45:00', 8),
('Food Festival Ticket', '2023-10-25 13:20:00', 9),
('Tech Conference Ticket', '2023-10-30 09:00:00', 10);
