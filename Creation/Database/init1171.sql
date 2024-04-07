CREATE TABLE financial_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    report_name VARCHAR(255) NOT NULL,
    report TEXT NOT NULL
);

INSERT INTO financial_reports (report_name, report) VALUES ('Q2 earnings report for Tech Company A 2023', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
('Q2 earnings report for Tech Company B 2023', 'Nulla facilisi. Fusce tincidunt, leo ut ornare placerat, nibh neque vehicula metus, vel mollis diam turpis nec ex.'),
('Q2 earnings report for Tech Company C 2023', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.'),
('Q2 earnings report for Tech Company D 2023', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;'),
('Q2 earnings report for Tech Company E 2023', 'Suspendisse potenti. Phasellus non mi sed erat consectetur vehicula.'),
('Q2 earnings report for Tech Company F 2023', 'Integer bibendum justo ac justo eleifend, sed scelerisque purus volutpat.'),
('Q2 earnings report for Tech Company G 2023', 'Duis ac tellus id turpis suscipit lacinia eget a risus.'),
('Q2 earnings report for Tech Company H 2023', 'Maecenas non metus eget lectus ullamcorper consectetur.'),
('Q2 earnings report for Tech Company I 2023', 'Etiam auctor velit a nisi euismod, nec sodales purus aliquet.'),
('Q2 earnings report for Tech Company J 2023', 'Aenean fermentum viverra libero, et pretium dolor efficitur at.');
