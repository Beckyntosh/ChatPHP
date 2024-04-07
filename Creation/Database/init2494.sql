CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(255),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES ('john_doe', 'john.doe@example.com', '$2y$10$eYsD/ABT9hCkmUQvpWutRuGJoqEZuZE2LHx2M7qCBml5hlPB.xOyK'),
('jane_smith', 'jane.smith@example.com', '$2y$10$lBYCeoVgvbogp8/cSP8N2.dwWVJQT95o1phYP.h7uq95vEGHm.he6'),
('alex_green', 'alex.green@example.com', '$2y$10$fXZsp8kQpUyjY8WOLlgezO2/P3e60aBfbZ6sDGqlbB5u7CeOsTuYK'),
('sarah_jones', 'sarah.jones@example.com', '$2y$10$Uz4tPIRQMa8gQY4KpIBrosnAYO/gWEkkSBb8Wm/B3EsV31FfF3cZK'),
('mike_jackson', 'mike.jackson@example.com', '$2y$10$2SN5q6D4AhQWvNuj/S1yp.ORVAdPeeX02meX0Jtt8wXHSNqVWsgeC'),
('emily_roberts', 'emily.roberts@example.com', '$2y$10$k7TO8rofesOnH.Tp.GNc6uZlRvHkc6tJldaJHZA6w0R/RCHIkZ1Za'),
('adam_lewis', 'adam.lewis@example.com', '$2y$10$7zJ.fumbu4BCfg8OTNKsd.tN8t3Z7qEGN0o0jmQdRw4CGR.7kImjC'),
('lisa_brown', 'lisa.brown@example.com', '$2y$10$rUllIN.1RSl5D41LOj2bp.YWxchmXrbJyNgtCwtJI9PTQVrkrh9Am'),
('steven_wilson', 'steven.wilson@example.com', '$2y$10$VyVlEcH1a2S8h4i724PbY.b2KK/vz4Dh29VzO3m6N9OLVwWq/fJ4G'),
('olivia_clark', 'olivia.clark@example.com', '$2y$10$enr0kE7OpjBzepbsI9qDsO5JANOiUNOvG5EF7.3wAbgZv7UDaoFfS');
