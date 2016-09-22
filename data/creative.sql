CREATE TABLE users(
	ID INT PRIMARY KEY AUTO_INCREMENT,
	name CHAR(75),
	email CHAR(75),
	username CHAR(75),
	password CHAR(75)
)ENGINE=InnoDB;

INSERT INTO users

	VALUES
	(NULL,'Katelyn','hello@katelynhare.com','ktrxs','ktrxs'),
	(NULL,'Admin','katelyn@katelynhare.com','boss','boss'),
	(NULL, 'Random User', 'hello@katelynhare.com', 'user', 'user');

CREATE TABLE admin(
	ID INT PRIMARY KEY AUTO_INCREMENT,
	name CHAR(75),
	email CHAR(75),
	username CHAR(75),
	password CHAR(75)
)ENGINE=InnoDB;

INSERT INTO users

VALUES
	(NULL,'Admin','katelyn@katelynhare.com','boss','boss');
	

CREATE TABLE profile(
	id int PRIMARY KEY auto_increment, 
	about TEXT,
	website CHAR(75),
	username CHAR(25),
	picture CHAR(75)
)ENGINE=InnoDB;

INSERT INTO profile
VALUES
(NULL, "Omg I love the summer and stuff", "katelynhare.com", "ktrxs", "flower.jpg"),
(NULL, "", "", "user", "pro3032213075818.jpg"),
(NULL, "", "", 'boss', 'logo.png');
 
CREATE TABLE stream(
	id int primary key auto_increment,
	username CHAR(75),
	pic CHAR(75),
	cap text,
	date TIMESTAMP
)ENGINE=InnoDB;

INSERT INTO stream
VALUES
(NULL, "ktrxs", "flower.jpg", "Beaut.", 20140126165257),
(NULL, "user","pic2CAM00510.jpg","A day in Pittsburgh", 20140126170236),
(NULL, "ktrxs", "pic2beauty.png","LOVE IT!", 20140126180236);

CREATE TABLE comments(
	id int primary key auto_increment,
	username CHAR (25),
	picture CHAR(75),
	username2 CHAR(25),
	comment text
)ENGINE=InnoDB;

INSERT INTO comments
VALUES
(NULL, "ktrxs", "pic2CAM00510.jpg","user", "very pretty");

/*CREATE TABLE friends(
	id int primary key auto_increment,
)ENGINE=InnoDB;

INSERT INTO friends
VALUES
();*/

SELECT * FROM users;

