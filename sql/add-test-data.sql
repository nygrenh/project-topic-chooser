insert into account(name, admin, password)
  values ('smith', true, 'password'),
         ('johnson', false, 'gary'),
         ('williams', false, 'test');

insert into course(name)
  values ('Database Application'),
         ('Some Random Course');

insert into topic(name, course_id, summary, description)
  values ('Epic topic', 1, 'This topic is very interesting', 'An interesting topic. Implement something flashy and call it a day.'),
         ('Another topic', 1, 'summary', 'something'),
         ('Some random topic', 2, 'This is a random topic', 'Research randomness.');

insert into project(topic_id, student, hours, grade)
  values (1, 'Sonia Gonzalez', 300, 3),
         (1, 'Chester Stjohn', 433, 2),
         (1, 'Maritza Pfeil', 666, 0),
         (1, 'Phyllis Brown', 3, 0),
         (1, 'Duane Sparks', 2, 5),
         (1, 'Robert Keenan', 543, 4),
         (1, 'Dorothy Robinson', 342, 3),
         (2, 'Jason Buss', 213, 3),
         (2, 'Karen Etheridge', 111, 3),
         (3, 'Kevin Paul', 23, 2),
         (3, 'Melissa Rojas', 4234, 0),
         (3, 'Nicholas McKnight', 2, 5),
         (3, 'Charity Bowser', 1, 5);


insert into coursestoaccounts(account_id, course_id)
  values (2, 1),
         (2, 2),
         (3, 2);
