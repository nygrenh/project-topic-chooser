insert into account(name, admin, password)
  values('smith', TRUE, 'password');

insert into account(name, admin, password)
  values('johnson', false, 'gary');

insert into account(name, admin, password)
  values('Williams', false, 'test');

insert into course(name)
  values('Database Application');

insert into topic(name, course_id, summary, description)
  values('Topic', 1, 'summary', 'something');

insert into project(topic_id, student, hours, grade)
  values(1, 'Student', 300, 3);

insert into project(topic_id, student, hours, grade)
    values(1, 'Another Student', 7, 5);

insert into coursestoaccounts(account_id, course_id)
  values(1, 1);
