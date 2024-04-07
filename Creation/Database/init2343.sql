CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES ('john_doe', 'john@example.com', '$2y$10$HhUWxvSvWaNsZdnsp6Q9.pe5Q6rCM58KjLq1/vHxVshjzQeN1JUqK'),
('jane_smith', 'jane@example.com', '$2y$10$5l0oGGlRuSNfNPljUwdMfuA3.CHURc/JuL0mpU0ufWf5r3fMbx00O'),
('alex_rogers', 'alex@example.com', '$2y$10$zf4Ojvs.wCI/ymhR1NPb4ePuWjV.cFgwx7cASiMJ5V49Fo.HpkmYa'),
('sara_williams', 'sara@example.com', '$2y$10$HzDDoTyZqzxXFP.SlupmpeJH8KjA3orOgUFGZwaT8x4iW2.zjSZ2O'),
('michael_lewis', 'michael@example.com', '$2y$10$IZciTriXqXHMsAV4DXy7VOd2RrPOB9GHNvTVAkqF6Uz0ArlxjHEVK'),
('emily_harris', 'emily@example.com', '$2y$10$0rWBmt4QJFvlbH1SF73dAOMMQ5lm6AyMTbmAFxA08OARoa23qzFC2'),
('chris_smith', 'chris@example.com', '$2y$10$xh9TWY4ShwMo/hOehGnose6qljxZ6.ejeYl.ZghG0oa2KPoEuMnOe'),
('laura_jones', 'laura@example.com', '$2y$10$L1MhPM7kYHjkIOK/poWooOf0gg4Pqm0A5GETjn9Is3jlCfg2lxWx2'),
('sam_brown', 'sam@example.com', '$2y$10$mwuFFohLO65T5k4tplGPheEoSiSE1fUFRe5Id9vywD9LIyNlWtHl6'),
('rachel_green', 'rachel@example.com', '$2y$10$qQbiqyigdT4bJTKI5x4JRudnYntJmYVqLsI/mO5Jczf5YjWPZuE7m');
