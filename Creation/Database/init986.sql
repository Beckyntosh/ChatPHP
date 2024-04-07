CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL,
    rating INT NOT NULL,
    review TEXT,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO reviews (user_name, rating, review) VALUES ('John Doe', 5, 'Great app for travel enthusiasts');
INSERT INTO reviews (user_name, rating, review) VALUES ('Alice Smith', 4, 'Enjoyed using the app while planning my trip');
INSERT INTO reviews (user_name, rating, review) VALUES ('Emma Johnson', 3, 'Decent app, could use some improvements');
INSERT INTO reviews (user_name, rating, review) VALUES ('Mike Wilson', 5, 'User-friendly interface, highly recommended');
INSERT INTO reviews (user_name, rating, review) VALUES ('Sarah Brown', 2, 'Not very impressed with the features');
INSERT INTO reviews (user_name, rating, review) VALUES ('Chris Evans', 4, 'Helped me find great travel deals');
INSERT INTO reviews (user_name, rating, review) VALUES ('Ava Martinez', 5, 'Best travel app I have used so far');
INSERT INTO reviews (user_name, rating, review) VALUES ('Daniel Lee', 3, 'Average app, needs more options');
INSERT INTO reviews (user_name, rating, review) VALUES ('Olivia Taylor', 4, 'Good experience overall with the app');
INSERT INTO reviews (user_name, rating, review) VALUES ('William White', 2, 'Had some issues with functionality');
