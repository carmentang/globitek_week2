<?php
require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to('index.php');
} else {
  $id = $_GET['id'];
  $id = h($id);
}
$users_result = find_user_by_id($id);
// No loop, only one result
$user = db_fetch_assoc($users_result);

// Set default values for all variables the page needs.
$errors = array();

if(is_post_request()) {

  $result = delete_user($id);
  if($result === true) {
    redirect_to('index.php');
  } else {
    echo "Failed to delete user.";
  }
}
?>
<?php $page_title = 'Staff: Delete User ' . h($user['first_name']) . " " . h($user['last_name']); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">

  <h1>Delete User: <?php echo h($user['first_name']) . " " . h($user['last_name']); ?></h1>

  <br />Are you sure you want to permanently delete the user?<br />
  <form action="delete.php?id=<?php echo u($user['id']); ?>" method="post">
    <input type="submit" name="delete" value="Delete"  />
  </form>

  <a href="show.php?id=<?php echo u($user['id']); ?>">Cancel</a><br />

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
