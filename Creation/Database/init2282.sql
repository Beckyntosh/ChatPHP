CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    activation_code VARCHAR(255) NOT NULL,
    is_active BOOLEAN NOT NULL DEFAULT FALSE,
    UNIQUE(email)
);

INSERT INTO users (username, email, password, activation_code, is_active) VALUES 
("JohnDoe", "johndoe@example.com", "$2y$10$JdmMe9JIYZj5m3MetaarWOPUc7cTWhABQVNOjPZTBFxIDdzE/bwde", "abc123", 1),
("JaneSmith", "janesmith@example.com", "$2y$10$5tULWGUvZSmcW9fr7ZoWoOO2Nk1sPee4W0rF4IU4xCCURZKFITNPa", "def456", 0),
("AliceD", "aliced@example.com", "$2y$10$PnOz9AOCg.hK5txZLMKN.Opa988P53d1vKX48tz9PfQJjctl2abbq", "ghi789", 1),
("BobJohnson", "bjohnson@example.com", "$2y$10$OMtN1CZah6kRQzK4gZq6w.nzn93Bqfq9AQJ.fK5HymH4PamEpSaFS", "jkl012", 0),
("SarahM", "sarahm@example.com", "$2y$10$hOQ7LO4LxQeO2DTfeRj8q.vQAdIeCIwLpM.4oCL1FHZmpeSQR.gjy", "mno345", 0),
("MaxT", "maxt@example.com", "$2y$10$zbbYFmbewPf8Bo1/aMIZvuiI/oaSUjY.WFT/TvT2tek6bK8j54Dwm", "pqr678", 1),
("EvaK", "evak@example.com", "$2y$10$MbzW0uyfa.Lq1XpfdE9XsuJmK.FYToF9Jm7X2t8K6nLntP9OwIuoi", "stu901", 1),
("DavidW", "davidw@example.com", "$2y$10$i5yTgsXX.LWyu4Tjm2qIQ.ZkUXmIjy5OKEHf2aa9eq/78jqPE9VV.", "vwx234", 0),
("OliviaR", "oliviar@example.com", "$2y$10$ifkU9Khmh8oeyFYzE8gcMu0lCStKTkPspXqIn8121qBybiP0DcVgi", "yza567", 1),
("MiaC", "miac@example.com", "$2y$10$0So1NuA0uJFjjz7n9bQwFOKmKyu0mYg4GL3FDjYcT2r4sThRN4OkO", "bcd890", 0);
