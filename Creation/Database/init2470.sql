CREATE TABLE IF NOT EXISTS `users` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table structure for table `appointments`
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(6) unsigned NOT NULL,
  `appointment_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Insert sample data into users table
INSERT INTO `users` (`id`, `username`, `password`, `email`, `reg_date`) VALUES
(1, 'john_doe', 'password123', 'john.doe@example.com', '2022-01-01 00:00:00'),
(2, 'jane_smith', 'smith123', 'jane.smith@example.com', '2022-01-02 00:00:00'),
(3, 'admin', 'adminpass', 'admin@example.com', '2022-01-03 00:00:00');

-- Insert sample data into appointments table
INSERT INTO `appointments` (`id`, `user_id`, `appointment_time`) VALUES
(1, 1, '2022-01-05 10:00:00'),
(2, 2, '2022-01-06 11:00:00'),
(3, 3, '2022-01-07 12:00:00');
