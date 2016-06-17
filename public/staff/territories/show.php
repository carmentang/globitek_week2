<?php require_once('../../../private/initialize.php'); ?>

<?php
if(!isset($_GET['id'])) {
  redirect_to('index.php');
} else {
  $id = $_GET['id'];
  $id = h($id);
}
$territory_result = find_territory_by_id($id);
// No loop, only one result
$territory = db_fetch_assoc($territory_result);
$state_id = h($territory['state_id']);

$state_result = find_state_by_id($state_id);
$state = db_fetch_assoc($state_result);

?>

<?php $page_title = 'Staff: Territory of ' . h($territory['name']); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <br /><a href="../states/show.php?id=<?php echo u($state_id); ?>">Back to State Details</a><br />

  <h1>Territory: <?php echo h($territory['name']); ?></h1>

  <?php
    echo "<table id=\"territory\">";
    echo "<tr>";
    echo "<td>Name: </td>";
    echo "<td>" . h($territory['name']) . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>State: </td>";
    echo "<td>" . h($state['name']) . " [" . h($territory['state_id']) . "]" . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Position: </td>";
    echo "<td>" . h($territory['position']) . "</td>";
    echo "</tr>";
    echo "</table>";

    $edit_url = 'edit.php?id=' . u($territory['id']);
    echo "<br /><a href='$edit_url'>Edit</a>";
    db_free_result($territory_result);
  ?>


</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
