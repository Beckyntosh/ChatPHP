CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS carts (
    cart_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    cart_contents TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username) VALUES ('Alice'), ('Bob'), ('Charlie'), ('David'), ('Eve'), ('Frank'), ('Grace'), ('Harry'), ('Ivy'), ('Jack');

INSERT INTO carts (user_id, cart_contents) VALUES (1, 'a:3:{i:0;s:6:"Pencil";i:1;s:8:"Notebook";i:2;s:5:"Eraser";}'),
                                             (2, 'a:2:{i:0;s:8:"Notebook";i:1;s:4:"Pen";}'),
                                             (3, 'a:1:{i:0;s:6:"Stapler";}'),
                                             (4, 'a:4:{i:0;s:7:"Scissors";i:1;s:5:"Ruler";i:2;s:3:"Glue";i:3;s:8:"Notebook";}'),
                                             (5, 'a:2:{i:0;s:6:"Pencil";i:1;s:4:"Pen";}'),
                                             (6, 'a:1:{i:0;s:4:"Pen";}'),
                                             (7, 'a:3:{i:0;s:5:"Eraser";i:1;s:5:"Stapler";i:2;s:7:"Scissors";}'),
                                             (8, 'a:2:{i:0;s:4:"Pen";i:1;s:6:"Stapler";}'),
                                             (9, 'a:1:{i:0;s:8:"Notebook";}'),
                                             (10, 'a:3:{i:0;s:6:"Pencil";i:1;s:5:"Eraser";i:2;s:8:"Notebook";}');
