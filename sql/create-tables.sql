CREATE TABLE account
(
  id serial primary key,
  name varchar(20),
  admin boolean,
  password varchar(20)
);

CREATE TABLE course
(
  id serial primary key,
  name varchar(20)
);

CREATE TABLE topic
(
  id serial primary key,
  name varchar(20),
  course_id integer references course(id) on delete cascade on update cascade,
  summary varchar(20),
  description varchar(1000)
);

CREATE TABLE project
(
  id serial primary key,
  topic_id integer references topic(id) on delete cascade on update cascade,
  student varchar(20),
  hours integer,
  grade integer
);

CREATE TABLE coursestoaccounts
(
  account_id integer references account(id) on delete cascade on update cascade,
  course_id integer references course(id) on delete cascade on update cascade
);
