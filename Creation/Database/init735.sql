CREATE TABLE IF NOT EXISTS users(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    username VARCHAR(50),
    password VARCHAR(100)
);

INSERT INTO users (firstname, lastname, email, username, password) VALUES ('John', 'Doe', 'john.doe@example.com', 'johndoe', '$2y$10$t8B2qiddNoJ1bUswQCaeUOeDq7VzOlIfC45.WjP3qoK exgMVyjkC');
INSERT INTO users (firstname, lastname, email, username, password) VALUES ('Jane', 'Smith', 'jane.smith@example.com', 'janesmith', '$2y$10$YKm1SHwKZPxQ0V5AYOcCweRbd3kzTpBB3RCGr1VtcokJKUQDg_LDq');
INSERT INTO users (firstname, lastname, email, username, password) VALUES ('Alice', 'Johnson', 'alice.johnson@example.com', 'alicejohnson', '$2y$10$U9FY2JqiT2YnQTkl0TzPz.pLtXwltGqx7e9X5ZG3xr47hHYwQXJ0e');
INSERT INTO users (firstname, lastname, email, username, password) VALUES ('Bob', 'Brown', 'bob.brown@example.com', 'bobbrown', '$2y$10$NAJb.vSnYDkNovf8KEr1.wejD32vAdZfH8UsPvPQC/qmt9CQGkB8K');
INSERT INTO users (firstname, lastname, email, username, password) VALUES ('Ella', 'Taylor', 'ella.taylor@example.com', 'ellataylor', '$2y$10$2lM.1IRCUQ6mjtGpPJHUoOuis/wWsXxX3FHO1eyt4ukch7iJ.j80G');
INSERT INTO users (firstname, lastname, email, username, password) VALUES ('Mike', 'White', 'mike.white@example.com', 'mikewhite', '$2y$10$gGUfrzA7RBr1/kRURK7CP.f19fzLVczzwgKyvdkWbWKJrVrQHLlC2');
INSERT INTO users (firstname, lastname, email, username, password) VALUES ('Sara', 'Anderson', 'sara.anderson@example.com', 'saraanderson', '$2y$10$2fNmKobUxj0CFjNHJ7wiQ.jhL5y2My9/6IwH/vQ15dEolovuA5Lgm');
INSERT INTO users (firstname, lastname, email, username, password) VALUES ('David', 'Martinez', 'david.martinez@example.com', 'davidmartinez', '$2y$10$S1Ov5TyoA8u3VcDMEICzPeMWSBV4s4.ZrYB3Zwq8flCvKU.muOwK2');
INSERT INTO users (firstname, lastname, email, username, password) VALUES ('Linda', 'Adams', 'linda.adams@example.com', 'lindaadams', '$2y$10$6kIZfOd6SIM2Kp08X.lFTuqTRdcQlvTJAZs70XwBNEGAjcWOu3eaW');
INSERT INTO users (firstname, lastname, email, username, password) VALUES ('Peter', 'Wilson', 'peter.wilson@example.com', 'peterwilson', '$2y$10$2qQjE8S3U0AaGUsjCsJuxexwHs8LsDFIxbsfJzUjb8SL2wFQZJjbS');