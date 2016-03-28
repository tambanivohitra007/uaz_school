<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Université Adventiste Zurcher </title>

    <!-- Bootstrap core CSS -->

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/images/favicon.png" />

    <link href="<?php echo base_url();?>assets/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/<?php echo base_url();?>assets/css/icheck/flat/green.css" rel="stylesheet">


    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>

</head>

<body style="background:#172D44; background-image: url('<?php echo base_url();?>assets/images/logo.png'); background-repeat: no-repeat; background-attachment: fixed;
    background-position: 50% 20%;; background-size: 500px 500px;">

    <div class="">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                    <?php echo form_open(base_url() . 'index.php/login/validate'); ?>
                        <h1>Bienvenue</h1>
                        <div>
                            <?php
                              $attributes = array(
                                'id' => 'login_username',
                                'class' => 'form-control loginctrl',
                                'placeholder' => 'Votre pseudo / ID',
                                'required autofocus' => NULL
                              );
                              echo form_input('username', '', $attributes);
                            ?>
                        </div>

                        <div>
                            <?php
                              $attributes2 = array(
                                'id' => 'login_password',
                                'class' => 'form-control loginctrl',
                                'placeholder' => 'Votre mot de passe',
                                'required' => 'required'
                              );
                              echo  form_password('password', '', $attributes2);;
                            ?>
                        </div>
                        <select class="select2_single form-control dropdown-perm" required name="permission">
                            <option selected value="1">Administrateur </option>
                            <option value="2">Etudiant</option>
                            <option value="3">Département</option>
                            <option value="4">Invité</option>
                        </select>
                        <br>
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-login" name="submit"> Login</button>
                            <!-- <a class="reset_pass" href="#">Avez-vous oublié votre mot de passe?</a> -->
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">

                            <p class="change_link">En mode de développement
                                <!-- <a href="#toregister" class="to_register"> Créer un compte </a> -->
                            </p>
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h1><i class="fa fa-graduation-cap" style="font-size: 26px;"></i> <a href="#toregister" class="to_register">Université Adventiste Zurcher</a></h1>

                                <p>©2016 Tout droits reservés. Université Adventiste Zurcher, Sambaina - Antsirabe</p>
                            </div>
                        </div>
                        <?php
                          if ($error) {
                            echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                              <strong>Vraiment désolé!</strong> Votre identification, mot de passe ou permission est incorrecte.
                              <p>Veuillez réessayer encore une fois. <p>
                            </div>';
                          }

                         ?>
                    <?php  echo form_close(); ?>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
            <div id="register" class="animate form">
                <section class="login_content">
                    <form>
                      <h1>A propos</h1>
                      <div class="">
                        <h3>Université Adventiste Zurcher <small> (Sambaina - Antsirabe)</small></h3>
                        <p>
                          PK 135. Route National 7, Ankofafabe - Sambaina
                          ANTSIRABE
                        </p>
                        <br>
                        <address class="">
                          <p><strong>email:</strong> auzregistraroffice@ymail.com</p>
                          <p><strong>tel:</strong> 020 44 931 07 / 034 44 931 07</p>

                        </address>
                        <h1> PREPARE TOMORROW'S LEADERS, TODAY<small></small></h1>
                        <a href="#tologin" class="to_register"> Entrer dans le site </a>
                        <br>
                        <hr>
                        <p>
                          Credits: Rindra Razafinjatovo - MSIT, BSCS <a href="https://tambanivohitra.wordpress.com" class="to_register"> Visiter mon site! </a>
                        </p>
                      </div>                        
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            var intputElements = document.getElementsByTagName("INPUT");
            for (var i = 0; i < intputElements.length; i++) {
                intputElements[i].oninvalid = function (e) {
                    e.target.setCustomValidity("");
                    if (!e.target.validity.valid) {
                        if (e.target.name == "username") {
                            e.target.setCustomValidity("Votre pseudo ou immatriculation");
                        }
                        else {
                            e.target.setCustomValidity("Veuillez remplir le mot de passe");
                        }
                    }
                };
            }
          })
    </script>

</body>

</html>
