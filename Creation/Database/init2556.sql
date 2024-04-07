CREATE TABLE IF NOT EXISTS widgets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL, 
    allowed_positions VARCHAR(255) NOT NULL
);

-- Create user_dashboards table
CREATE TABLE IF NOT EXISTS user_dashboards (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    widget_id INT NOT NULL,
    position VARCHAR(255) NOT NULL,
    FOREIGN KEY (widget_id) REFERENCES widgets(id) ON DELETE CASCADE
);

-- Insert values into widgets table
INSERT INTO widgets (name, allowed_positions) VALUES
('Weather Widget', 'Top, Left, Right, Bottom'),
('News Widget', 'Top, Left'),
('Task Widget', 'Top, Right'),
('Calendar Widget', 'Bottom'),
('Stock Widget', 'Left, Right'),
('Reminder Widget', 'Right'),
('To-Do List Widget', 'Top, Bottom'),
('Clock Widget', 'Left, Bottom'),
('Quote of the Day Widget', 'Top'),
('Fitness Tracker Widget', 'Bottom');
