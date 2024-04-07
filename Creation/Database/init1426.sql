CREATE TABLE IF NOT EXISTS Plants (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plantName VARCHAR(50) NOT NULL,
    careSchedule TEXT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO Plants (plantName, careSchedule) VALUES ('Tomato plants', 'Watering daily');
INSERT INTO Plants (plantName, careSchedule) VALUES ('Rose plants', 'Pruning weekly');
INSERT INTO Plants (plantName, careSchedule) VALUES ('Lavender plants', 'Sunlight exposure twice a week');
INSERT INTO Plants (plantName, careSchedule) VALUES ('Basil plants', 'Fertilizing every two weeks');
INSERT INTO Plants (plantName, careSchedule) VALUES ('Orchid plants', 'Humidity control daily');
INSERT INTO Plants (plantName, careSchedule) VALUES ('Succulent plants', 'Minimal watering monthly');
INSERT INTO Plants (plantName, careSchedule) VALUES ('Cactus plants', 'Watering once every two weeks');
INSERT INTO Plants (plantName, careSchedule) VALUES ('Pepper plants', 'Regular pruning and support');
INSERT INTO Plants (plantName, careSchedule) VALUES ('Sunflower plants', 'Regular soil checking');
INSERT INTO Plants (plantName, careSchedule) VALUES ('Carnation plants', 'Deadheading spent blooms');
