CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  password VARCHAR(255),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES
("john_doe", "john.doe@example.com", "$2y$10$k.helhc/D67qH55OBL6cg.yIAgnH1IS1AHD7kZxAhVPX99RfCzOeK"), 
("jane_smith", "jane.smith@example.com", "$2y$10$M8vbVCBqZzYYmF1UZ5NgUe8LbWxSHXN0mmM1caDobkY/ji7G1t41K"), 
("adam_jones", "adam.jones@example.com", "$2y$10$icvKe.uLKxOZgz0fyvAi7u4ncIDOVSDsPSEi/9U.rv29PcybUybAy"), 
("lisa_williams", "lisa.williams@example.com", "$2y$10$AwT0dFxt04WRi/n/8DpKXOZjKM5BzTEVOq3tWnvmWBGPZ3XLGj3Tu"), 
("michael_brown", "michael.brown@example.com", "$2y$10$W5XvLi8KT8kutLERL7oe1.30ynGvKuFotG80AWnV4cu0m1kC/1K0C"), 
("sarah_jackson", "sarah.jackson@example.com", "$2y$10$utJO9T7srXnSPjLvFbG0F.jCANb6lnNelA2S.VhdQv9VOF2gG3hxq"), 
("kevin_miller", "kevin.miller@example.com", "$2y$10$uJ5N6qDnHD3yz/Kna7AHNeRFqJSS6AbUcLTSYmquNUm1oDv1GZPl6"), 
("amanda_clark", "amanda.clark@example.com", "$2y$10$dhxAMnYjnavvCoblljTGi.rU6aYC6Bm7vfA2Z8zBawkiVmYbQ0yUa"), 
("patrick_young", "patrick.young@example.com", "$2y$10$YIrEy6lLalf01WnRUugKaOTlRCp6.v9HsFO2AXL1CwbsvNiV2/8fC"), 
("emily_hall", "emily.hall@example.com", "$2y$10$FblJ0cYwIfQ27D3.cwTYxOYaRBPyLPMm0t7h/B7zrhv4a9wsPJFhK");