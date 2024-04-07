CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
password VARCHAR(255) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (email, password) VALUES
('user1@example.com', '$2y$10$bu8z3QDxnQyNmMqc7hEMP.22AZBV6qL50ztdmiG8RZdPr4JlW2ACe'), 
('user2@example.com', '$2y$10$O7iZ9NwQ8aSF5FEmWR5MQe16csQb9BPb8tnstVWO3.JgG2vPSLiXm'), 
('user3@example.com', '$2y$10$4amNqTxc/jlkiDVw.aduveoFfLlGASk.XLRnckPUoFn6Ocn2sKpQC'), 
('user4@example.com', '$2y$10$s9mhO.meta7JrKZSU5bxnGeV8cQsGGroDScGw4Mx0bJI2mXl82hiwm'), 
('user5@example.com', '$2y$10$ySz6YcWlrx4bmLHes7JHyObE.kVbV.6MEDTx6Z6zX3urJ0HJ1Xsnm'), 
('user6@example.com', '$2y$10$glvQ6IvEe3Bl2ybsASOTMeqQ33Pb41aIMWj4gt2eOdHFF8/5wE/7m'), 
('user7@example.com', '$2y$10$hAUcufY0u7LkpGtMRxDjLuQ7GJRXVxK9/eQhKFEWjKciCpYYT0t8W'), 
('user8@example.com', '$2y$10$k4wI5Lii/BG6FQbZQR0CHu77UuWOjEiKfDODrjmmDSkUBbvRzJoVK'), 
('user9@example.com', '$2y$10$QmliYA9wYSDMwJvjxRInxOToMtkn.n1cagM82B8OpxWPDaBzQ0Jmy'), 
('user10@example.com', '$2y$10$Q/ePNcJt.8pB2spGWwF9.OaOlSgmGV0aDEuAdlrU.Zc6b7OjpaGz6'); 
