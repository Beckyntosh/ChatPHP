CREATE TABLE IF NOT EXISTS polls (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS poll_options (
    id INT AUTO_INCREMENT PRIMARY KEY,
    poll_id INT NOT NULL,
    option_text VARCHAR(255) NOT NULL,
    votes INT NOT NULL DEFAULT 0,
    FOREIGN KEY(poll_id) REFERENCES polls(id) ON DELETE CASCADE
);

INSERT INTO polls (question) VALUES ('Which desktop computer brand do you prefer for digital marketing?');

INSERT INTO poll_options (poll_id, option_text) VALUES (1, 'Apple');
INSERT INTO poll_options (poll_id, option_text) VALUES (1, 'Dell');
INSERT INTO poll_options (poll_id, option_text) VALUES (1, 'HP');
INSERT INTO poll_options (poll_id, option_text) VALUES (1, 'Lenovo');
INSERT INTO poll_options (poll_id, option_text) VALUES (1, 'Microsoft');
INSERT INTO poll_options (poll_id, option_text) VALUES (1, 'Acer');
INSERT INTO poll_options (poll_id, option_text) VALUES (1, 'Asus');
INSERT INTO poll_options (poll_id, option_text) VALUES (1, 'Samsung');
INSERT INTO poll_options (poll_id, option_text) VALUES (1, 'Toshiba');
INSERT INTO poll_options (poll_id, option_text) VALUES (1, 'Sony');