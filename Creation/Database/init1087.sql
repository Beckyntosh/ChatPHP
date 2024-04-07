CREATE TABLE IF NOT EXISTS fitness_class_ratings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    class_name VARCHAR(255) NOT NULL,
    rating INT NOT NULL,
    feedback TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO fitness_class_ratings (class_name, rating, feedback) VALUES 
("Yoga", 5, "Great yoga session with a fantastic instructor"),
("Spin Class", 4, "The music was too loud but the workout was intense"),
("Zumba", 3, "Fun class but too crowded"),
("Pilates", 5, "Excellent instructor and peaceful environment"),
("HIIT", 4, "Challenging workout, loved the energy"),
("Body Pump", 2, "Not my favorite, too repetitive"),
("Boxing", 5, "Best workout I've ever had, highly recommend"),
("Barre", 3, "Decent class, could use more variety"),
("Bootcamp", 4, "Good mix of cardio and strength training"),
("Crossfit", 5, "Intense but rewarding workout");
