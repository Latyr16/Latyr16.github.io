
<?php
        session_start();
        $id_superviseur = $_SESSION['id_superviseur'];
        if(!isset($id_superviseur)){
            header('Location: ../index.php?id=55');
            exit();
        }
        else {
                require_once('header.php');
        }
?>
      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>
                  Liste des clients validés 
                    <small>
                    </small>
                </h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                   <p><!--input  class="btn btn-default" type="submit" value="Go!"/-->
                   <!--span class="input-group-btn">
                         <button class="btn btn-default" type="button"-->
                        <!--/button>
                  </span-->
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>


          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Liste des Clients qui sont validés <small> </small></h2>
                  <div class="clearfix"></div>
                </div>



            <!--div class="col-md-6 col-sm-12 col-xs-12">
              <-div class="x_panel">
                <div class="x_content"-->
                  <br/>
        <?php
		require_once 'db_connect.php';
		$date = date("Y-m-d"); 
                $query  = "SELECT * FROM client_valider where id_superviseur='".$id_superviseur."' and date_validation='".$date."' ";
                $result = mysqli_query($conn,$query);
                if(mysqli_num_rows($result)){
                        ?>

		<table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                             <tr>
                               <td  align="center"><strong>Id</strong></td><td  align="center"><strong>Prénom</strong></td> <td align="center" ><strong>Nom</strong></td> <td align="center" ><strong>Date naissance</strong></td> <td align="center" ><strong>Lieu Naissance</strong></td> <td align="center" ><strong>Date délivrance</strong></td><td align="center" ><strong>Date expiration</strong></td><td align="center" ><strong>CNI</strong></td> <td align="center" ><strong>Phone</strong></td><!--td  align="center"><strong>ID Puce</strong></td><td align="center"><strong>Carte</strong></td-->
                            </tr>
                    </thead>
                    <tbody>
			<?php while ($client = mysqli_fetch_object($result)){
                                 ?>
                                <tr>
                                    <td>
                                        <?php echo $client->id_promoteur ; ?>
                                    </td>
                                    <td>
                                        <?php echo $client->prenom ; ?>
                                    </td>
                                    <td>
                                        <?php echo $client->nom ; ?>
                                    </td>
                                    <td>
                                        <?php echo $client->date_naissance ; ?>
                                    </td>
                                    <td>
                                        <?php echo $client->lieu_naissance ; ?>
                                    </td>
                                    <td>
                                        <?php echo $client->date_delivrance ; ?>
                                    </td>
                                    <td>
                                        <?php echo $client->date_expiration ; ?>
                                    </td>
                                    <td>
                                        <?php echo $client->cni ; ?>
                                    </td>
                                    <td>
                                        <?php echo $client->telephone ; ?>
                                    </td>
                                    <!--td>
                                        <?php echo $client->MSISDN; ?>
                                    </td>
				    <td align="center">
					<img src="../promoteur/images_carte/<?php echo $client->photo_recto; ?>" height="150" width="100" / >
					<img src="../promoteur/images_carte/<?php echo $client->photo_verso; ?>"height="150" width="100"  />
				    </td-->
                                </tr>
                                <?php } ?>

                    </tbody>
                  </table>

         <?php }
                else {

                        echo "  <script type=\"text/javascript\">alert(\"Vous n'avez pas encore valider de clients\");
                                 location =\"./superviseur.php?id=125\"
                                </script>";
                }

                ?>


                <!--/div>
              </div>
            </div-->
            <!-- /page content -->
          </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
          <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
          </ul>
          <div class="clearfix"></div>
          <div id="notif-group" class="tabbed_notifications"></div>
        </div>

        <script src="js/bootstrap.min.js"></script>

        <!-- bootstrap progress js -->
        <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
        <!-- icheck -->
        <script src="js/icheck/icheck.min.js"></script>

        <script src="js/custom.js"></script>


        <!-- Datatables -->
        <!-- <script src="js/datatables/js/jquery.dataTables.js"></script>
  <script src="js/datatables/tools/js/dataTables.tableTools.js"></script> -->

        <!-- Datatables-->
        <script src="js/datatables/jquery.dataTables.min.js"></script>
        <script src="js/datatables/dataTables.bootstrap.js"></script>
        <script src="js/datatables/dataTables.buttons.min.js"></script>
        <script src="js/datatables/buttons.bootstrap.min.js"></script>
        <script src="js/datatables/jszip.min.js"></script>
        <script src="js/datatables/pdfmake.min.js"></script>
        <script src="js/datatables/vfs_fonts.js"></script>
        <script src="js/datatables/buttons.html5.min.js"></script>
        <script src="js/datatables/buttons.print.min.js"></script>
        <script src="js/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="js/datatables/dataTables.keyTable.min.js"></script>
        <script src="js/datatables/dataTables.responsive.min.js"></script>
        <script src="js/datatables/responsive.bootstrap.min.js"></script>
        <script src="js/datatables/dataTables.scroller.min.js"></script>


        <!-- pace -->
        <script src="js/pace/pace.min.js"></script>
        <script>
          var handleDataTableButtons = function() {
              "use strict";
              0 !==$("#datatable-buttons").length  && $("#datatable-buttons").DataTable({
                dom: "Bfrtip",
                buttons: [{
                  extend: "copy",
                  className: "btn-sm"
                }, {
                  extend: "csv",
                  className: "btn-sm"
                }, {
                  extend: "excel",
                  className: "btn-sm"
                }, {
                  extend: "pdf",
                  className: "btn-sm"
                }, {
                  extend: "print",
                  className: "btn-sm"
                }],
                 responsive: !0
              })
            },
             TableManageButtons = function() {
                "use strict";
                return {
                     init: function() { 
                     handleDataTableButtons()
                }
              }
            }();
        </script>
        <script type="text/javascript">
          $(document).ready(function() {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({
              keys: true
            });
            $('#datatable-responsive').DataTable();
            $('#datatable-scroller').DataTable({
              ajax: "js/datatables/json/scroller-demo.json",
              deferRender: true,
              scrollY: 380,
              scrollCollapse: true,
              scroller: true
            });
            var table = $('#datatable-fixed-header').DataTable({
              fixedHeader: true
            });
          }); 
            TableManageButtons.init();
        </script>

