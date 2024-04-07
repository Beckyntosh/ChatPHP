CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
hashed_password VARCHAR(255) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO users (username, hashed_password) VALUES ('user1', '$2y$10$j35IcMgdCkmsg72uGFFbPu4/SKRA3TtwJ6U..FwLy3b.R8F3i9F4i'),
('user2', '$2y$10$1CMDcE1JwUq./uXeu07XUuP4RbPodKImr9MF6F6jcqCMvNtls4cCq'),
('user3', '$2y$10$tcmGYQWoNjokRrbYBne/h./zn7tnowd85F2L.lJ4Canvas12i8yjCS'),
('user4', '$2y$10$XYwi5sq/dPTG8zt0Lnd4IOESeSUrre5sO8r4PxJKM5ftePnrOFk2q'),
('user5', '$2y$10$Vl2vhaFYsV5bxtTaZlOczeuFXxAy9m9f8yLgVGGNZIOBbDndRdD,E'),
('user6', '$2y$10$rdeRQjhFm09zKR.WsS3.t.KdSYm3bQ4or5SBcIRdx/TsXwXnwODkG'),
('user7', '$2y$10$gN.vRFOfncdbajuWvB1.7OgkQuQmcna.NK.OVkDRidA2.t3GZ2g6W'),
('user8', '$2y$10$rcR3V73qbuGDGSQeqGtKzeTvmc3EDu/NBvrauYZKJPKzY7hpubYaC'),
('user9', '$2y$10$Fw.BMmfvJD6KOWwb9sXduOtOCrl8CLQvT4K9rdJ.xF5tMgRK012pC'),
('user10', '$2y$10$hq/cII1GHXdcFmV/aJ5lAOvX5xE5MDjLO5jqXkXOMT47ope6jJU1u');
