USE team17;

CREATE TABLE Sex (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

    type VARCHAR(45) NOT NULL,

    UNIQUE KEY unique_name (type)
);

CREATE TABLE Location (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

    x FLOAT NOT NULL,
    y FLOAT NOT NULL
);

CREATE TABLE LocationDetail (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

    addr VARCHAR(255) NOT NULL,
    si VARCHAR(255) NOT NULL,
    gu VARCHAR(255) NOT NULL,

    locationId INT NOT NULL,

    FOREIGN KEY (locationId) REFERENCES Location(id) ON DELETE CASCADE ON UPDATE CASCADE,

    UNIQUE KEY unique_name (addr)
);

CREATE TABLE User (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

    email VARCHAR(255) NOT NULL,
    nickname VARCHAR(45) NOT NULL,
    password VARCHAR(255) NOT NULL,
    age INT NOT NULL,

    locationId INT NOT NULL,
    sexId INT NOT NULL,

    FOREIGN KEY (locationId) REFERENCES Location(id),
    FOREIGN KEY (sexId) REFERENCES Sex(id)
);

CREATE UNIQUE INDEX user_email_uq ON User(email);

CREATE TABLE Hospital (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

    name VARCHAR(100) NOT NULL,
    phoneNumber VARCHAR(45),
    url TEXT,
    kindnessAvg FLOAT NOT NULL DEFAULT 0.0,
    speedAvg FLOAT NOT NULL DEFAULT 0.0,
    cleanlinessAvg FLOAT NOT NULL DEFAULT 0.0,

    locationId INT NOT NULL,

    FOREIGN KEY (locationId) REFERENCES Location(id)
);

CREATE TABLE Dibs (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

    createdAt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

    userId INT NOT NULL,
    hospitalId INT NOT NULL,

    FOREIGN KEY (userId) REFERENCES User(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (hospitalId) REFERENCES Hospital(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Category (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

    name VARCHAR(45) NOT NULL,
    description TEXT,

    UNIQUE KEY unique_name (name)
);

CREATE TABLE Vaccine (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

    name VARCHAR(45) NOT NULL,

    categoryId INT NOT NULL,
    sexId INT,

    FOREIGN KEY (categoryId) REFERENCES Category(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (sexId) REFERENCES Sex(id),

    UNIQUE KEY unique_name (name)
);

CREATE TABLE Price (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

    cost INT NOT NULL,

    hospitalId INT NOT NULL,
    categoryId INT NOT NULL,
    vaccineId INT NOT NULL,

    FOREIGN KEY (hospitalId) REFERENCES Hospital(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (categoryId) REFERENCES Category(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (vaccineId) REFERENCES Vaccine(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Review (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

    content TEXT NOT NULL,
    likeCount INT NOT NULL DEFAULT 0,
    createdAt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    modifiedAt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    hospitalId INT NOT NULL,
    userId INT NOT NULL,
    vaccineId INT NOT NULL,

    FOREIGN KEY (hospitalId) REFERENCES Hospital(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (userId) REFERENCES User(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (vaccineId) REFERENCES Vaccine(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Rate (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

    kindness INT NOT NULL,
    speed INT NOT NULL,
    cleanliness INT NOT NULL,

    hospitalId INT NOT NULL,
    vaccineId INT NOT NULL,
    reviewId INT NOT NULL,

    FOREIGN KEY (hospitalId) REFERENCES Hospital(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (vaccineId) REFERENCES Vaccine(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (reviewId) REFERENCES Review(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Likes (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

    reviewId INT NOT NULL,
    userId INT NOT NULL,

    FOREIGN KEY (reviewId) REFERENCES Review(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (userId) REFERENCES User(id) ON DELETE CASCADE ON UPDATE CASCADE
);


