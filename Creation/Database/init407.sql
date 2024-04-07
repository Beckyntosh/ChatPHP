
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO users (username, password) VALUES ('john_doe', '$2y$10$aXB9smkj3Tl2AobK7R5.qeMQ1WqnYbe2VfrtcZgLEfAD.PycAqoGm'),
('jane_smith', '$2y$10$A1eWZbgUa9u890IH6UU2D.xBWFEJjOFPvLpK4/Bzr5PV2z3L0kq2G'),
('michael_jackson', '$2y$10$wasYnkFLK8oyZhstwG0TduKmRONGx2KMO1lFM7.px3zs2MQeGkoUu'),
('sarah_connor', '$2y$10$AYmgDwakC3lB7vw/z6Xyc.gz4k.N7Hw9NfOH53uC8EJiQHKHmOfD6'),
('sam_wilson', '$2y$10$pwLeqdCQVeQnJ29nHYNCT.1zB9Sd1rGYfN7Kgd4MymdXwOe9P5PKu'),
('linda_carter', '$2y$10$MZHvcE3L7mgRZ5XyEU1jzOr.NrkKEl8bTLTGnLffM.x/rmKnfnpNa'),
('peter_parker', '$2y$10$5ljpUcEhoPYWv9ISwSeHae3oZbR0uZvaYpVl0bErL9996FBKvPYEe'),
('tony_stark', '$2y$10$YJcqtmt9lfN/gLD4jsg.Vev8i4El3m.m7UFQK.xQK3KXKsWW2mO/K'),
('clark_kent', '$2y$10$2kRJPg3.TtQ8vTpHZnrdZOkq8zX0dcS1Hf.NB.Vi2wyyaMDPOFtHq'),
('diana_prince', '$2y$10$5EcQKCYi.V8VsVJYVBk2NeFm60U8cGDXHnrwr1cG2RU5snt9lDx2m');
