CREATE TABLE `events` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`event_name` varchar(255) NOT NULL,
	`event_date` date NOT NULL,
	`capacity` int(11) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `events` (`event_name`, `event_date`, `capacity`) VALUES
('Virtual Book Club Meeting', '2022-06-15', 20),
('Online Cooking Class', '2022-07-10', 15),
('Digital Art Workshop', '2022-08-05', 25),
('Webinar on AI', '2022-09-20', 30),
('Virtual Yoga Session', '2022-10-12', 40),
('Online Music Concert', '2022-11-08', 50),
('Fitness Webinar', '2022-12-10', 35),
('Virtual Science Fair', '2022-12-28', 60),
('Virtual Wine Tasting', '2022-11-18', 25),
('Virtual Career Fair', '2022-10-30', 50);