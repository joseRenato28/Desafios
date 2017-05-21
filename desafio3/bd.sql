create database desafio3;
use desafio3;

create table if not exists users
(
	id_user int primary key auto_increment,
    name_user varchar (250) not null,
    email_user varchar (250) not null,
    password_user varchar (250) not null,
    create_on_user date
);

create table if not exists images
(
	id_image int primary key auto_increment,
    route_image varchar (250) not null,
    title_image varchar (250) not null,
    create_on_image date,
    create_by_user int,
    foreign key(create_by_user) references users(id_user)
);

create table if not exists main_text
(
	id_main_text int primary key auto_increment,
    main_text varchar (250) not null,
    color_text varchar (250),
	create_on_text date,
    create_by_user int,
    foreign key(create_by_user) references users(id_user)
);

insert into users(name_user, email_user, password_user, create_on_user)
VALUES ('admin', 'admin@admin.com', '1234', '2017-05-18');

insert into images (route_image, title_image, create_on_image, create_by_user)
VALUE ('http://10.0.0.101/trampo/desafio3/assets/img/img1.png', 'title', '2017-05-18', 1);

insert into main_text(main_text, color_text, create_on_text, create_by_user) VALUE ('HELLO PLANET', 'white', '2017-05-18', 1);


