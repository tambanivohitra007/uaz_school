<!-- page content -->
  <div class="" role="main">
      <div class="">

          <div class="clearfix"></div>

          <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <h1><?php echo $student->student_nom; ?>  <small class="green"> -- <?php echo $student->student_id; ?>  </small></h1>
                <hr>
                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Cours à prendre <small> 2ème semestre</small></h2>
                          <ul class="nav navbar-right panel_toolbox">
                              <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                              </li>

                              <li><a href="#"><i class="fa fa-close"></i></a>
                              </li>
                          </ul>
                          <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                          <table id="table1" class="display table-striped responsive-utilities jambo_table" cellspacing="0" width="100%">
                              <thead>
                                  <tr class="headings">
                                      <!-- <th>
                                          CHECK
                                      </th> -->
                                      <th>ID </th>
                                      <th>SIGLE </th>
                                      <th>Titre du cours </th>
                                      <th>Crédits </th>
                                      <th>Factulté </th>
                                  </tr>
                              </thead>
                              <tfoot>
                                <tr>
                                    <!-- <th>ID </th> -->
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                </tr>
                              </tfoot>
                              <tbody>

                                <?php

                                  foreach ($cours  as $objet) {
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
                          <button id="RightMove" class="btn btn-primary">Prendre le(s) cours <span class="glyphicon glyphicon-share-alt"></span></button>
                          <br>
                          <br>
                          <hr>
                          <!-- table2 -->
                          <table id="table2" class="display table-striped responsive-utilities jambo_table" cellspacing="0" width="100%">
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

                                  foreach ($std_course  as $objet) {
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
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <button id="LeftMove" class="btn btn-danger">  Enlever <span class="glyphicon glyphicon-remove-circle"></span></button>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <div class="btn-group">
                      <button type="button" onclick="updated();" class="btn btn-success">Enregistrer</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>
                  </div>
              </div>

              <br />
              <br />
              <br />

          </div>
      </div>

      </div>
      <!-- /page content -->
      <!-- Datatables -->
      <script src="<?php echo base_url();?>assets/js/datatables/js/jquery.dataTables.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>assets/js/datatable.hack.js"></script>

      <script type="text/javascript">

        function updated(){
          var finalTable = $('#table2').DataTable();

          var resultat = '';

          for (var i = 0; i < finalTable.rows().data().length; i++) {
            var dataFin = finalTable.rows(i).data();
            resultat += dataFin[0][0] + "," + dataFin[0][3] + ":";
            //console.log(dataFin[0][0] + "," + dataFin[0][3]);
          }

          $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/departement/checkCourse",
            dataType: 'text',
            data: {
              cours: resultat,
              student_id: '<?php echo $student->student_id; ?>'

            },
            cache:false,
            success:
                function(data){
                  console.log(data);
                }
          });

          window.location = "<?php echo base_url(); ?>" + "index.php/departement/inscription";
        }
      </script>
