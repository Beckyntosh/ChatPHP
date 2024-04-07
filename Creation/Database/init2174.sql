CREATE TABLE languages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    code VARCHAR(5) NOT NULL
);

CREATE TABLE website_content (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content TEXT NOT NULL,
    language_code VARCHAR(5) NOT NULL
);

INSERT INTO languages (name, code) VALUES ('English', 'en');
INSERT INTO languages (name, code) VALUES ('Spanish', 'es');
INSERT INTO languages (name, code) VALUES ('French', 'fr');
INSERT INTO languages (name, code) VALUES ('German', 'de');
INSERT INTO languages (name, code) VALUES ('Italian', 'it');
INSERT INTO languages (name, code) VALUES ('Russian', 'ru');
INSERT INTO languages (name, code) VALUES ('Chinese', 'zh');
INSERT INTO languages (name, code) VALUES ('Japanese', 'ja');
INSERT INTO languages (name, code) VALUES ('Korean', 'ko');
INSERT INTO languages (name, code) VALUES ('Arabic', 'ar');

INSERT INTO website_content (content, language_code) VALUES ('Welcome to the Laptops Website', 'en');
INSERT INTO website_content (content, language_code) VALUES ('Bienvenido al sitio web de Laptops', 'es');
INSERT INTO website_content (content, language_code) VALUES ('Bienvenue sur le site Web des ordinateurs portables', 'fr');
