CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  loyalty_member TINYINT NOT NULL
);

INSERT INTO users (username, email, password, loyalty_member) VALUES
('JohnDoe', 'john.doe@example.com', '$2y$10$lIi2siPfWoDnI8T9x1VK2eeW34zlfmxkMt5Ltk.zypM/Wrx/YyEm2', 1),
('JaneSmith', 'jane.smith@example.com', '$2y$10$5cgHaxI/6G3Z3nhpKmU8Be3cgFktZoNsKnEIBvd/GME2IXRd8vNnq', 0),
('DavidBrown', 'david.brown@example.com', '$2y$10$DdtM.t0.5XRvVXEv.ZR.Du46yFvJ9xoDtU93tD0ky9bAS14gq7Fe2', 1),
('EmilyWilson', 'emily.wilson@example.com', '$2y$10$yPzqnDRgGkBygYwPOrpeYe6poEQhb.roy.kf/jtP44xObR6Uv3f7O', 0),
('MichaelJohnson', 'michael.johnson@example.com', '$2y$10$1.4iH.ZzSfSGVmL5eAaXGe3EtanCPSlvYf.UMoEY.eDt2E/dyLICA', 1),
('SarahLee', 'sarah.lee@example.com', '$2y$10$nhOuJnlWMrTtkwOPl6eBFuV4ihB4SRZCfVYnJIM2AD8xz8twYUj16', 1),
('KevinDavis', 'kevin.davis@example.com', '$2y$10$Y2DWmeZH27ORQJ/PH17MQOWXW9.kW2AQbrQ8s1zCCdnIglNWSPd2e', 0),
('LauraTaylor', 'laura.taylor@example.com', '$2y$10$p6HYyLtJLz51ougPZpHZMuPz6fidgqBqltBH50b64iV1X/X9R8cy2', 1),
('DanielMartinez', 'daniel.martinez@example.com', '$2y$10$hG/3Z7LH0INoQZbwnMFi4udI1/7L0pDciKysmiTIQpOwB6CedBl7u', 0),
('AmandaGarcia', 'amanda.garcia@example.com', '$2y$10$VH4p1Vf4RNvHed9jeAStRet6ZWINaCIFPn7XP0p0It0GRkdv.FG5a', 1);
