<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$db = new SQLite3('../db/users.db', SQLITE3_OPEN_READWRITE) or exit('Unable to open database');

if (!isset($_COOKIE['token'])) { // no cookie
  $db->close();
  header('Location: http://hegemon.ucsd.edu/~aschachn/login.php');
  exit();
}

$sql =<<<EOF
  SELECT *
  FROM sessions LEFT OUTER JOIN users ON users.uid = sessions.uid
  WHERE sessions.token = :token
    AND sessions.disabled is null
EOF;
$stmt = $db->prepare($sql);
$stmt->bindValue(':token', $_COOKIE['token'], SQLITE3_TEXT);
$result = $stmt->execute();
$row = $result->fetchArray(SQLITE3_ASSOC);
$stmt->close();

if (!isset($row['email'])) { // bad session token
  setcookie("token", '', time()-3600);
  header('Location: http://hegemon.ucsd.edu/~aschachn/login.php');
  $db->close();
  exit();
}
// print_r($row);

$db->close();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/semantic.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="js/semantic.min.js"></script>
  </head>

  <body>
    <div style="padding-top: 40px;text-align: center;" class="ui container">
      <div class="row">
        <div class="center aligned column">
          <h1 class="ui header">Welcome, <?php echo $row['email']?>!</h1>
        </div>
      </div>
      <div class="row">
        <div class="center aligned column">
          <a href="./logout.php" class="ui large button">Log out</a>
        </div>
      </div>
    </div>
  </body>
</html>
