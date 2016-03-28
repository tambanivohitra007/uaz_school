        <div id="step-4">
            <h2 class="StepTitle">Tous les informations</h2>
            <hr>
            <?php echo form_open('/', 'id="target"'); ?>
            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

              <div class="form-group">
                <div id="avatar" class="avatar-view col-md-3 col-sm-3 col-xs-12 " title="Change the avatar">
                  <?php
                    if (file_exists($path)){
                  ?>
                  <img src= "<?php echo base_url() . "assets/images/id_card/profile.jpg" ?>" alt="Avatar">
                  <?php
                    } else {
                  ?>
                  <img src= "<?php echo base_url() . "assets/images/id_card/" . $student->student_id . ".jpg" ?>" alt="Avatar">
                  <?php
                    }
                  ?>
                </div>
              </div>

              <!-- <h3 id="student_idF">...</h3> -->
              <h3>Nom: <strong id="nomF"></strong></h3>

              <ul class="list-unstyled user_data">
                  <li>
                    <h4>Prénoms: <strong id="prenomF"> </strong></h4>
                    <!-- <p id="prenomF"></p> -->
                  </li>
                  <li>
                    <p>Immatriculation: <strong id="student_idF">Immatriculation: </strong></p>
                    <!-- <p id="student_idF"></p> -->
                  </li>

                  <li>
                    <p><strong><i class="fa fa-male"> </i> Sexe: </strong></p>
                    <p id="sexeF"></p>
                  </li>

                  <li>
                    <p><strong><i class="fa fa-map-marker user-profile-icon"> </i> Adresse: </strong></p>
                    <p id="adresseF"></p>
                  </li>

                  <li>
                    <p><strong><i class="fa fa-briefcase user-profile-icon"> </i> Emplacement: </strong></p>
                    <p id="endroitF"></p>
                  </li>
              </ul>
          </div>

            <div class="col-md-9 col-sm-9 col-xs-12">
              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Profile</a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Cours à prendre</a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Finance</a>
                      </li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <!-- start Profile -->
                          <dl class="dl-horizontal col-md-6 col-sm-6 col-xs-12">

                            <dt>Date de Naissance: </dt>
                            <dd id="dateNaissanceF">...</dd>
                            <dt>Lieu de Naissance: </dt>
                            <dd id="lieuNaissanceF">...</dd>
                            <dt>Téléphone: </dt>
                            <dd id="telF">...</dd>
                            <dt>Religion: </dt>
                            <dd id="religionF">...</dd>
                            <dt>Nationalité: </dt>
                            <dd id="nationaliteF">...</dd>
                            <dt>Pays D'origine: </dt>
                            <dd id="pays_origineF">...</dd>
                            <dt>Numéro CIN: </dt>
                            <dd id="num_cinF">...</dd>
                            <dt>Date de délivrance: </dt>
                            <dd id="cin_date_delivreF">...</dd>
                            <dt>Région: </dt>
                            <dd id="cin_regionF">...</dd>
                            <dt>Numéro du VISA: </dt>
                            <dd id="num_visaF">...</dd>

                            <dt>Etude envisagé: </dt>
                            <dd id="etude_envisageF">...</dd>
                            <dt>option de l'étude: </dt>
                            <dd id="etude_optionF">...</dd>
                            <hr>
                            <dt>Etat civil: </dt>
                            <dd id="etatF">...</dd>
                            <dt>Nom du conjoint(e): </dt>
                            <dd id="nom_conjointF">...</dd>
                            <dt>Nombre d'enfants: </dt>
                            <dd id="nb_enfantF">...</dd>
                            <hr>
                            <dt>Noms du père: </dt>
                            <dd id="father_nameF">...</dd>
                            <dt>Profession du père: </dt>
                            <dd id="father_profF">...</dd>
                            <dt>Noms de la mère: </dt>
                            <dd id="mother_nameF">...</dd>
                            <dt>Profession de la mère: </dt>
                            <dd id="mother_profF">...</dd>
                            <dt>Téléphone des parents: </dt>
                            <dd id="parent_telF">...</dd>
                            <dt>Adresse des parents: </dt>
                            <dd id="parent_adresseF">...</dd>
                            <hr>
                            <dt>Personne à contacter en cas d'urgence: </dt>
                            <dd id="pers_contact_nameF">...</dd>
                            <dt>Adresse de la personne: </dt>
                            <dd id="pers_adresseF">...</dd>
                            <dt>Téléphone de la personne: </dt>
                            <dd id="pers_telF">...</dd>
                            <hr>
                            <dt>Nom du sponsors: </dt>
                            <dd id="sponsor_nomF">...</dd>
                            <dt>Prénoms du sponsors: </dt>
                            <dd id="sponsor_prenomF">...</dd>
                            <dt>Adresse du sponsors: </dt>
                            <dd id="sponsor_adresseF">...</dd>
                            <dt>Téléphone du sponsors: </dt>
                            <dd id="sponsor_telF">...</dd>
                            <dt>Durée du financement: </dt>
                            <dd id="sponsor_dure_fF">...</dd>

                          </dl>

                          <!-- end Profile -->

                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                          <!-- start Cours à prendre -->
                          <!-- table2 -->
                          <table id="finalTable" class="display table-striped responsive-utilities jambo_table" cellspacing="0" width="100%">
                              <thead>
                                  <tr class="headings">
                                      <th>
                                        ID
                                      </th>
                                      <th>SIGLE </th>
                                      <th>Titre du cours </th>
                                      <th>Crédits </th>
                                      <th>Factulté </th>
                                  </tr>
                              </thead>

                              <tfoot>
                                <tr class="headings">
                                    <th>ID </th>
                                    <th>SIGLE </th>
                                    <th>Titre du cours </th>
                                    <th class="total">Crédits </th>
                                    <th>Factulté </th>
                                </tr>
                              </tfoot>
                              <tbody>

                              </tbody>
                          </table>
                          <!-- end Cours à prendre -->

                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                        <!-- start Finance -->
                        <table id="tableFinance2" class="table table-striped responsive-utilities jambo_table" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th> Détail </th>
                              <th> Montant (Ar) </th>
                              <th> Remarque </th>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr class="total">
                              <th> <strong>TOTAL</strong>  </th>
                              <th id="totalTuition2"> Montant (Ar) </th>
                              <th> (A proximité) </th>
                            </tr>
                          </tfoot>
                          <tbody>

                          </tbody>
                        </table>
                        <!-- end Finance -->
                      </div>
                  </div>
                </div>
              </div>
            <?php echo form_close(); ?>
            <hr>
            <div class="form-group">
              <label for="Terminer">Cliquer ici pour terminer l'inscription. </label>
              <a class="btn btn-danger btn-lg" id="submit">
                  <i class="fa fa-send-o"></i> Terminer et Déconnecter
              </a>
            </div>

        </div>

      </div>
      <!-- End SmartWizard Content -->
    </div>
  </div>
</div>
<!-- my customized javascript -->
<!-- <script type="text/javascript" src="<?php echo base_url();?>assets/js/sendAjax.js"></script> -->
<script type="text/javascript">
$("#submit").click(function(){
  // Get some values from elements on the page:
    var $form = $( this ),
      url = $form.attr( "action" );
    var finalTable = $('#finalTable').DataTable();

    var resultat = '';

    for (var i = 0; i < finalTable.rows().data().length; i++) {
      var dataFin = finalTable.rows(i).data();
      resultat += dataFin[0][0] + "," + dataFin[0][3] + ":";
      //console.log(dataFin[0][0] + "," + dataFin[0][3]);
    }

     var dortoir = 0;
    if (document.getElementById('interne').checked) {
      dortoir = 0;
    }
    else {
      dortoir = 1;
    }

    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>" + "index.php/student/finalized",
      dataType: 'text',
      data: {
        student_id: $('#student_idF').text(),
        student_nom: $('#nomF').text(),
        student_prenom: $('#prenomF').text(),
        student_sex: $('#sexeF').text(),
        dateNaissance: $('#dateNaissanceF').text(),
        lieuNaissance: $('#lieuNaissanceF').text(),
        student_tel: $('#telF').text(),
        religion: $('#religionF').text(),
        etat_civil: $('#etat_civil option:selected').val(),
        nom_conjoint: $('#nom_conjointF').text(),
        nb_enfant: $('#nb_enfantF').text(),
        father_name: $('#father_nameF').text(),
        father_prof: $('#father_profF').text(),
        mother_namer: $('#mother_nameF').text(),
        mother_prof: $('#mother_profF').text(),
        parent_adresse: $('#parent_adresseF').text(),
        parent_tel: $('#parent_telF').text(),
        nationalite: $('#nationaliteF').text(),
        num_cin: $('#num_cinF').text(),
        pays_origine: $('#pays_origineF').text(),
        cin_date_delivre: $('#cin_date_delivreF').text(),
        cin_region: $('#cin_regionF').text(),
        num_visa: $('#num_visaF').text(),
        pers_contact_name: $('#pers_contact_nameF').text(),
        pers_adresse: $('#pers_adresseF').text(),
        pers_tel: $('#pers_telF').text(),
        etude_envisage: $('#etude_envisageF').text(),
        etude_option: $('#etude_option').text(),
        sponsor_nom: $('#sponsor_nomF').text(),
        sponsor_prenom: $('#sponsor_prenomF').text(),
        sponsor_tel: $('#sponsor_telF').text(),
        sponsor_adresse: $('#sponsor_adresseF').text(),
        sponsor_dure_f: $('#sponsor_dure_fF').text(),
        endroit: dortoir,
        cours: resultat,
        date: $.now()
        //total: total1
      },
      cache:false,
      success:
          function(data){
            console.log(data);
          }
    });

    window.location = "<?php echo base_url(); ?>" + "index.php/student/logout";
});
</script>
