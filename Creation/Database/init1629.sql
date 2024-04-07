CREATE TABLE IF NOT EXISTS VirtualEvents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
eventName VARCHAR(30) NOT NULL,
eventDate DATE NOT NULL,
capacity INT(10),
regCount INT(10) DEFAULT 0,
regEnd BOOLEAN NOT NULL DEFAULT 0
);

INSERT INTO VirtualEvents (eventName, eventDate, capacity) VALUES ('Virtual Book Club Meeting', '2023-09-15', 50);
INSERT INTO VirtualEvents (eventName, eventDate, capacity) VALUES ('Virtual Conference', '2023-10-20', 100);
INSERT INTO VirtualEvents (eventName, eventDate, capacity) VALUES ('Virtual Art Class', '2023-08-30', 30);
INSERT INTO VirtualEvents (eventName, eventDate, capacity) VALUES ('Virtual Cooking Workshop', '2023-07-25', 40);
INSERT INTO VirtualEvents (eventName, eventDate, capacity) VALUES ('Virtual Fitness Challenge', '2023-11-05', 70);
INSERT INTO VirtualEvents (eventName, eventDate, capacity) VALUES ('Virtual Music Concert', '2023-12-12', 80);
INSERT INTO VirtualEvents (eventName, eventDate, capacity) VALUES ('Virtual Science Fair', '2023-09-08', 60);
INSERT INTO VirtualEvents (eventName, eventDate, capacity) VALUES ('Virtual Storytelling Session', '2023-10-10', 20);
INSERT INTO VirtualEvents (eventName, eventDate, capacity) VALUES ('Virtual Dance Workshop', '2023-11-22', 35);
INSERT INTO VirtualEvents (eventName, eventDate, capacity) VALUES ('Virtual Coding Bootcamp', '2023-08-19', 45);
