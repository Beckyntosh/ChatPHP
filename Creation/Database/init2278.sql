CREATE TABLE IF NOT EXISTS profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
favorite_color VARCHAR(30),
favorite_office_supply VARCHAR(50),
bio TEXT,
reg_date TIMESTAMP
);

INSERT INTO profiles (username, favorite_color, favorite_office_supply, bio) VALUES
("Alice", "Blue", "Pens", "I love writing and doodling"),
("Bob", "Green", "Stapler", "I always keep my desk organized"),
("Charlie", "Red", "Scissors", "I enjoy crafting in my free time"),
("David", "Yellow", "Notepads", "I'm always jotting down ideas"),
("Eve", "Purple", "Paper Clips", "I like to keep things together"),
("Frank", "Orange", "Highlighters", "I use them for color coding"),
("Grace", "Pink", "Tape", "I love decorating my stationery"),
("Henry", "Black", "Markers", "I enjoy sketching in my sketchbook"),
("Ivy", "White", "Folders", "I keep all my documents organized"),
("Jack", "Brown", "Notebooks", "I write down everything in my notebooks");
