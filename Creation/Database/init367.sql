CREATE TABLE IF NOT EXISTS ProductUpdates (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO ProductUpdates (email) VALUES ('test1@example.com');
INSERT INTO ProductUpdates (email) VALUES ('test2@example.com');
INSERT INTO ProductUpdates (email) VALUES ('test3@example.com');
INSERT INTO ProductUpdates (email) VALUES ('test4@example.com');
INSERT INTO ProductUpdates (email) VALUES ('test5@example.com');
INSERT INTO ProductUpdates (email) VALUES ('test6@example.com');
INSERT INTO ProductUpdates (email) VALUES ('test7@example.com');
INSERT INTO ProductUpdates (email) VALUES ('test8@example.com');
INSERT INTO ProductUpdates (email) VALUES ('test9@example.com');
INSERT INTO ProductUpdates (email) VALUES ('test10@example.com');
