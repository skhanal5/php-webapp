<?php
    session_start();

    // Checks client side certificate for second layer of authenticatio
    if($_SERVER['SSL_CLIENT_VERIFY']) {

        // Checks client attribute (in this case user) for authorization into web resource
        if ($_SERVER['SSL_CLIENT_S_DN_CN'] === 'subodh') {
            echo $_SERVER['SSL_CLIENT_S_DN_CN'];
            //Validates first (basic) layer of authentication
            if (!isset($_SESSION['user_name'])) {
                header("Location: index.php?error=Unauthenticated user detected");
                exit();
            }
        } else {
            header("Location: unauthorized.php?error=Invalid user group attempted to access this web resource." . $_SERVER['SSL_CLIENT_S_DN_CN']);
            exit();
        }
    } else {
        header("Location: unauthorized.php?error=Invalid user group attempted to access this web resource." . $_SERVER['SSL_CLIENT_S_DN_CN']);
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
