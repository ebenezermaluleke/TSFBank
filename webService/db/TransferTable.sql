CREATE TABLE Transfer(
T_ID int(10) not null  AUTO_INCREMENT,
T_Amount float not null,
T_Date datetime not null,
C_ID int(10),
PRIMARY KEY(T_ID),
FOREIGN KEY(C_ID) REFERENCES Customer(C_ID)
);