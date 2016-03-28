<!-- Large modal -->
          <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

            <div class="form-group">

              <div id="avatar-view" class="avatar-view col-md-3 col-sm-3 col-xs-12 " title="Change the avatar">
                <?php
                  $path= base_url() . 'assets/images/id_card/' . $student->student_id . '.jpg';
                  if (file_exists($path)){
                ?>
                <img src= "<?php echo base_url() . "assets/images/id_card/profile.jpg" ?>" alt="Avatar">
                <?php
                  } else {
                ?>
                <img src= "<?php echo base_url() . "assets/images/id_card/" . $student->student_id . '.jpg' ?>" alt="Avatar">
                <?php
                  }
                ?>
              </div>
            </div>

        </div>

        <div class="col-md-9 col-sm-9 col-xs-12" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Information</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab"  aria-expanded="false">Cours</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Finance</a>
                </li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                  <table class="display table-striped responsive-utilities jambo_table">
                    <tr>
                      <td><strong>Nom et Prénoms: </strong> </td>
                      <td> <?php echo $student->student_nom . ', ' . $student->student_prenom ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Sexe: </strong> </td>
                      <td>
                        <?php
                          ($student->sex == 0) ? $gendre = 'Masculin' : $gendre = 'Féminin';
                          echo $gendre;
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>Faculté: </strong> </td>
                      <td> <?php echo $student->etude_envisage ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Date et lieu de Naissance: </strong> </td>
                      <td> <?php echo $student->dateNaissance . ' à ' . $student->lieuNaissance ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Adresse: </strong> </td>
                      <td> <?php echo $student->student_adresse ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Téléphone: </strong> </td>
                      <td> <?php echo $student->student_tel ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Religion: </strong> </td>
                      <td> <?php echo $student->religion ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Endroit: </strong> </td>
                      <td>
                        <?php
                          ($student->externe == 0) ? $emp = 'Interne' : $emp = 'Externe';
                          echo $emp;
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>Nationalité: </strong> </td>
                      <td> <?php echo $student->nationalite ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Etat civil: </strong> </td>
                      <td>
                        <?php
                          switch ($student->etat_civil) {
                            case 0:
                              $etat = 'Célibataire';
                              break;
                            case 1:
                              $etat = 'Marié(e)';
                              break;
                            case 2:
                              $etat = 'Veuf(ve)';
                            case 3:
                              $etat = 'Divorcé(e)';
                            default:
                              break;
                          }
                          echo $etat;
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>Noms du conjoint: </strong> </td>
                      <td> <?php echo $student->nom_conjoint ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Nombre d'enfants: </strong> </td>
                      <td> <?php echo $student->nb_enfant ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Noms du père: </strong> </td>
                      <td> <?php echo $student->father_name ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Profession du père: </strong> </td>
                      <td> <?php echo $student->father_prof ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Noms de la mère: </strong> </td>
                      <td> <?php echo $student->mother_name ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Profession de la mère: </strong> </td>
                      <td> <?php echo $student->mother_prof ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Adresse des parents: </strong> </td>
                      <td> <?php echo $student->parent_adresse ?> </td>
                    </tr>
                    <tr>
                      <td><strong>Téléphone des parents: </strong> </td>
                      <td> <?php echo $student->parent_tel ?> </td>
                    </tr>
                  </table>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                  <!-- table2 -->
                  <table id="example" class="display table-striped responsive-utilities jambo_table" cellspacing="0" width="100%">
                        <thead>
                            <tr class="headings">
                                <th>ID</th>
                                <th>SIGLE </th>
                                <th>Titre du cours </th>
                                <th>Crédits </th>
                                <th>Factulté </th>
                            </tr>
                        </thead>

                        <tbody>
                          <?php

                            foreach ($list  as $objet) {
                                echo '<tr>';
                                echo '<td>' . $objet['id_cours'] . '</td>';
                                echo '<td>' . $objet['Sigle'] . '</td>';
                                echo '<td>' . $objet['title'] . '</td>';
                                echo '<td>' . $objet['nb_crd'] . '</td>';
                                echo '<td>' . $objet['dep_desc'] . '</td>';
                                echo '</tr>';
                            }

                          ?>
                        </tbody>
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                    <p>en développement </p>
                </div>
            </div>
        </div>

          <div class="col-md-9 col-sm-9 col-xs-12">

          </div>


<!-- finish large modal -->
