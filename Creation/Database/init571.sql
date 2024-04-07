CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES ('john_doe', '$2y$10$aTzeDFFm63Uj5FUDOZzZUOT.9hkVWqBHxX4V2KbU48M/6Iq6SXxV2');
INSERT INTO users (username, password) VALUES ('jane_smith', '$2y$10$yAbRvh7NZNZqWM.auZrMl.G9RqtdgOwzf6kQEtGpAVOoljfyWmwcK');
INSERT INTO users (username, password) VALUES ('admin123', '$2y$10$TiwnCzUgv/G./foUKrDePuw8Mu2yprdJSvaw5h8usypMASvWE2V86');
INSERT INTO users (username, password) VALUES ('testuser1', '$2y$10$wrYe7vF8TCMNm6kHjE5gfOy6OBEZiuOgDPX2fBq0umwNyJHEuGe3O');
INSERT INTO users (username, password) VALUES ('newuser', '$2y$10$rQnEiAz4fRZtyDKqWycXbuh9eAN7aDJbDnnKRDkRQtfnyvSP62/vG');
INSERT INTO users (username, password) VALUES ('user321', '$2y$10$3P/7IY7E8ld7irz9zv1gaODV5Ec9Zq/tKXE9zcxjBlHnV4oKApD/q');
INSERT INTO users (username, password) VALUES ('guestuser', '$2y$10$vQja9Ptzdpud7IvOnw691.Ai/2BlZpz/euroKsBdZfuRyykWE9ova');
INSERT INTO users (username, password) VALUES ('myusername', '$2y$10$7Vdkh/Vipc6n3K3xkdiQxOdQkyI7Mi9dWbGbEKiG22fxzFIbh7fHu');
INSERT INTO users (username, password) VALUES ('coolguy', '$2y$10$2lDjbyAsyH1OYKvDPDWrjOjuYzMTBOC3p0Zj4du5JcVATmRWnCOe2');
INSERT INTO users (username, password) VALUES ('dummyuser', '$2y$10$R1s46uWxvskbf0sedz7cy.XbYjY2BbjVf1wGo2VOLxSvUzAVv5DKe');
