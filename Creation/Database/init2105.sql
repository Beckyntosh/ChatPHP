CREATE TABLE IF NOT EXISTS wishlist (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
item_name VARCHAR(30) NOT NULL,
item_description TEXT,
reg_date TIMESTAMP
);

INSERT INTO wishlist (item_name, item_description) VALUES ('Magazine A', 'Exciting articles and features');
INSERT INTO wishlist (item_name, item_description) VALUES ('Magazine B', 'Latest trends and news');
INSERT INTO wishlist (item_name, item_description) VALUES ('Magazine C', 'In-depth analysis and reviews');
INSERT INTO wishlist (item_name, item_description) VALUES ('Magazine D', 'Inspiring stories and interviews');
INSERT INTO wishlist (item_name, item_description) VALUES ('Magazine E', 'Creative ideas and tips');
INSERT INTO wishlist (item_name, item_description) VALUES ('Magazine F', 'Entertaining content and quizzes');
INSERT INTO wishlist (item_name, item_description) VALUES ('Magazine G', 'Educational articles and resources');
INSERT INTO wishlist (item_name, item_description) VALUES ('Magazine H', 'Informative guides and tutorials');
INSERT INTO wishlist (item_name, item_description) VALUES ('Magazine I', 'Engaging visuals and photography');
INSERT INTO wishlist (item_name, item_description) VALUES ('Magazine J', 'Thought-provoking essays and editorials');
