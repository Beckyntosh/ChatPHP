CREATE TABLE IF NOT EXISTS vitamin_files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    hash VARCHAR(255) NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO vitamin_files (filename, hash) VALUES ('vitaminA.pdf', '5f4dcc3b5aa765d61d8327deb882cf99');
INSERT INTO vitamin_files (filename, hash) VALUES ('vitaminB.pdf', '202cb962ac59075b964b07152d234b70');
INSERT INTO vitamin_files (filename, hash) VALUES ('vitaminC.pdf', '900150983cd24fb0d6963f7d28e17f72');
INSERT INTO vitamin_files (filename, hash) VALUES ('vitaminD.pdf', 'eec53f7030a6afe7e9c734d215cadbe6');
INSERT INTO vitamin_files (filename, hash) VALUES ('vitaminE.pdf', '872a954db0c18743abd13f6796b96bd3');
INSERT INTO vitamin_files (filename, hash) VALUES ('vitaminK.pdf', '392621e57af0f901182d4cc542cc75a3');
INSERT INTO vitamin_files (filename, hash) VALUES ('vitaminB12.pdf', '47e6a68e45cec75ac48b9e9e444fbf03');
INSERT INTO vitamin_files (filename, hash) VALUES ('multivitamin.pdf', 'a8253dfc8f53e170ab32e8d84c107b24');
INSERT INTO vitamin_files (filename, hash) VALUES ('calcium.pdf', '7815696ecbf1c96e55d25b45c2c21fa0');
INSERT INTO vitamin_files (filename, hash) VALUES ('iron.pdf', '45364e6a9e5fff70291f640d2c0ac148');
