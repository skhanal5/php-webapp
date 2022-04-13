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
                        <?php if (isset($_GET['error'])) { ?>
                                <span class = "card-error"> <?php echo $_GET['error']; ?> </span>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
  </body>
</html>
