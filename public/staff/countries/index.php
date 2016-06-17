<?php require_once('../../../private/initialize.php'); ?>

<?php $page_title = 'Staff: Countries'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="../index.php">Back to Menu</a><br />

  <h1>Countries</h1>

  <a href="new.php">Add a Country</a><br />

  <?php
  $countries_result = find_all_countries();

  while($country = mysqli_fetch_assoc($countries_result)) {
    echo "<h2>";
    $country_id = $country['id'];
    echo "<a href='show.php?id=$country_id'>";
    echo "<span class=\"country_name\">" . h($country['name']) . "</span>";
    echo "</a>";
    echo "</h2>";

    $states_result = find_states_by_country_id(h($country['id']));

    echo "<ul>";
    while($state = mysqli_fetch_assoc($states_result)) {
      echo "<li>";
      echo "<span class=\"state_name\">" . h($state['name']) . "</span>";
      echo "<span class=\"state_code\">" . " (" . h($state['code']) . ")" . "</span>";
      echo "</li>";

      $territories_result = find_territories_by_state_id($state['id']);

      echo "<ul>";
      while($territories = mysqli_fetch_assoc($territories_result)) {
        if ($territories['name'] != $state['name']) {
          echo "<li>";
          echo "<span class=\"territories_name\">" . h($territories['name']) . "</span>";
          echo "</li>";
        }

        $salesppl_result = find_all_salespeople();
        $terr_result = find_salesterritories_by_terr_id($territories['id']);
        $ppl = array();

        while ($terr = mysqli_fetch_assoc($terr_result)) {
          array_push($ppl, u($terr['salesperson_id']));
        }
        mysqli_free_result($terr_result);

        while ($salesppl = mysqli_fetch_assoc($salesppl_result)) {
          foreach($ppl as $id) {
            if ($salesppl['id'] == $id) {
              $id = u($id);
              echo "<a href='../salespeople/show.php?id=$id'>";
                echo "<span class=\"salespeople_name\">" . h($salesppl['first_name']) . " " . h($salesppl['last_name']) . "</span><br>";
              echo "</a>";
            }
          }
        }
        mysqli_free_result($salesppl_result);
      }
      mysqli_free_result($territories_result);
      echo "</ul>";
    }
    echo "</ul>";
    mysqli_free_result($states_result);
  }
  mysqli_free_result($countries_result);
  echo "</ul>";
  ?>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
