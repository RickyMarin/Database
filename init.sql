CREATE TABLE Topping (
	tid int(10) NOT NULL AUTO_INCREMENT, 
	tname varchar(30) NOT NULL,
	PRIMARY KEY (tid),
	UNIQUE (tname));

CREATE TABLE Users(
	uemail varchar(256) NOT NULL, 
	uname varchar(30) NOT NULL, 
	upass varchar(256) NOT NULL, 
	uaddrstr varchar(30) NOT NULL, 
	uaddrcity varchar(20) NOT NULL, 
	uaddrstate varchar(14) NOT NULL, 
	uaddrzip int(5) NOT NULL,
	upoints int(6) NOT NULL DEFAULT 0 CHECK (upoints >= 0),
    PRIMARY KEY (uemail));

CREATE TABLE Orders (
	orderNum int(10) NOT NULL AUTO_INCREMENT, 
	uemail varchar(40) NOT NULL,
    tid int(10) NOT NULL,
    quantity varchar(7) NOT NULL,
	deliver int(1) NOT NULL DEFAULT 1 CHECK (deliver = 0 OR deliver = 1), 
	cost int(3) NOT NULL DEFAULT 15 CHECK (cost >= 0),
	orderStatus int(1) NOT NULL DEFAULT 0 CHECK (orderStatus = 0 OR orderStatus = 1),
	PRIMARY KEY (orderNum), 
	FOREIGN KEY (uemail) REFERENCES Users(uemail),
    FOREIGN KEY (tid) REFERENCES Topping(tid));


CREATE TABLE UsersPhone (
	uemail varchar(40) NOT NULL, 
    uphone varchar(10) NOT NULL CHECK (length(uphone) = 10), 
    numtype varchar(10) NOT NULL,
    PRIMARY KEY (uemail, uphone), 
    FOREIGN KEY (uemail) REFERENCES Users(uemail));

CREATE TABLE Request (
    rid int(10) NOT NULL AUTO_INCREMENT, 
    uemail varchar(40) NOT NULL, 
    rnote varchar(200) NOT NULL, 
    PRIMARY KEY (rid),
    FOREIGN KEY (uemail) REFERENCES Users(uemail));

CREATE TABLE Location (
	lid int(10) NOT NULL AUTO_INCREMENT, 
	laddrstr varchar(30) NOT NULL, 
	laddrcity varchar(20) NOT NULL, 
	laddrstate varchar(14) NOT NULL, 
	laddrzip varchar(5) NOT NULL,
    PRIMARY KEY (lid));

CREATE TABLE Employee (
    eid int(10) NOT NULL AUTO_INCREMENT, 
    lid int(10) NOT NULL,
    ename varchar(30) NOT NULL, 
    job varchar(15) NOT NULL, 
    PRIMARY KEY (eid),
    FOREIGN KEY (lid) REFERENCES Location(lid));

CREATE TABLE Cashier (
    eid int(10) NOT NULL, 
    exp int(10) NOT NULL CHECK (exp >= 0), 
    PRIMARY KEY (eid),
    FOREIGN KEY (eid) REFERENCES Employee(eid));

CREATE TABLE Driver (
    eid int(10) NOT NULL, 
    ephone varchar(10) NOT NULL CHECK (length(ephone) = 10), 
    PRIMARY KEY (eid),
    FOREIGN KEY (eid) REFERENCES Employee(eid)); 

CREATE TABLE Delivers (
	eid int(10) NOT NULL,
	orderNum int(10) NOT NULL,
    PRIMARY KEY (orderNum), 
    FOREIGN KEY (orderNum) REFERENCES Orders(orderNum), 
    FOREIGN KEY (eid) REFERENCES Employee(eid));