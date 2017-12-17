<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$db = new SQLite3('../db/users.db', SQLITE3_OPEN_READWRITE) or exit('Unable to open database');

$error = '';

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm'])) {

  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $db->prepare('SELECT * FROM users WHERE email=:email');
  $stmt->bindValue(':email', $email, SQLITE3_TEXT);
  $result = $stmt->execute();
  $row = $result->fetchArray(SQLITE3_ASSOC);
  $stmt->close();
  //print_r($row);
  if (isset($row['email'])) {
    $error = "email already in use";
  } else {
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $db->prepare('INSERT INTO users(email, hash) VALUES (:email, :hash)');
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $stmt->bindValue(':hash', $hash, SQLITE3_TEXT);
    $stmt->execute();
    $stmt->close();

    $insert_id = $db->lastInsertRowID();
    $session_key = md5(microtime().rand());

    $stmt = $db->prepare('INSERT INTO sessions(uid, token) VALUES (:uid, :token)');
    $stmt->bindValue(':uid', $insert_id, SQLITE3_TEXT);
    $stmt->bindValue(':token', $session_key, SQLITE3_TEXT);
    $stmt->execute();
    $stmt->close();

    setcookie("token", $session_key, time()+3600*24*7); // 1 week
    header('Location: http://hegemon.ucsd.edu/~aschachn/page.php');
    $db->close();
    exit();
  }

  $db->close();
}

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
    <style type="text/css">
      body {
        background-color: #DADADA;
      }
      body > .grid {
        height: 100%;
      }
      .image {
        margin-top: -100px;
      }
      .column {
        max-width: 450px;
      }
    </style>
    <script>
      $(document).ready(function() {
        $('.ui.form')
          .form({
            fields: {
              email: {
                identifier  : 'email',
                rules: [
                  {
                    type   : 'empty',
                    prompt : 'Please enter your e-mail'
                  },
                  {
                    type   : 'email',
                    prompt : 'Please enter a valid e-mail'
                  }
                ]
              },
              password: {
                identifier  : 'password',
                rules: [
                  {
                    type   : 'empty',
                    prompt : 'Please enter your password'
                  },
                  {
                    type   : 'length[6]',
                    prompt : 'Your password must be at least 6 characters'
                  }
                ]
              },
              confirm: {
                identifier  : 'confirm',
                rules: [
                  {
                    type   : 'empty',
                    prompt : 'Please confirm your password'
                  },
                  {
                    type   : 'match[password]',
                    prompt : 'These passwords don\'t match.'
                  }
                ]
              }
            }
          })
        ;

      <?php if ($error != "") {echo "$('.form').form('add errors', ['$error']);";} ?>

      });
    </script>
  </head>

  <body>
    <div class="ui middle aligned center aligned grid">
      <div class="column">
        <h2 class="ui black image header">
          <!-- <img src="assets/images/logo.png" class="image"> -->
          <div class="content">
            Sign up
          </div>
        </h2>
        <form action="./signup.php" method="post" class="ui large form">
          <div class="ui stacked segment">
            <div class="field">
              <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="text" name="email" placeholder="E-mail address">
              </div>
            </div>
            <div class="field">
              <div class="ui left icon input">
                <i class="lock icon"></i>
                <input type="password" name="password" placeholder="Password">
              </div>
            </div>
            <div class="field">
              <div class="ui left icon input">
                <i class="lock icon"></i>
                <input type="password" name="confirm" placeholder="Confirm your password">
              </div>
            </div>
            <div class="ui fluid large black submit button">Signup</div>
          </div>

          <div class="ui error message"></div>

        </form>

        <div class="ui message">
          Already have an account? <a href="./login.php">Log In</a>
        </div>
      </div>
    </div>
  </body>
</html>
