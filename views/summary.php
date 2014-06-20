<h1> Summary </h1>
<ul>
  <?php foreach($data->courses as $course): ?>
    <li> <?php echo htmlspecialchars($course->getName()); ?> </li>
    <ul>
    <?php foreach($course->getTopics() as $topic): ?>
      <li> <?php echo htmlspecialchars($topic->getName()); ?> </li>
      Average grade: <?php echo htmlspecialchars($topic->averageGrade()); ?>,
      average hours: <?php echo htmlspecialchars($topic->averageHours()); ?>
    <?php endforeach; ?>
    </ul>
  <?php endforeach; ?>
</ul>
