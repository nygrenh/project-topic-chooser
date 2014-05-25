insert into account(name, admin, password)
  values('Smith', TRUE, 'password');

insert into course(name)
  values('Database Application');

insert into topic(name, course_id, summary, description)
  values('Topic', 1, 'summary', 'something');

insert into project(topic_id, student, hours, grade)
  values(1, 'Student', 7, 5);

insert into coursestoaccounts(account_id, course_id)
  values(1, 1);
