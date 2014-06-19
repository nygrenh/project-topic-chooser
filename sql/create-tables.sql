CREATE TABLE account
(
  id serial primary key,
  name varchar(60),
  admin boolean,
  password varchar(60)
);

CREATE TABLE course
(
  id serial primary key,
  name varchar(60)
);

CREATE TABLE topic
(
  id serial primary key,
  name varchar(60),
  course_id integer references course(id) on delete cascade on update cascade,
  summary varchar(60),
  description varchar(1000)
);

CREATE TABLE project
(
  id serial primary key,
  topic_id integer references topic(id) on delete cascade on update cascade,
  student varchar(60),
  hours integer,
  grade integer
);

CREATE TABLE coursestoaccounts
(
  account_id integer references account(id) on delete cascade on update cascade,
  course_id integer references course(id) on delete cascade on update cascade
);
