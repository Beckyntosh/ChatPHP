CREATE TABLE virtual_events (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  eventName VARCHAR(30) NOT NULL,
  eventDate DATE NOT NULL,
  capacity INT UNSIGNED,
  description TEXT,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO virtual_events (eventName, eventDate, capacity, description) VALUES ('Virtual Book Club Meeting', '2022-08-15', 50, 'Discussing the latest bestseller');
INSERT INTO virtual_events (eventName, eventDate, capacity, description) VALUES ('Virtual Art Exhibition', '2022-09-10', 100, 'Showcasing works of emerging artists');
INSERT INTO virtual_events (eventName, eventDate, capacity, description) VALUES ('Virtual Cooking Class', '2022-07-25', 30, 'Learn how to make gourmet dishes');
INSERT INTO virtual_events (eventName, eventDate, capacity, description) VALUES ('Virtual Yoga Retreat', '2022-08-05', 75, 'Relax and rejuvenate with yoga sessions');
INSERT INTO virtual_events (eventName, eventDate, capacity, description) VALUES ('Virtual Music Concert', '2022-09-20', 200, 'Enjoy live performances from talented musicians');
INSERT INTO virtual_events (eventName, eventDate, capacity, description) VALUES ('Virtual Science Symposium', '2022-10-15', 150, 'Explore the latest advancements in science');
INSERT INTO virtual_events (eventName, eventDate, capacity, description) VALUES ('Virtual Film Festival', '2022-11-02', 80, 'Screening a selection of independent films');
INSERT INTO virtual_events (eventName, eventDate, capacity, description) VALUES ('Virtual Wine Tasting', '2022-07-30', 40, 'Sample a variety of wines from different regions');
INSERT INTO virtual_events (eventName, eventDate, capacity, description) VALUES ('Virtual Technology Conference', '2022-08-25', 120, 'Showcasing cutting-edge technologies');
INSERT INTO virtual_events (eventName, eventDate, capacity, description) VALUES ('Virtual Fitness Bootcamp', '2022-09-08', 50, 'Intense workout sessions to stay fit');
