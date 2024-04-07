CREATE TABLE IF NOT EXISTS Documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
file_name VARCHAR(255) NOT NULL,
file_type VARCHAR(255) NOT NULL,
file_data LONGBLOB NOT NULL,
upload_time TIMESTAMP
);

INSERT INTO Documents (file_name, file_type, file_data) VALUES ('Driver License 1', 'image/jpeg', 'JVBERi0xLjUNCiW1tbW1DQoxIDAgb2JqDQo8PC9UeXBlL0NhdGFsb2cvUGFnZXM+Pg0Kc3RyZWFtDQpdfQ0KZW5kb2JqDQoyIDAgb2JqDQo8PC9MZW5ndGggNTI4L0ZpbHRlci9GbGF0ZURlY29kZT4+DQplbmRvYmoNCjAgNCAwIFIgDQovRm9udERlc2NyaXB0b3IgMTYgMCBSDQovRm9udEJCb3ggWyAwIDAgNzUgODZdDQo+Pg0Kc3RhcnR4cmVmDQowIDg5DQowMDAwMDAwMDAwIDY1NTM1IGYNCjAwMDAwMDAwNTMgMDAwMDAgbg0KMDAwMDAwMDk0MSAwMDAwMCBuDQowMDAwMDAwMDc5IDAwMDAwIG4NCjAwMDAwMDAxMTYgMDAwMDAgbg0KMDAwMDAwMTIzIDAwMDAwIG4NCjAwMDAwMDAyMTggMDAwMDAgbg0KMDAwMDAwMjgyIDAwMDAwIG4NCnRyYWlsZXINClDAfTWs8A7uVcl9cd1aAy9JWvTxjt4CG7kRMxsw==');


INSERT INTO Documents (file_name, file_type, file_data) VALUES ('Driver License 2', 'image/jpeg', '/9j/4AAQSkZJRgABAQEAYABgAAD/2wBDAAEBAQEBAUE...');


INSERT INTO Documents (file_name, file_type, file_data) VALUES ('Passport 1', 'image/jpeg', '/9j/4AAQSkZJRgABAQEAYABgAAD/2wBDAAEBAQEBAUE...');


INSERT INTO Documents (file_name, file_type, file_data) VALUES ('Passport 2', 'image/jpeg', '/9j/4AAQSkZJRgABAQEAYABgAAD/2wBDAAEBAQEBAUE...');


INSERT INTO Documents (file_name, file_type, file_data) VALUES ('ID Card 1', 'image/jpeg', '/9j/4AAQSkZJRgABAQEAYABgAAD/2wBDAAEBAQEBAUE...');


INSERT INTO Documents (file_name, file_type, file_data) VALUES ('ID Card 2', 'image/jpeg', '/9j/4AAQSkZJRgABAQEAYABgAAD/2wBDAAEBAQEBAUE...');



INSERT INTO Documents (file_name, file_type, file_data) VALUES ('Library Card 1', 'image/jpeg', '/9j/4AAQSkZJRgABAQEAYABgAAD/2wBDAAEBAQEBAUE...');



INSERT INTO Documents (file_name, file_type, file_data) VALUES ('Library Card 2', 'image/jpeg', '/9j/4AAQSkZJRgABAQEAYABgAAD/2wBDAAEBAQEBAUE...');



INSERT INTO Documents (file_name, file_type, file_data) VALUES ('Visa 1', 'image/jpeg', '/9j/4AAQSkZJRgABAQEAYABgAAD/2wBDAAEBAQEBAUE...');



INSERT INTO Documents (file_name, file_type, file_data) VALUES ('Visa 2', 'image/jpeg', '/9j/4AAQSkZJRgABAQEAYABgAAD/2wBDAAEBAQEBAUE...');