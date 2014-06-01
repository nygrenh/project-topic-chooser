<h1> Topics </h1>
<?php if (loggedIn()): ?>
  <p><a href="new.html" class="btn btn-sm btn-default"> New Topic </a></p>
<?php endif; ?>
<table class="table table-hover">
  <tr>
    <th> Name </th>
    <th> Description </th>
    <?php if (loggedIn()): ?>
      <th> </th>
      <th> </th>
    <?php endif; ?>
  </tr>
  <tbody>
    <tr>
      <td> <a href="showtopic.php?id=1"> Topic #1 </a> </td>
      <td> Very interesting topic </td>
      <?php if (loggedIn()): ?>
        <td> <a href="edittopic.php?id=1"> Edit </a> </td>
        <td> <a href=""> Destroy </a> </td>
      <?php endif; ?>
    </tr>
  </tbody>
</table>
