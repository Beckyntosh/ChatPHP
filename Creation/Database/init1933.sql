CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    code TEXT NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    reviewed TINYINT(1) DEFAULT 0,
    review_comments TEXT
);

INSERT INTO reviews (filename, code) VALUES ('sample1.txt', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.');
INSERT INTO reviews (filename, code) VALUES ('sample2.txt', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.');
INSERT INTO reviews (filename, code) VALUES ('sample3.txt', 'It was popularised in the 1960s with the release of Letraset sheets containing passages of Lorem Ipsum.');
INSERT INTO reviews (filename, code) VALUES ('sample4.txt', 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.');
INSERT INTO reviews (filename, code) VALUES ('sample5.txt', 'Various versions have evolved over the years, sometimes by accident, sometimes on purpose.');
INSERT INTO reviews (filename, code) VALUES ('sample6.txt', 'Contrary to popular belief, Lorem Ipsum is not simply random text.');
INSERT INTO reviews (filename, code) VALUES ('sample7.txt', 'It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.');
INSERT INTO reviews (filename, code) VALUES ('sample8.txt', 'Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words.');
INSERT INTO reviews (filename, code) VALUES ('sample9.txt', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.');
INSERT INTO reviews (filename, code) VALUES ('sample10.txt', 'Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form.');
