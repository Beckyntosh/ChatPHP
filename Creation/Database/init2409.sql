CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    trial_start DATE,
    subscription_end DATE
);

INSERT INTO users (username, email, password, trial_start, subscription_end) VALUES ('JohnDoe', 'johndoe@example.com', '$2y$10$Yj6U3VhZkGzXPO3vWOdLR.3hEMDUViwkvS2RIEVgaPB8tKHRGso9a', '2022-10-01', '2022-11-01');
INSERT INTO users (username, email, password, trial_start, subscription_end) VALUES ('JaneSmith', 'janesmith@example.com', '$2y$10$7nvAPNliYQHf1PASJpubeunokmAISz6dF3GM5JHtJ.u9QgxNuc60K', '2022-10-02', '2022-11-02');
INSERT INTO users (username, email, password, trial_start, subscription_end) VALUES ('Alice123', 'alice123@example.com', '$2y$10$Yj6U3VhZkGzXPO3vWOdLR.3hEMDUViwkvS2RIEVgaPB8tKHRGso9a', '2022-10-03', '2022-11-03');
INSERT INTO users (username, email, password, trial_start, subscription_end) VALUES ('Bob456', 'bob456@example.com', '$2y$10$7nvAPNliYQHf1PASJpubeunokmAISz6dF3GM5JHtJ.u9QgxNuc60K', '2022-10-04', '2022-11-04');
INSERT INTO users (username, email, password, trial_start, subscription_end) VALUES ('Eve789', 'eve789@example.com', '$2y$10$Yj6U3VhZkGzXPO3vWOdLR.3hEMDUViwkvS2RIEVgaPB8tKHRGso9a', '2022-10-05', '2022-11-05');
INSERT INTO users (username, email, password, trial_start, subscription_end) VALUES ('PeterPan', 'peterpan@example.com', '$2y$10$7nvAPNliYQHf1PASJpubeunokmAISz6dF3GM5JHtJ.u9QgxNuc60K', '2022-10-06', '2022-11-06');
INSERT INTO users (username, email, password, trial_start, subscription_end) VALUES ('MaryMoon', 'marymoon@example.com', '$2y$10$Yj6U3VhZkGzXPO3vWOdLR.3hEMDUViwkvS2RIEVgaPB8tKHRGso9a', '2022-10-07', '2022-11-07');
INSERT INTO users (username, email, password, trial_start, subscription_end) VALUES ('GeorgeOrwell', 'george@example.com', '$2y$10$7nvAPNliYQHf1PASJpubeunokmAISz6dF3GM5JHtJ.u9QgxNuc60K', '2022-10-08', '2022-11-08');
INSERT INTO users (username, email, password, trial_start, subscription_end) VALUES ('GraceHopper', 'grace@example.com', '$2y$10$Yj6U3VhZkGzXPO3vWOdLR.3hEMDUViwkvS2RIEVgaPB8tKHRGso9a', '2022-10-09', '2022-11-09');
INSERT INTO users (username, email, password, trial_start, subscription_end) VALUES ('SteveJobs', 'steve@example.com', '$2y$10$7nvAPNliYQHf1PASJpubeunokmAISz6dF3GM5JHtJ.u9QgxNuc60K', '2022-10-10', '2022-11-10');
