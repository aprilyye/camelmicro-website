CREATE TABLE Accounts (
ID INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
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

CREATE TABLE `applications` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`name`	TEXT,
	`image`	TEXT
);

INSERT INTO applications (name,image) VALUES ('Automotive','auto1.png');
INSERT INTO applications (name,image) VALUES ('Automotive','auto2.png');
INSERT INTO applications (name,image) VALUES ('Automotive','auto3.png');
INSERT INTO applications (name,image) VALUES ('Automotive','auto4.png');
INSERT INTO applications (name,image) VALUES ('Automotive','auto5.png');
INSERT INTO applications (name,image) VALUES ('Automotive','auto6.png');
INSERT INTO applications (name,image) VALUES ('Industrial','i2.png');
INSERT INTO applications (name,image) VALUES ('Consumer','c1.png');
INSERT INTO applications (name,image) VALUES ('Consumer','c2.png');
INSERT INTO applications (name,image) VALUES ('Medical','m1.png');
INSERT INTO applications (name,image) VALUES ('Motor','mc1.jpg');
INSERT INTO applications (name,image) VALUES ('Motor','mc2.jpg');

CREATE TABLE blog (
	ID1	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	Title TEXT,
	`Date`	TEXT,
	Name TEXT,
	`Text` TEXT,
	FOREIGN KEY (Name) REFERENCES Accounts(Name)
);

INSERT INTO blog (ID1, Title, Date, Name, Text) VALUES (1, 'Sample Blog Post', 'April 2017', 'Bill Xie', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO blog (ID1, Title, Date, Name, Text) VALUES (2, 'Sample Blog Post', 'September 2017', 'Bill Xie', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO blog (ID1, Title, Date, Name, Text) VALUES (3, 'Sample Blog Post', 'December 2017', 'Bill Xie', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');




CREATE TABLE Comments (
	ID2	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	User TEXT NOT NULL,
	Time TEXT,
  Comment TEXT NOT NULL
);

INSERT INTO Comments (ID2, User, Time, Comment) VALUES (1, 'Mark', 'April 15th, 2018 03:30 pm', 'CamelMicro rocks!');
INSERT INTO Comments (ID2, User, Time, Comment) VALUES (2, 'David', 'April 15th, 2018 03:39 pm', 'CamelMicro is amazing!');
INSERT INTO Comments (ID2, User, Time, Comment) VALUES (3, 'Ashley', 'April 19th, 2018 05:19 pm', 'I like this site!');
INSERT INTO Comments (ID2, User, Time, Comment) VALUES (4, 'Paul', 'May 2nd, 2018 11:19 pm', 'So sleepy...');


CREATE TABLE Post_Comments (
	count	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
  ID1 INTEGER NOT NULL,
  ID2 INTEGER NOT NULL
);

INSERT INTO Post_Comments (count, ID1, ID2) VALUES (1, 1, 1);
INSERT INTO Post_Comments (count, ID1, ID2) VALUES (2, 1, 2);
INSERT INTO Post_Comments (count, ID1, ID2) VALUES (3, 2, 3);
INSERT INTO Post_Comments (count, ID1, ID2) VALUES (4, 3, 4);
