CREATE TABLE IF NOT EXISTS subscriptions (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    token VARCHAR(255) NOT NULL,
    confirmed TINYINT(1) NOT NULL DEFAULT 0,
    reg_date TIMESTAMP
);

INSERT INTO subscriptions (email, token, confirmed, reg_date) VALUES 
('example1@email.com', '54bd90872b834c9d8c6096056a6c56d7af9a596d8c2802b01', 1, '2022-10-10 10:00:00'),
('example2@email.com', '7e8c00215d1dfa512604482e9b8a28c65db12e58892b52a97', 0, '2022-10-10 10:00:00'),
('example3@email.com', 'ecf3c3e3064e545662d99b916f2e336199ca2d374e1b513461', 1, '2022-10-10 10:00:00'),
('example4@email.com', 'b11d09d8683bb7a9c1fc0d21ba01f18d63cdc9290a6434a437', 0, '2022-10-10 10:00:00'),
('example5@email.com', '725ae05cf9f5f3e1cf429295bbc1aa999e3971e5a8933882a2', 1, '2022-10-10 10:00:00'),
('example6@email.com', '9b55b3d733a0e02b6587c6db187ca94473cf517b25cba1fad4', 0, '2022-10-10 10:00:00'),
('example7@email.com', 'b1618ac606f4597c1e3ee3e09cf6c1ec35cfdac24ab3c5658f', 1, '2022-10-10 10:00:00'),
('example8@email.com', '8171f7ae8f2c41d04b92d2c0e9aa3f9f4d002ed7e8a579c70f', 0, '2022-10-10 10:00:00'),
('example9@email.com', 'f0b7c1d4bec0d1303e90d2d9c068e3c94a785abcff663505bb', 1, '2022-10-10 10:00:00'),
('example10@email.com', 'f003f44e9cdca3023f876e3c2ef77c3e89a5e842d4eb4293a5', 0, '2022-10-10 10:00:00');
