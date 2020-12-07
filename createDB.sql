create table article(
    id INT(11) NOT NULL AUTO_INCREMENT primary key,
    name varchar(50) not null,
    description text not null,
    image varchar(100) not null,
    unitPrice decimal(10,0) not null,
    category int(10) not null,
    existences int(10) DEFAULT 5,
    reorder int(10) DEFAULT 5,
    sold int(10) not null
);

create table categories(
    id INT(10) NOT NULL AUTO_INCREMENT primary key,
    name varchar(50) not null
);
-- insertar categorias
insert into categories (name) values ('General');
insert into categories (name) values ('Electronica');
insert into categories (name) values ('Electrodomesticos');
insert into categories (name) values ('Comestibles');

create table customers(
    id INT(10) NOT NULL AUTO_INCREMENT primary key,
    firstName varchar(40) not null,
    lastName varchar(40) not null,
    email varchar(30) not null,
    phone varchar(15) not null,
    comentary text not null
);

create table orderdetails(
    id INT(11) NOT NULL AUTO_INCREMENT primary key,
    order_id int(11) not null,
    article_id int(11) not null,
    price decimal(10,0) not null,
    quantity int(11) not null,
    status int(11) not null DEFAULT 1
);

create table orders(
    id INT(10) NOT NULL AUTO_INCREMENT primary key,
    customer int(11) not null,
    total decimal(10,0) not null,
    date date not null,
    status int(11) not null DEFAULT 1
);

create table users(
    id INT(11) NOT NULL AUTO_INCREMENT primary key,
    name varchar(50) not null,
    clv varchar(150) not null,
    status int(11) not null DEFAULT 1
);
-- insertar usuarios
insert into users (name, clv) values ('admin', 'admin');
insert into users (name, clv) values ('gerente1', 'gerente1');
insert into users (name, clv) values ('gerente2', 'gerente2');