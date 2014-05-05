
create table login
(
     USN varchar(10) primary key,
     name varchar(20),
     email varchar(20),
     password varchar(10),
     comment char(4) default 'NULL'
);

