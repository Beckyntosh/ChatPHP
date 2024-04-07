CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username, password_hash) VALUES 
('john_doe', '$2y$10$xdGRCxPE5gG0SMueBcA5K.eLsprCNYtecZq7phvCmhoh2zLp1StpK'),
('alice_smith', '$2y$10$Etcj5JVa9Vni10Oj560ysuU.UZJKYy5AYlinseO.P0r9AJ8O/07mq'),
('bob_johnson', '$2y$10$OvGTNEtQus2wbUxIzUKwOUMdfm8Sa31Q7RLOsdWafBMOjrOc7yrmm'),
('sarah_fisher', '$2y$10$N9l9M5PGtukN6gHso8yKqCo9Uai5izFuwRiyS9.vO8HSGBKqzBQiW'),
('michael_brown', '$2y$10$3.kL7DwguZ416MUFB90zIuZ1eeq.FAmUxw34HCMR1A.AbtreFXLz'),
('lisa_jones', '$2y$10$lPQ7PXfxliIxtPu641bp3ujTsWbBOy6AavSRt7v2Pp.sSD9sR0IXO'),
('ryan_clark', '$2y$10$hoSkNYR6y15I4Cnqfn3psurVrZ4gTFzLIdu3.MnGBspjLMt1xMQ.q'),
('emily_white', '$2y$10$xVoLIle0Zf/0xjIWsA5HR.2QR6WiM9ZhUSoRumJEmKrfwRPPvPRZ2'),
('david_smith', '$2y$10$mNBSDQY2qn50z3HIWFL9wOS72gFgDNpUeXHKz6LnsULQZ4IO0QSoq'),
('jessica_taylor', '$2y$10$Y6rlzpt/5zCCytdPjdW4voylresQC3joRQ9mvlCJftv.GFcjjxNP6');