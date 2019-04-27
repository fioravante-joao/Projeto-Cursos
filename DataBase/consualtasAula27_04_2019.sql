SELECT * FROM projeto_cursos.usuarios;

select count(*) from usuarios

select count(*) from usuarios where tipo_usuario_fk = 3;

select * from cursos;

select avg(preco) from cursos;  /*media de preços: 267.5*/

select min(preco) from cursos;  /*preço minimo: 50*/

select max(preco) from cursos;  /*max preco 800*/

select sum(preco) from cursos;  /*Valor Total 1070*/

select min(preco), max(preco), avg(preco), sum(preco)  from cursos

select tipo_usuario_fk, count(*) from usuarios group by tipo_usuario_fk;

/*com essa consulta é possivel alterar os nomes das colunas indicadas*/
select min(preco) as 'minimo',
max(preco) as 'maximo',
avg(preco) as média,
sum(preco) as 'total'
from cursos;

/*Inner Join*/
select u.nome as usuario, t.nome as tipo
from usuarios as u
inner join tipo_usuario as t
on u.tipo_usuario_fk = t.id_tipo_usuario;


/*Inner Join Curso x Professor*/
select u.nome as curso, t.nome as professor
from cursos as u
inner join usuarios as t
on u.professor_fk = t.id_usuario;

select * from usuarios;

/*insert curso sem professor  inserindo novo registro na tabela de cursos*/
insert into cursos(nome, descricao, preco, tag, image)
values
('Drinks Maneiros',
'Aprenda a fazer drinks sensacionais',
3000,
'drinks',
'happyhour.png');

select * from cursos;

select cursos.nome, usuarios.nome
from cursos
left join usuarios
on cursos.professor_fk = usuarios.id_usuario;

select cursos.nome, usuarios.nome
from cursos
right join usuarios
on cursos.professor_fk = usuarios.id_usuario;