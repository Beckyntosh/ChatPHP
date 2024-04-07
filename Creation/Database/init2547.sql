CREATE TABLE user_dashboard (
    user_id INT PRIMARY KEY,
    layout VARCHAR(50),
    widgets TEXT
);

INSERT INTO user_dashboard (user_id, layout, widgets) VALUES (1, 'classic', '["latest_books", "book_recommendations"]');
INSERT INTO user_dashboard (user_id, layout, widgets) VALUES (2, 'modern', '["book_recommendations", "favorite_authors"]');
INSERT INTO user_dashboard (user_id, layout, widgets) VALUES (3, 'compact', '["latest_books"]');
INSERT INTO user_dashboard (user_id, layout, widgets) VALUES (4, 'modern', '["favorite_authors"]');
INSERT INTO user_dashboard (user_id, layout, widgets) VALUES (5, 'classic', '["latest_books", "book_recommendations", "favorite_authors"]');
INSERT INTO user_dashboard (user_id, layout, widgets) VALUES (6, 'compact', '["latest_books", "favorite_authors"]');
INSERT INTO user_dashboard (user_id, layout, widgets) VALUES (7, 'classic', '["book_recommendations", "favorite_authors"]');
INSERT INTO user_dashboard (user_id, layout, widgets) VALUES (8, 'modern', '["latest_books", "book_recommendations"]');
INSERT INTO user_dashboard (user_id, layout, widgets) VALUES (9, 'compact', '["book_recommendations"]');
INSERT INTO user_dashboard (user_id, layout, widgets) VALUES (10, 'classic', '["latest_books", "favorite_authors"]');
