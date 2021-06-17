CREATE TABLE userInfo(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    userName VARCHAR(50) UNIQUE,
    pass VARCHAR(50)
);
CREATE TABLE pat(
    id varchar(13) PRIMARY KEY,
    text varchar(280),
    likes INT,
    userName varchar(50)
);
