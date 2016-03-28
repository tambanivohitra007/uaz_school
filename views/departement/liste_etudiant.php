<!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Liste des étudiants en <?php echo $dep; ?></h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Département de <?php echo $dep; ?></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>

                                <table id="table" class="table table-striped projects responsive-utilities jambo_table">
                                        <thead>
                                            <tr>

                                                <th style="width: 10%">ID</th>
                                                <th>Noms et Prénoms de l'étudiant</th>
                                                <th style="width: 15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                              foreach ($list  as $objet) {
                                                  echo '<tr>';
                                                  echo '<td>' .  $objet['student_id'] . '</td>';
                                                  echo '<td>' . $objet['student_nom'] . ', ' . $objet['student_prenom'] .'</td>';
                                            ?>
                                                  <td><a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php/departement/popup/<?php echo $objet['student_id']; ?>');" class="btn btn-danger btn-xs" id="voir"><i class="fa fa-eye"></i> Voir </a></td>
                                            <?php
                                                  echo '</tr>';
                                              }
                                            ?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Datatables -->
                   <script src= "<?php echo base_url(); ?>assets/js/datatables/js/jquery.dataTables.js"></script>
                   <script src="<?php echo base_url(); ?>assets/js/datatables/tools/js/dataTables.tableTools.js"></script>


                   <script>
                       $(document).ready(function() {

                       $('#table').DataTable( {
                         'iDisplayLength': 10,
                         "sPaginationType": "full_numbers",
                         "language": {
                             "lengthMenu": "Afficher _MENU_ enregistrements par page",
                             "zeroRecords": "Rien trouvé - Désolé",
                             "info": "Montrer page _PAGE_ sur _PAGES_",
                             "infoEmpty": "Pas d'enregistrements disponible",
                             "infoFiltered": "(filtré par _MAX_ total d'enregistrements)",
                             "sSearch": "Rechercher: ",
                             "paginate": {
                               "last": "Dernier",
                               "first": "Premier",
                               "previous": "Précédent",
                               "next": "Suivant"
                             }
                           }
                        } );
                     } );

                     function showAjaxModal(url)
                     {
                       $('#modal_ajax').modal('show', {backdrop: 'false'});

                       $.ajax({
                         url: url,
                         success: function(response)
                         {
                           $('#modal_ajax .modal-body').html(response);
                         }
                       });
                     }
                   </script>

                   <!-- (Ajax Modal)-->
                   <div class="modal fade modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal_ajax">
                     <div class="modal-dialog modal-lg">
                         <div class="modal-content">

                             <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 <h4 class="modal-title">Détail sur l'étudiant</h4>
                             </div>

                             <div class="modal-body" style="height:400px; overflow:auto;">



                             </div>

                             <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                             </div>
                         </div>
                     </div>
                   </div>
