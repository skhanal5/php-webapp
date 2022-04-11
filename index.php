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
                        <h2 class = "card-header">
                                PHP Mock Webapp
                        </h2>
                        <?php if (isset($_GET['error'])) { ?>
                                <span class = "card-error"> <?php echo $_GET['error']; ?> </span>
                        <?php } ?>
                        <form action="login.php" method = "POST">
                            <div>
                                <label class = "form-label" for="uname">Username</label>
                                <input type="text" name="uname" required>
                                <label class = "form-label" for="password">Password</label>
                                <input type="password" name="password" required>
                                <input type="submit" id = "login-button" name="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
  </body>
</html>
