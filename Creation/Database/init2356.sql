CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(60) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO users (username, password, email) VALUES ('john_doe', '$2y$10$YxbWfO3XN9pCN/2mz6QVTuGowrsbzFfCIAJZ7mkso4NuGOF2rBjDu', 'john.doe@example.com');
INSERT INTO users (username, password, email) VALUES ('jane_smith', '$2y$10$kgzoh7r9LWUTTGcg1UGl/u6A/K4o1/alJFBEBK.hdDorFbr05PsBi', 'jane.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('bob_jones', '$2y$10$AqOJL2itKfBtn3AT2QhttuNYIYXvJRhJqq/PSUbXFt9Y9QMx9iPt6', 'bob.jones@example.com');
INSERT INTO users (username, password, email) VALUES ('alice_green', '$2y$10$9JV4tZbrOQJAdbmO.qaPnOWjTyuo2Hla4NMI8R.Mvc2sQJResTCE6', 'alice.green@example.com');
INSERT INTO users (username, password, email) VALUES ('mark_wilson', '$2y$10$a9QCeJhO6gxUrjBCPmXQTOj0zbPohRZSOdXGo9Qv/u0HtTclE/QIm', 'mark.wilson@example.com');
INSERT INTO users (username, password, email) VALUES ('amy_adams', '$2y$10$e.HkJBOqDcxrBNoIM6.i0ezbL0uMZSEV7a3q1qeVSc59HKNxDFySy', 'amy.adams@example.com');
INSERT INTO users (username, password, email) VALUES ('michael_brown', '$2y$10$UI6dznZRSV1HLz2p2qdh1uHy5Qs5RJxsMHLPE9C5pVbyjPfQ3f.SE', 'michael.brown@example.com');
INSERT INTO users (username, password, email) VALUES ('sophia_roberts', '$2y$10$4M7VallslkCPtC/JNjUaOuC1TyF9QAezfRIDLIZ14E8JLELL5wfjm', 'sophia.roberts@example.com');
INSERT INTO users (username, password, email) VALUES ('david_miller', '$2y$10$BRO5vl8Oq0G6De8ZeE587eJ3sXCG5H20mEZbh1tIe9KDdJ2rH4FcC', 'david.miller@example.com');
INSERT INTO users (username, password, email) VALUES ('laura_young', '$2y$10$tqApEOGaMmYEi2kTK1gQTeDSqgoNHP3NWtLWE65VkY5vbyzrddS3C', 'laura.young@example.com');
