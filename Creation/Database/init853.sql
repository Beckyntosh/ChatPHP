CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);

CREATE TABLE review (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    review_text TEXT
);

CREATE TABLE health_articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    article_text TEXT
);

INSERT INTO users (username, password) VALUES ('user1', 'password1');
INSERT INTO users (username, password) VALUES ('user2', 'password2');
INSERT INTO users (username, password) VALUES ('user3', 'password3');
INSERT INTO users (username, password) VALUES ('user4', 'password4');
INSERT INTO users (username, password) VALUES ('user5', 'password5');
INSERT INTO users (username, password) VALUES ('user6', 'password6');
INSERT INTO users (username, password) VALUES ('user7', 'password7');
INSERT INTO users (username, password) VALUES ('user8', 'password8');
INSERT INTO users (username, password) VALUES ('user9', 'password9');
INSERT INTO users (username, password) VALUES ('user10', 'password10');

INSERT INTO review (username, review_text) VALUES ('user1', 'Great product, highly recommended.');
INSERT INTO review (username, review_text) VALUES ('user2', 'Not satisfied with the quality.');
INSERT INTO review (username, review_text) VALUES ('user3', 'Average service, can be improved.');
INSERT INTO review (username, review_text) VALUES ('user4', 'Love the variety of options available.');
INSERT INTO review (username, review_text) VALUES ('user5', 'Quick delivery, impressive.');
INSERT INTO review (username, review_text) VALUES ('user6', 'Great customer support.');
INSERT INTO review (username, review_text) VALUES ('user7', 'Unbeatable prices, worth every penny.');
INSERT INTO review (username, review_text) VALUES ('user8', 'Fast and efficient service.');
INSERT INTO review (username, review_text) VALUES ('user9', 'One-stop shop for all art supplies needs.');
INSERT INTO review (username, review_text) VALUES ('user10', 'Highly professional and reliable.');

INSERT INTO health_articles (title, article_text) VALUES ('Healthy Eating Habits', 'This article discusses the importance of maintaining healthy eating habits for overall well-being.');
INSERT INTO health_articles (title, article_text) VALUES ('Benefits of Exercise', 'Regular exercise has numerous benefits for physical and mental health, including improving cardiovascular fitness and reducing stress.');
INSERT INTO health_articles (title, article_text) VALUES ('Mental Health Awareness', 'Taking care of your mental health is just as important as your physical health. This article highlights the importance of mental health awareness and seeking help when needed.');
INSERT INTO health_articles (title, article_text) VALUES ('Sleep Hygiene Tips', 'Quality sleep is essential for good health. Learn about the importance of sleep hygiene and tips for improving your sleep quality.');
INSERT INTO health_articles (title, article_text) VALUES ('Stress Management Strategies', 'Stress is a common experience, but its important to know how to manage it effectively. This article provides strategies for coping with stress.');
INSERT INTO health_articles (title, article_text) VALUES ('Fitness for All Ages', 'Exercise is beneficial for people of all ages. Discover how you can stay fit and healthy at every stage of life.');
INSERT INTO health_articles (title, article_text) VALUES ('Healthy Skin Care Routine', 'Maintaining a healthy skincare routine is key to promoting clear and radiant skin. Find out how to establish an effective skincare regimen.');
INSERT INTO health_articles (title, article_text) VALUES ('Nutrition Tips for a Balanced Diet', 'Eating a balanced diet is crucial for getting the nutrients your body needs. Get valuable nutrition tips for achieving a well-rounded diet.');
INSERT INTO health_articles (title, article_text) VALUES ('Importance of Hydration', 'Staying hydrated is essential for overall health and well-being. Learn about the benefits of proper hydration and how to ensure youre drinking enough water.');
INSERT INTO health_articles (title, article_text) VALUES ('Mental Health and Exercise', 'Exercise not only benefits physical health but also has a positive impact on mental well-being. Explore the connection between mental health and exercise.');
