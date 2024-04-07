CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(255) NOT NULL,
news_preferences VARCHAR(255) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS news_preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(50) NOT NULL
);

INSERT INTO news_preferences (category) VALUES ('Education'), ('Humor'), ('Sports'), ('Technology'), ('Politics'), ('Science'), ('Health'), ('Business'), ('Art'), ('Music');
