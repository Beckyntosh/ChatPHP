CREATE TABLE members (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(255),
    reg_date TIMESTAMP
);

INSERT INTO members (fullname, email, password) VALUES ('John Doe', 'john@example.com', '$2y$10$fKLr9ZK6tez8tX8yWtPCfeJofh2I1wXPrKSs6ne3bMWaSby4cy0Wu'),
('Jane Smith', 'jane@example.com', '$2y$10$GKvwmIXNLvMwCEy/9x5dZOz0Mk0Kdmp2o2DgiXJaaoHTzYjKwzmKq'),
('Alice Brown', 'alice@example.com', '$2y$10$dUO14vI1Bph6Oiex3RPNYuR6rxTbF6k2pVVG1LWn7ctEfsczvcGji'),
('Bob Johnson', 'bob@example.com', '$2y$10$rL7.a7fFIaGwFLlYtH7s8ex.HyKhaBdPSqLhqu6X6Y9hOAfUp8FXK'),
('Eva Green', 'eva@example.com', '$2y$10$SY1zPmBgEU62CaF4781HJefCl4Hk/nnYg.dDuh58aX8Ysahl0QrOK'),
('Matthew White', 'matthew@example.com', '$2y$10$oi1uKxG/I4CD.Z8oXyWj4e4wfvZRLdSiq2Q7oY14EQaCV3x5CQy36'),
('Sophia Lee', 'sophia@example.com', '$2y$10$eY9rCf/9UD6WYSF6VPOQg.zXT4oHcU6n94t2VrBmZ94ZWDsdhTSCG'),
('Michael Davis', 'michael@example.com', '$2y$10$OVyEorvO.vw8lDmeTlm.FOwCxRJNf2J7/Vt3OD0mXNCi8eN2MfCF6'),
('Olivia Wilson', 'olivia@example.com', '$2y$10$yaIAnh9QYsTNEVnl5BQiJOTLzE3bCrSFcHHup/XiL2xh1DOtzyYMS'),
('Daniel Taylor', 'daniel@example.com', '$2y$10$8.EO8.kRqeXW32eMtorZxOG2LjuQWQvBZMcYiHH4gwGyM3vgSvU.2');
