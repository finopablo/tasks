CREATE TABLE users (

    username varchar(50) primary key,
    pwd varchar(50) not null,
    name varchar(50) not null,
    last_name varchar(50) not NULL,
    user_type enum('user','admin'),
    status enum ('confirmed', 'peding')
);

ALTER TABLE users ADD picture VARCHAR(1000);
ALTER TABLE users ADD  email VARCHAR(50);	


insert into users values ('admin','admin','Admin','Admin','admin','confirmed');
insert into users values ('user','1234','Standard','User','user','confirmed');



CREATE TABLE STATUS( id_status SMALLINT AUTO_INCREMENT PRIMARY KEY, status_name VARCHAR(50));
INSERT INTO STATUS VALUES (1,'To do'), (2, 'In Progress'), (3, 'Done');


create table tasks(id_task bigint AUTO_INCREMENT ,
                    creation_user varchar(50),
                    assigned_user varchar(50),
                    title varchar(50),
                    description varchar(50),
                    id_status smallint,
                    due_date datetime,
                    last_update datetime,
                    constraint pk_tasks PRIMARY KEY (id_task),
                    constraint fk_tasks_creation_user FOREIGN KEY (creation_user) references users(username),
                    constraint fk_tasks_assigned_user FOREIGN KEY (assigned_user) references users(username),
                    constraint fk_tasks_status foreign key (id_status) references status(id_status)
                    );

insert into tasks values (1, 'user','user','Task 1', 'Description of Task 1', 1, '2021-10-01 00:00:00', now());
insert into tasks values (2, 'user','user','Task 2', 'Description of Task 2', 1, '2021-10-01 00:00:00', now());
insert into tasks values (3, 'user','user','Task 3', 'Description of Task 3', 1, '2021-10-01 00:00:00', now());
insert into tasks values (4, 'user','user','Task 4', 'Description of Task 4', 1, '2021-10-01 00:00:00', now());
insert into tasks values (5, 'user','user','Task 5', 'Description of Task 5', 1, '2021-10-01 00:00:00', now());
insert into tasks values (6, 'user','user','Task 6', 'Description of Task 6', 1, '2021-10-01 00:00:00', now());
insert into tasks values (7, 'user','user','Task 7', 'Description of Task 7', 1, '2021-10-01 00:00:00', now());
insert into tasks values (8, 'user','user','Task 8', 'Description of Task 8', 1, '2021-10-01 00:00:00', now());
insert into tasks values (9, 'user','user','Task 9', 'Description of Task 9', 1, '2021-10-01 00:00:00', now());
insert into tasks values (10, 'user','user','Task 10', 'Description of Task 10', 1, '2021-10-01 00:00:00', now());
insert into tasks values (11, 'user','user','Task 11', 'Description of Task 11', 1, '2021-10-01 00:00:00', now());
insert into tasks values (12, 'user','user','Task 12', 'Description of Task 12', 1, '2021-10-01 00:00:00', now());
insert into tasks values (13, 'user','user','Task 13', 'Description of Task 13', 1, '2021-10-01 00:00:00', now());
