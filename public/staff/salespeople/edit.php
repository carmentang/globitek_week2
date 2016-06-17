<?php
require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to('index.php');
} else {
  $id = $_GET['id'];
  $id = h($id);
}
$salespeople_result = find_salesperson_by_id($id);
// No loop, only one result
$salesperson = db_fetch_assoc($salespeople_result);

// Set default values for all variables the page needs.
$errors = array();

if(is_post_request()) {

  // Confirm that values are present before accessing them.
  if(isset($_POST['first_name'])) { $first_name = $_POST['first_name']; $salesperson['first_name'] = h($first_name); }
  if(isset($_POST['last_name'])) { $last_name = $_POST['last_name']; $salesperson['last_name'] = h($last_name); }
  if(isset($_POST['phone'])) { $phone = $_POST['phone']; $salesperson['phone'] = h($phone); }
  if(isset($_POST['email'])) { $email = $_POST['email']; $salesperson['email'] = h($email); }

  $result = update_salesperson($salesperson);
  if($result === true) {
    redirect_to('show.php?id=' . u($salesperson['id']));
  } else {
    $errors = $result;
  }
}
?>
<?php $page_title = 'Staff: Edit Salesperson ' . h($salesperson['first_name']) . " " . h($salesperson['last_name']); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="index.php">Back to Salespeople List</a><br />

  <h1>Edit Salesperson: <?php echo $salesperson['first_name'] . " " . $salesperson['last_name']; ?></h1>

  <?php echo display_errors($errors); ?>

  <form action="edit.php?id=<?php echo u($salesperson['id']); ?>" method="post">
    First name:<br />
    <input type="text" name="first_name" value="<?php echo h($salesperson['first_name']); ?>" /><br />
    Last name:<br />
    <input type="text" name="last_name" value="<?php echo h($salesperson['last_name']); ?>" /><br />
    Phone:<br />
    <input type="text" name="phone" value="<?php echo h($salesperson['phone']); ?>" /><br />
    Email:<br />
    <input type="text" name="email" value="<?php echo h($salesperson['email']); ?>" /><br />
    <br />
    <input type="submit" name="submit" value="Update"  />
    <br /><br />
  </form>

  <a href="show.php?id=<?php echo u($salesperson['id']); ?>">Cancel</a><br />

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
