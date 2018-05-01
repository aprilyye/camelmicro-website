/* TODO: create tables */

/* TODO: initial seed data */
CREATE TABLE `applications` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`name`	TEXT,
	`image`	TEXT
);

INSERT INTO applications (name) VALUES ('Automotive');
INSERT INTO applications (name) VALUES ('Industrial');
INSERT INTO applications (name) VALUES ('Military and Aerospace');
INSERT INTO applications (name) VALUES ('Power Supply');
INSERT INTO applications (name) VALUES ('Computing and Peripherals');
INSERT INTO applications (name) VALUES ('LED Lighting');
INSERT INTO applications (name) VALUES ('Consumer');
INSERT INTO applications (name) VALUES ('Medical');
INSERT INTO applications (name) VALUES ('Portable and Wireless');
INSERT INTO applications (name) VALUES ('Motor Control');
INSERT INTO applications (name) VALUES ('Networking and Telecommunications');


CREATE TABLE blog (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
  `Title` TEXT,
	`Date`	TEXT,
	`Text` TEXT

);

INSERT INTO blog (Title, Date, Text) VALUES ('Sample Blog Post', 'April 2018', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
