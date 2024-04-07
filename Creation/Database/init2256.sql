CREATE TABLE IF NOT EXISTS wine_subscribers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO wine_subscribers (name, email) VALUES ('John Doe', 'johndoe@example.com');
INSERT INTO wine_subscribers (name, email) VALUES ('Jane Smith', 'janesmith@example.com');
INSERT INTO wine_subscribers (name, email) VALUES ('Michael Johnson', 'michaeljohnson@example.com');
INSERT INTO wine_subscribers (name, email) VALUES ('Sarah Brown', 'sarahbrown@example.com');
INSERT INTO wine_subscribers (name, email) VALUES ('Chris Lee', 'chrislee@example.com');
INSERT INTO wine_subscribers (name, email) VALUES ('Emily Davis', 'emilydavis@example.com');
INSERT INTO wine_subscribers (name, email) VALUES ('Mark Taylor', 'marktaylor@example.com');
INSERT INTO wine_subscribers (name, email) VALUES ('Laura Wilson', 'laurawilson@example.com');
INSERT INTO wine_subscribers (name, email) VALUES ('Sam Parker', 'samparker@example.com');
INSERT INTO wine_subscribers (name, email) VALUES ('Jessica Martinez', 'jessicamartinez@example.com');
