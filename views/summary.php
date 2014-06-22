<h1> Summary of your courses </h1>
<ul>
  <?php foreach($data->courses as $course): ?>
    <li> <?php echo htmlspecialchars($course->getName()); ?> </li>
    <ul>
    <?php foreach($course->getTopics() as $topic): ?>
      <li> <?php echo htmlspecialchars($topic->getName()); ?> </li>
      Average grade: <?php echo htmlspecialchars($topic->averageGrade()); ?>,
      average hours: <?php echo htmlspecialchars($topic->averageHours()); ?>,
      failure rate: <?php echo htmlspecialchars($topic->failureRate()); ?>%.
    <?php endforeach; ?>
    </ul>
  <?php endforeach; ?>
</ul>
