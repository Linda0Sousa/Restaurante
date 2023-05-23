create database restaurante;

use restaurante;

create table perfil
(
	id int unsigned not null auto_increment,
    tipo varchar(45) not null,
    primary key (id)
);

create table estado
(
 id int unsigned not null auto_increment,
 designacao varchar(45) not null,
 primary key (id)
);

create table tipo
(
	id int unsigned not null auto_increment,
    tipo varchar(45) not null,
    primary key (id)
);

create table situacao
(
	id int unsigned not null auto_increment,
    tipo varchar(45) not null,
    primary key (id)
);

create table morada
(
id int unsigned not null auto_increment,
rua varchar(90) not null,
numPorta int not null, 
codigoPostal varchar(90) not null, 
localidade varchar(90) not null, 
pais varchar(90) not null,
primary key(id)
);


create table utilizador
(
 id int not null auto_increment,
 email varchar(90) not null,
 nome varchar(120) not null, 
 password varchar(45) not null,
 primary key (id),
 perfil_id int unsigned not null,
 situacao_id int unsigned not null,
 estado_id int unsigned not null,
 
 entidade_id int unsigned not null,

constraint fk_utilizador_perfil
foreign key (perfil_id)
references restaurante.perfil(id),

constraint fk_utilizador_estado
foreign key (estado_id)
references restaurante.estado(id),

constraint fk_utilizador_situacao
foreign key (situacao_id)
references restaurante.situacao(id)

);

create table cliente
(
id int not null auto_increment,
utilizador_id int not null,
nif int not null,
tlm varchar(90) not null,

primary key (id),

morada_id int unsigned not null, 
 
 
constraint fk_cliente_morada
foreign key (morada_id)
references restaurante.morada(id),

constraint fk_cliente_utilizador
foreign key (utilizador_id)
references restaurante.utilizador(id)
);

insert into perfil (tipo)
values('cliente'),
('admnistrador'),
('restaurante');

create table restaurante
(
    id int unsigned not null auto_increment, 
    nome varchar(45) not null,
    designacao varchar(120) not null,
    nif int not null,
    email varchar(120) not null, 
    password varchar(200) not null,
    horaAbertura time not null,
    horaFecho time not null,
    telefone varchar(20) not null, 
    tlm varchar(20) not null,
    webpage varchar(100) not null,
    nomeResponsavel varchar(90) not null,
    tlmResponsavel varchar(90) not null,
    metodoPagamento varchar(90) not null,
    segunda bool,
    terca bool,
    quarta bool,
    quinta bool,
    sexta bool,
    sabado bool,
    domingo bool,
    
    encomenda_id int unsigned not null,
    estado_id int unsigned not null,
    morada_id int unsigned  not null,
    utilizador_id int  not null,

    primary key (id),
    
    constraint fk_restaurante_utilizador
    foreign key (utilizador_id)
    references restaurante.utilizador(id),

    constraint fk_restaurante_morada
    foreign key (morada_id)
    references restaurante.morada(id),

    constraint fk_restaurante_estado
    foreign key (estado_id)
    references restaurante.estado(id)
    
);

create table feriados
(
	id int unsigned not null auto_increment,
	restaurante_id int unsigned not null,
    data date not null not null,
    
    primary key(id),
    
    constraint fk_feriados_restaurante
    foreign key (restaurante_id)
    references restaurante.restaurante(id)
);


create table metodosPagamento
(
	id int unsigned not null auto_increment,
    restaurante_id int unsigned not null,
    metodo varchar(45),
    
    primary key(id),
    
    constraint fk_metodosPagamentos_restaurante
    foreign key (restaurante_id)
	references restaurante.restaurante(id)
        
);

create table ementa
(
 id int unsigned not null auto_increment,
 restaurante_id int unsigned not null,
 tipo_id int unsigned not null,
 nome varchar (40) not null,
 descricao varchar(120) not null,
 estado bool,
 imagem varchar(120) not null,
 
 primary key (id),
 
 constraint fk_ementa_restaurante
 foreign key (restaurante_id)
 references restaurante.restaurante(id),
 
 constraint fk_ementa_tipo 
 foreign key (tipo_id)
 references restaurante.tipo(id)
);

create table encomenda
(
 id int not null auto_increment,
 dataSubmissao date,
 montante float not null,
 
 cliente_id int not null,
 restaurante_id int unsigned not null,
 situacao_id int unsigned not null,
 
 primary key(id),
 
constraint fk_encomenda_restaurante
foreign key (restaurante_id)
references restaurante.restaurante(id),

constraint fk_encomenda_situacao
 foreign key (situacao_id)
 references restaurante.situacao(id),
 
 constraint fk_encomenda_cliente
 foreign key (cliente_id)
 references restaurante.cliente(id)
);

create table encomenda_prato
(
 ementa_id int unsigned ,
 encomenda_id int not null,
 
 constraint fk_encomenda_prato_ementa
 foreign key (ementa_id)
 references restaurante.ementa(id),
 
 constraint fk_encomenda_prato_encomenda
 foreign key (encomenda_id)
 references restaurante.encomenda(id)
);