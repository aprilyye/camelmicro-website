/* TODO: create tables */

/* TODO: initial seed data */
CREATE TABLE `applications` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`name`	TEXT,
	`image`	TEXT
);

INSERT INTO applications (name,image) VALUES ('Automotive','1.jpg');
INSERT INTO applications (name,image) VALUES ('Industrial','2.jpg');
INSERT INTO applications (name,image) VALUES ('Military and Aerospace','3.jpg');
INSERT INTO applications (name,image) VALUES ('Power Supply','4.jpg');
INSERT INTO applications (name,image) VALUES ('Computing and Peripherals','5.jpg');
INSERT INTO applications (name,image) VALUES ('LED Lighting','6.jpg');
INSERT INTO applications (name,image) VALUES ('Consumer','7.jpg');
INSERT INTO applications (name,image) VALUES ('Medical','1.jpg');
INSERT INTO applications (name,image) VALUES ('Portable and Wireless','2.jpg');
INSERT INTO applications (name,image) VALUES ('Motor Control','3.jpg');
INSERT INTO applications (name,image) VALUES ('Networking and Telecommunications','4.jpg');


CREATE TABLE blog (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
  `Title` TEXT,
	`Date`	TEXT,
	`Text` TEXT

);

INSERT INTO blog (Title, Date, Text) VALUES ('Sample Blog Post', 'April 2018', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

CREATE TABLE Accounts (
id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
username TEXT NOT NULL UNIQUE,
password TEXT NOT NULL,
Name TEXT NOT NULL,
privilege TEXT NOT NULL,
session	BOOLEAN 
);

INSERT INTO Accounts (username, password, Name, privilege) VALUES ('bill.xie', '$2y$10$VXmgdmza.DZpY38oxORwieWHmmBvZeOhWtZ8/FGzRZOhFaI252luK', 'Bill Xie', 'admin');
/* password is info2300secure */
INSERT INTO Accounts (username, password, Name, privilege) VALUES ('john.ye', '$2y$10$T5.xRV/whaxKJ/p2Q9PZ4.TRL9RVIQCJgsKJikFcS7qqhkgDI.WXS', 'John Ye', 'admin');
/* password is camelmicrosecure */
