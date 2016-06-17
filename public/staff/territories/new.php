<?php
require_once('../../../private/initialize.php');

// Set default values for all variables the page needs.
$errors = array();
$territory= array(
  'name' => '',
  'state_id' => '',
  'position' => ''
);

if(isset($_GET['id'])) { $id = $_GET['id']; $territory['state_id'] = h($id); }
if(is_post_request()) {
  // Confirm that values are present before accessing them.
  // if(isset($_GET['id'])) { echo "wtf"; $territory['state_id'] = $_GET['id']; }
  if(isset($_POST['name'])) { $name = $_POST['name']; $territory['name'] = h($name); }
  if(isset($_POST['position'])) { $position = $_POST['position']; $territory['position'] = h($position); }
  $result = insert_territory($territory);
  if($result === true) {
    $new_id = db_insert_id($db);
    redirect_to('show.php?id=' . u($new_id));
  } else {
    $errors = $result;
  }
}
?>
<?php $page_title = 'Staff: New Territory'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="../states/show.php?id=<?php echo u($territory['state_id']); ?>">Back to territory Details</a><br />

  <h1>New Territory</h1>

  <?php echo display_errors($errors); ?>

  <form action="new.php?id=<?php echo h($territory['state_id']); ?>" method="post">
    Name:<br />
    <input type="text" name="name" value="<?php echo h($territory['name']); ?>" /><br />
    Position:<br />
    <input type="text" name="position" value="<?php echo h($territory['position']); ?>" /><br />
    <br />
    <input type="submit" name="submit" value="Create"  />
  </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
