CREATE TABLE IF NOT EXISTS ProductUpdates (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    signup_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO ProductUpdates (email) VALUES ('example1@gmail.com');
INSERT INTO ProductUpdates (email) VALUES ('example2@gmail.com');
INSERT INTO ProductUpdates (email) VALUES ('example3@gmail.com');
INSERT INTO ProductUpdates (email) VALUES ('example4@gmail.com');
INSERT INTO ProductUpdates (email) VALUES ('example5@gmail.com');
INSERT INTO ProductUpdates (email) VALUES ('example6@gmail.com');
INSERT INTO ProductUpdates (email) VALUES ('example7@gmail.com');
INSERT INTO ProductUpdates (email) VALUES ('example8@gmail.com');
INSERT INTO ProductUpdates (email) VALUES ('example9@gmail.com');
INSERT INTO ProductUpdates (email) VALUES ('example10@gmail.com');
