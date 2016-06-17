<?php require_once('../../../private/initialize.php'); ?>

<?php $page_title = 'Staff: States'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="../index.php">Back to Menu</a><br />

  <h1>States</h1>

  <a href="new.php">Add a State</a><br />
  <br />

  <?php
    $state_result = find_all_states();

    echo "<table id=\"states\" style=\"width: 500px;\">";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Code</th>";
    echo "<th></th>";
    echo "<th></th>";
    echo "</tr>";
    while($state = db_fetch_assoc($state_result)) {
      echo "<tr>";
      echo "<td>" . h($state['name']) . "</td>";
      echo "<td>" . h($state['code']) . "</td>";
      echo "<td>";
      $show_url = 'show.php?id=' . u($state['id']);
      echo "<a href='$show_url'>Show</a>";
      echo "</td>";
      echo "<td>";
      $edit_url = 'edit.php?id=' . u($state['id']);
      echo "<a href='$edit_url'>Edit</a>";
      echo "</td>";
      echo "</tr>";
    } // end while $states
    db_free_result($state_result);
    echo "</table>"; // #states
  ?>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
