<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, follow">

    <title>Minddistrict Bowtie Bash 2017</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Galada|Montserrat" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php
      $protocol  = empty($_SERVER['HTTPS']) ? 'http' : 'https';
      $domain = $_SERVER['SERVER_NAME'];
      $domain_url = "${protocol}://${domain}";
    ?>

    <div class="snow-container"></div>
      <div class="container">
        <div class="col-md-8 col-md-offset-2">
          <div class="content">
            <p class="text-invitation">
              You are cordially invited to the
            </p>

            <h1 class="theme">
              <a href="#" title="Minddistrict Bowtie Bash 2017" data-toggle="modal" data-target="#rsvpModal">
                <img src="<?php echo $domain_url;?>/xmas/img/bow-tie-bash-title.png" alt="Minddistrict Bowtie Bash 2017" style="width:75%;"/>
              </a>
            </h1>

            <img src="<?php echo $domain_url;?>/xmas/img/gingerbread_bow-tie_transparent.gif" style="width:100px;"/>

            <h2 class="date">Friday, December 15th</h2>
            <h3 class="time">The Bash will start at 7:00 pm and end at 1:00 am</h3>
            <br/>

            <p class="dresscode">
              <b class="text-danger">Dress code:</b><br/>
              we want to see something jolly with <b>bow ties</b><br/>
              (yes ladies, you too!)…
            </p>
            <br/>

            <div id="rsvp-action-container">
              <button type="button" class="btn btn-lg btn-primary" title="Click here to RSVP" data-toggle="modal" data-target="#rsvpModal">
                Click here to RSVP
              </button><br/><br/>
              <p class="text-small">
                Unfortunately you are <b>NOT</b> allowed to bring a +1</br></br>
                <b>Please RSVP before Thursday, November 30th!</b>
              </p><br/>
            </div>

            <h2 class="text-title">Please show up with your brightest smile and best <b>bow tie</b> outfit at:</h2>
            <a href="https://www.nelisoost.nl/" title="NELIS Oost" target="_blank">
              <img src="<?php echo $domain_url;?>/xmas/img/logo-nelis.svg" alt="NELIS Oost" style="width:130px;"/>
            </a>
            <br/><br/>
            <address class="location">
              <b><a href="https://www.nelisoost.nl/" title="NELIS Oost" target="_blank">NELIS Oost</a></b><br/>
              Sumatrastraat 28H,<br/>
              1094 ND Amsterdam<br/>
            </address>

            <br/>

            <h2 class="text-title">Let’s eat, drink and bounce around in our <b>bow ties</b>!</h2>
            <p><b>DJ Jimmy will be dropping some festive tunes for us.</b></p>

            <br/><br/>

            <span class="bow-tie-top-left">
              <img src="img/bow-tie_yellow.png"/>
            </span>
            <span class="bow-tie-top-right">
              <img src="img/bow-tie_green.png"/>
            </span>
            <span class="bow-tie-bottom-left">
              <img src="img/bow-tie_magenta.png"/>
            </span>
            <span class="bow-tie-bottom-right">
              <img src="img/bow-tie_blue.png"/>
            </span>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="rsvpModal" tabindex="-1" role="dialog" aria-labelledby="rsvpModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="rsvpModalLabel">RSVP to the Minddistrict Bowtie Bash 2017</h4>
          </div>
          <div class="modal-body">
            <div id="form-messages"></div>

            <form id="rsvpForm" class="form-horizontal" action="<?php echo $domain_url;?>/xmas/mail.php" method="post">

              <!-- TITLE -->
              <div class="form-group">
                <label for="inputTitle" class="col-sm-4 control-label">Title</label>
                <div class="col-sm-8">
                  <label class="radio-inline">
                    <input type="radio" name="title" id="optionTitleMr" value="Mr.">
                    Mr.
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="title" id="optionTitleMrs" value="Ms.">
                    Ms.
                  </label><br/>
                  <span id="error-title" class="text-danger form-error-text">Please select one of the options.</span>
                </div>
              </div>

              <!-- FIRST NAME -->
              <div class="form-group">
                <label for="inputFirstName" class="col-sm-4 control-label">
                  First name
                </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputFirstName" name="first_name">
                  <span id="error-firstname" class="text-danger form-error-text">Please fill this field.</span>
                </div>
              </div>

              <!-- SURNAME -->
              <div class="form-group">
                <label for="inputSurname" class="col-sm-4 control-label">
                  Surname
                </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputSurname" name="surname">
                  <span id="error-surname" class="text-danger form-error-text">Please fill this field.</span>
                </div>
              </div>

              <!-- EMAIL -->
              <div class="form-group">
                <label for="inputEmail" class="col-sm-4 control-label">
                  Email
                </label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" id="inputEmail" name="email">
                  <span id="error-email" class="text-danger form-error-text">Please fill this field.</span>
                  <span id="error-email-value" class="text-danger form-error-text">Please fill in the right emailaddress.</span>
                </div>
              </div>

              <!-- DIETARY WISHES -->
              <div class="form-group">
                <label for="inputDietaryWishes" class="col-sm-4 control-label">
                  Dietary wishes
                </label>
                <div class="col-sm-8">
                  <select class="form-control" id="inputDietaryWishes" name="dietary_wishes">
                    <option value="No">No dietary wishes</option>
                    <option value="Vegan">Vegan</option>
                    <option value="Vegetarian">Vegetarian</option>
                  </select>
                </div>
              </div>

              <!-- FOOD ALLERGIES -->
              <div class="form-group">
                <label for="inputFoodAllergies" class="col-sm-4 control-label">
                  Food allergies<br/>
                  / Dislikes
                </label>
                <div class="col-sm-8">
                  <textarea class="form-control" id="inputFoodAllergies" name="food_allergies"></textarea>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                  <input type="submit" id="btnSubmitRSVP" class="btn btn-lg btn-primary" value="Join the party" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/cursor-animation.js"></script>
    <script type="text/javascript" src="js/form-validation.js"></script>
  </body>
</html>
