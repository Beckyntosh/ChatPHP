CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(255) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (username, password) VALUES ('john_doe', '$2y$10$axzyL1L7.379DOiV5D5qbeW5uE8v/7VJ4COCvxdbNU0jzGFJ3rsg6'); 
INSERT INTO users (username, password) VALUES ('jane_smith', '$2y$10$yA04Xl9.Difw8GUsYAeAP.esq0a.WmOC2QG8cxlyH0upzlRU3iQxC'); 
INSERT INTO users (username, password) VALUES ('alice_wonderland', '$2y$10$CJQVTWeU3ZhTUdbtzFmNoOMMfzNGLKqPL4HShMdLEIj22qqvK64i6'); 
INSERT INTO users (username, password) VALUES ('bob_marley', '$2y$10$4P.0zRwmAgQOMHIs6185buVlXbaJW5lRDQ068Ma0xWobUW1JPsMvC'); 
INSERT INTO users (username, password) VALUES ('sarah_connor', '$2y$10$Iam.CBIz1svc0HwcQedRlO9mF1ThiCU/Getb8Vuwns/Q860j0sKeO'); 
INSERT INTO users (username, password) VALUES ('peter_parker', '$2y$10$TmLTC.gK7i09lurNHq9ohu6CN1mZ3/ZusV/I6iJq4yx8VON1t.CQe'); 
INSERT INTO users (username, password) VALUES ('ellen_ripley', '$2y$10$Lif07itQNOG9MWb4ZQe.O.luE/SyJtUUmq3bUQjixwF1.F4J//7Iu'); 
INSERT INTO users (username, password) VALUES ('marty_mcfly', '$2y$10$apDWGLU7uqwC5s78M2iAv.d3s0pJv63HUG2Ve90A9JxyFvQDQ9U3O'); 
INSERT INTO users (username, password) VALUES ('lara_croft', '$2y$10$KYCim8IKI2oDa/ueXlsD..22eOPYCYaFa4XyrQDQa8k91KZTWZio6'); 
INSERT INTO users (username, password) VALUES ('bruce_wayne', '$2y$10$A2GXDqvu2k8Ntpa48qUi3uQQ3kVAJI/Cad/YwvU/C02UlL7iv7kEu');
