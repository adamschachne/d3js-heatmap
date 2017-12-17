<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$db = new SQLite3('../db/users.db', SQLITE3_OPEN_READWRITE) or exit('Unable to open database');

if (!isset($_COOKIE['token'])) {
  $db->close();
  header('Location: http://hegemon.ucsd.edu/~aschachn/login.php');
  exit();
}

$sql =<<<EOF
  UPDATE sessions
  SET disabled = CURRENT_TIMESTAMP
  WHERE sessions.uid = (SELECT sessions.uid
                        FROM sessions LEFT OUTER JOIN users ON users.uid = sessions.uid
                        WHERE sessions.token = :token)
    AND sessions.disabled is null
EOF;
$stmt = $db->prepare($sql);
$stmt->bindValue(':token', $_COOKIE['token'], SQLITE3_TEXT);
$result = $stmt->execute();
$rows = $result->fetchArray(SQLITE3_ASSOC);
$stmt->close();

setcookie("token", '', time()-3600);
header('Location: http://hegemon.ucsd.edu/~aschachn/login.php');

// print_r($row);

$db->close();

?>
