<?php require_once('../../../private/initialize.php'); ?>

<?php
if(!isset($_GET['id'])) {
  redirect_to('index.php');
} else {
  $id = $_GET['id'];
  $id = h($id);
}
$country_result = find_country_by_id($id);
// No loop, only one result
$country = db_fetch_assoc($country_result);

?>

<?php $page_title = 'Staff: Country of ' . h($country['name']); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <br /><a href="index.php">Back to All Countries</a><br />

  <h1>Country: <?php echo h($country['name']); ?></h1>

  <?php
    echo "<table id=\"country\">";
    echo "<tr>";
    echo "<td>Name: </td>";
    echo "<td>" . h($country['name']) . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Code: </td>";
    echo "<td>" . h($country['code']) . "</td>";
    echo "</tr>";
    echo "</table>";

    $edit_url = 'edit.php?id=' . u($country['id']);
    echo "<br /><a href='$edit_url'>Edit</a>";
    db_free_result($country_result);
  ?>


</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
