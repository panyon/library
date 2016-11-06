create table bookinfo(
	id int primary key auto_increment,
	book_name varchar(20) not null,  #图书类别
    book_author varchar(90) not null,  #书名
	recommend int not null,  #作者
	book_category int not null,  #出版社
	book_desc varchar(100) not null   #描述
);

