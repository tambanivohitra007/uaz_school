<div id="step-2">
    <!-- page content -->
      <div class="" role="main">
          <div class="">

              <div class="clearfix"></div>

              <div class="row">

                  <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                          <div class="x_title">
                              <h2>Cours à prendre <small> 2ème semestre</small></h2>
                              <ul class="nav navbar-right panel_toolbox">
                                  <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                                  </li>
                                  <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                      <ul class="dropdown-menu" role="menu">
                                          <li><a href="#">Settings 1</a>
                                          </li>
                                          <li><a href="#">Settings 2</a>
                                          </li>
                                      </ul>
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

                                      foreach ($list  as $objet) {
                                          echo '<tr>';
                                          // echo '<td class="a-center ">
                                          //     <input type="checkbox" class="flat" name="table_records[]" value =' . $objet['id_cours'] . '>
                                          // </td>';
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
                                          <!-- <th>
                                              <input type="checkbox" class="tableflat">
                                          </th> -->
                                          <th>ID</th>
                                          <th>SIGLE </th>
                                          <th>Titre du cours </th>
                                          <th>Crédits </th>
                                          <th>Factulté </th>
                                      </tr>
                                  </thead>

                                  <tfoot>
                                    <tr class="headings">
                                        <th>
                                            ID
                                        </th>
                                        <th>SIGLE </th>
                                        <th>Titre du cours </th>
                                        <th class="total">Crédits </th>
                                        <th>Factulté </th>
                                    </tr>
                                  </tfoot>
                                  <tbody>

                                  </tbody>
                              </table>
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <button id="LeftMove" class="btn btn-danger">  Enlever <span class="glyphicon glyphicon-remove-circle"></span></button>
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
</div>
