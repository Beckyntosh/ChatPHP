CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50),
password VARCHAR(255),
reg_date TIMESTAMP
);

INSERT INTO users (email, password) VALUES ('john@example.com', '$2y$10$nA3mQvKJ9yInNc/NvXOCK.uazpF4PMkAZaSpinZyl26SxsPS_faIC'), ('jane@example.com', '$2y$10$.5dHvZ3OB34h5NHUQ4UPYOfARR0wbu-h5vGM7ynQlyO0WJ3zqM3bm'), ('alice@example.com', '$2y$10$KzvuP7y/hf.pE0j7cLPui.cqcAxLyzhDfW3w6K5AWberWJB0Zq.32'), ('bob@example.com', '$2y$10$AVGTAPwClv/LQ4y2F4D2weIA8mLXiy4X8rGlLEVfom6ybtkbOQoXa'), ('carol@example.com', '$2y$10$k0J3A0nXYfiws.L2dLaiYeRgx2kb8qMPLxuR61DtU5z3nR98ati2W'), ('dave@example.com', '$2y$10$0iAympL04J45iLpx1K1FWuiF2NYPUVfvIY8PI8hjHwSQM6gFJXTGC'), ('emily@example.com', '$2y$10$2jxbsNMgP2q/Myb94Rin5OuQT7VbzeYV9iIKURw/1sCcre0COT1lO'), ('fred@example.com', '$2y$10$U80yQHKeV3Jfwa7egcRuZus2R5qmzMliw.UrlfbeVKWNLNoEZI1Ge'), ('gina@example.com', '$2y$10$jSR7IpJ46SzAIbKKydAKl.9MIOJqXBl14Ge8cZmboBIdW3/SfA4QS'), ('harry@example.com', '$2y$10$aDm/YTxBZw3I6AI2y4H6Xes7t6LPzoOZFTU4ANYIjJCVs2RiSR1tq');
