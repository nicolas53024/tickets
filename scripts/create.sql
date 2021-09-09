CREATE TABLE if not exists roles (
	id SERIAL NOT NULL ,
	nombre   VARCHAR NOT NULL,
	descripcion  VARCHAR NOT NULL,
	PRIMARY KEY (id)
);

insert into roles(nombre,descripcion)VALUES('admin','Administrador de sistema');
insert into roles(nombre,descripcion)VALUES('user','Usuario regular');
insert into roles(nombre,descripcion)VALUES('agente','Agente de soporte');

CREATE TABLE users (
	id SERIAL NOT NULL ,
	nombre   VARCHAR NOT NULL,
	email  VARCHAR NOT NULL,
	password VARCHAR NOT NULL,
	role_id integer NOT NULL,
	creado timestamp NOT NULL,
	modificado timestamp NOT NULL,
	estado SMALLINT NOT NULL DEFAULT 1,
	PRIMARY KEY (id),
	CONSTRAINT "fk_role_id" FOREIGN KEY ("role_id") REFERENCES "public"."roles" ("id") ON UPDATE NO ACTION ON DELETE NO ACTION
)
;

CREATE UNIQUE INDEX email ON users (email);

insert into users 
(nombre,email,PASSWORD,role_id,creado,modificado)

  VALUES('admin',
  'admin@system.com',
  '$argon2i$v=19$m=65536,t=4,p=1$My45RTdIQTN2TjFKanlmdw$gceecjlMvRCtnsFMXiYcjIxtOkKUZyJ1ucLFJ/fmxOw',
  1,
'2021-09-06 15:28:40',
'2021-09-06 15:28:40')