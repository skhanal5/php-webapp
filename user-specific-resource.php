<?php
    session_start();
    if (!isset($_SESSION['user_name'])) {
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <Title> PHP Webapp </Title>
    <link rel="stylesheet" href="./css/styles.css"/>
  </head>

  <body>
    <main>
        <!--==================== MAIN BODY  ====================-->
        <section class="home-section" id="home">
            <div class="container">
                <div class = "card">
                    <div class="card-content">
                        <p class="card-pg">
                            You have successfully accessed the secure web resource for the ADMIN user type.
                        </p>
                        <form action="logout.php" method = "post">
                            <button type="submit" id = "login-button">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
  </body>
</html>
