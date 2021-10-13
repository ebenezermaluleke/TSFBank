CREATE TABLE Transaction(
T_id int(10) not null,
T_sender varchar(255) not null,
T_receiver varchar(255) not null,
T_amount float not null,
T_date datetime not null Default current_timestamp(),
PRIMARY KEY(t_id)


);