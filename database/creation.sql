create table Users
(
    id int auto_increment,
    email varchar(255),
    pass_hash varchar(255),
    creation_date timestamp,
    constraint PK_USER primary key (id),
    constraint UQ_EMAIL_USER unique (email)
);

create table ShoppingList
(
    id int auto_increment,
    name varchar(255),
    owner int,
    creation_date timestamp,
    constraint PK_SHOPPING_LIST primary key (id),
    constraint FK_SHOPPING_LIST_OWNER foreign key (owner) references Users(id)
);

create table ListsRows
(
    id int auto_increment,
    qty int,
    info varchar(255),
    list_id int,
    owner int,
    constraint PK_PRODUCTS_LINES primary key (id),
    constraint FK_PRODUCT_LINES_OWNER foreign key (owner) references Users(id),
    constraint FK_PRODUCT_LINES_LIST foreign key (list_id) references ShoppingList(id)
);

create table Privileges
(
    id int auto_increment,
    user_id int,
    shopping_list_id int,
    privilege int,
    constraint PK_PRIVILEGES primary key (id),
    constraint UQ_PRIVILEGES_NM unique (user_id, shopping_list_id),
    constraint FK_PRIVILEGES_USER foreign key (user_id) references Users(id),
    constraint FK_PRIVILEGES_SHOPPING_LIST foreign key (shopping_list_id) references ShoppingList(id)
)