CREATE TABLE restaurant_reservations(
    id INT NOT NULL AUTO_INCREMENT,
    fullname VARCHAR(80) NOT NULL,
    persons int NOT NULL,
    phone VARCHAR(14) NOT NULL,
    email VARCHAR(100) NOT NULL,
    time DATETIME DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY(id)
);