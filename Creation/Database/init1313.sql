CREATE TABLE IF NOT EXISTS diets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);
CREATE TABLE IF NOT EXISTS meals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    diet_id INT,
    day_of_week ENUM('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday') NOT NULL,
    mealplan TEXT NOT NULL,
    FOREIGN KEY (diet_id) REFERENCES diets(id)
);

INSERT INTO diets (name) VALUES ('Vegan'), ('Vegetarian'), ('Gluten-Free'), ('Ketogenic');
INSERT INTO meals (diet_id, day_of_week, mealplan) VALUES (1, 'Monday', 'Example meal for Monday'),
                                                    (2, 'Tuesday', 'Example meal for Tuesday'),
                                                    (3, 'Wednesday', 'Example meal for Wednesday'),
                                                    (4, 'Thursday', 'Example meal for Thursday'),
                                                    (1, 'Friday', 'Example meal for Friday'),
                                                    (3, 'Saturday', 'Example meal for Saturday'),
                                                    (2, 'Sunday', 'Example meal for Sunday'),
                                                    (4, 'Monday', 'Example meal for Monday'),
                                                    (1, 'Tuesday', 'Example meal for Tuesday'),
                                                    (2, 'Wednesday', 'Example meal for Wednesday');
