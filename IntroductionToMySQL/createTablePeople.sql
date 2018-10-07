use phpsoftuni;

create table people (
   id int AUTO_INCREMENT PRIMARY key,
   name VARCHAR(200) not null,
   picture mediumblob
  ,height float(6,2)
  ,weight float(6,2)
  ,gender enum ('m','f') not null
  ,birthdate datetime not null
  ,biography text
);

INSERT INTO people(id,name,gender,birthdate,biography)
VALUES(1,'kamen','f','2008-11-11','dasssssssssssssss')
  ,(2,'aakamen','f','2008-11-11','dasssssssssssssss')
  ,(3,'sakamen','f','2008-11-11','dasssssssssssssss')
  ,(4,'aakamen','f','2008-11-11','dasssssssssssssss')
  ,(5,'asdkamen','f','2008-11-11','dasssssssssssssss');