<?php
require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to('index.php');
} else {
  $id = $_GET['id'];
  $id = h($id);
}
$country_result = find_country_by_id($id);
// No loop, only one result
$country = db_fetch_assoc($country_result);
// Set default values for all variables the page needs.
$errors = array();

if(is_post_request()) {
  // Confirm that values are present before accessing them.
  if(isset($_POST['name'])) { $name = $_POST['name']; $country['name'] = h($name); }
  if(isset($_POST['code'])) { $code = $_POST['code']; $country['code'] = h($code); }

  $result = update_country($country);
  if($result === true) {
    redirect_to('show.php?id=' . u($country['id']));
  } else {
    $errors = $result;
  }
}
?>
<?php $page_title = 'Staff: Edit country ' . h($country['name']); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">

  <h1>Edit Country: <?php echo h($country['name']); ?></h1>

  <?php echo display_errors($errors); ?>

    <form action="edit.php?id=<?php echo u($country['id']); ?>" method="post">
      Name:<br />
      <input type="text" name="name" value="<?php echo h($country['name']); ?>" /><br />
      Code:<br />
      <input type="text" name="code" value="<?php echo h($country['code']); ?>" /><br />
      <br />
      <input type="submit" name="submit" value="Update"  />
      <br />
    </form>

    <a href="show.php?id=<?php echo u($country['id']); ?>">Cancel</a><br />

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
