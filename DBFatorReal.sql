create database if not exists DBFatorReal;

use DBFatorReal;

create table if not exists Usuario(
	username varchar(30) primary key,
    senha varchar(50),
    pontuacao int default 0
);


create table if not exists Questao(
	id int auto_increment primary key,
    ano varchar (1),
    materia varchar(50),
    enunciado varchar(500),
    alternativa1 varchar(200),
    alternativa2 varchar(200),
    alternativa3 varchar(200),
    alternativa4 varchar(200),
    alternativa5 varchar(200),
    alt_correta varchar(200),
    pontuacao_valor int
);

insert into questao values
 (default,
 '1',
 'Função 1° Grau',
 'Qual é o valor de x. F(x) = x + 2 = 10:',
 '2',
 '4',
 '6',
 '8',
 '10',
 '8',
 '1'
);
insert into questao values
 (default,
 '1',
 'Função 1° Grau',
 'Qual é o valor de x. F(x) = x + 2 = 12:',
 '2',
 '4',
 '6',
 '8',
 '10',
 '10',
 '1'
);

insert into questao values
 (default,
 '1',
 'Função 1° Grau',
 'Qual é o valor de x. F(x) = x + 2 = 6:',
 '2',
 '4',
 '6',
 '8',
 '10',
 '4',
 '1'
);
create table if not exists Estado(
Usuario_username varchar(30),
Questao_id int,
estado int,
resposta varchar(50),
foreign key(Usuario_username) references Usuario(username),
foreign key(Questao_id) references Questao(id)
);

select * from Estado;
drop table Estado;

insert into Usuario values ('Gordin', 'Gordin123', 0);

select * from Usuario;
select * from Questao;