CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT
);

INSERT INTO products (name, description) VALUES ('Treadmill', 'Cardio equipment for home workouts');
INSERT INTO products (name, description) VALUES ('Dumbbells', 'Strength training equipment for muscle building');
INSERT INTO products (name, description) VALUES ('Yoga Mat', 'Mat for yoga and stretching exercises');
INSERT INTO products (name, description) VALUES ('Resistance Bands', 'Versatile equipment for full-body workouts');
INSERT INTO products (name, description) VALUES ('Jump Rope', 'Simple and effective cardio equipment');
INSERT INTO products (name, description) VALUES ('Kettlebell', 'Weight for functional strength training');
INSERT INTO products (name, description) VALUES ('Exercise Ball', 'Stability ball for core workouts');
INSERT INTO products (name, description) VALUES ('Foam Roller', 'Tool for self-myofascial release and recovery');
INSERT INTO products (name, description) VALUES ('Pull-Up Bar', 'Equipment for upper body and core strength');
INSERT INTO products (name, description) VALUES ('Weight Bench', 'Versatile bench for various strength exercises');
