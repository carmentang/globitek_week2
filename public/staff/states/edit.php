<?php
require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to('index.php');
} else {
  $id = $_GET['id'];
  $id = h($id);
}
$states_result = find_state_by_id($id);
// No loop, only one result
$state = db_fetch_assoc($states_result);
// Set default values for all variables the page needs.
$errors = array();

if(is_post_request()) {
  // Confirm that values are present before accessing them.
  if(isset($_POST['name'])) { $name = $_POST['name']; $state['name'] = h($name); }
  if(isset($_POST['code'])) { $code = $_POST['code']; $state['code'] = h($code); }
  if(isset($_POST['country_id'])) { $country_id = $_POST['country_id']; $state['country_id'] = h($country_id); }

  $result = update_state($state);
  if($result === true) {
    redirect_to('show.php?id=' . u($state['id']));
  } else {
    $errors = $result;
  }
}
?>
<?php $page_title = 'Staff: Edit State ' . h($state['name']); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">

  <h1>Edit State: <?php echo h($state['name']); ?></h1>

  <?php echo display_errors($errors); ?>

    <form action="edit.php?id=<?php echo u($state['id']); ?>" method="post">
      Name:<br />
      <input type="text" name="name" value="<?php echo h($state['name']); ?>" /><br />
      Code:<br />
      <input type="text" name="code" value="<?php echo h($state['code']); ?>" /><br />
      <br />
      <input type="submit" name="submit" value="Update"  />
      <br />
    </form>

    <a href="show.php?id=<?php echo u($state['id']); ?>">Cancel</a><br />

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
