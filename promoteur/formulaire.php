
<?php
        session_start();
        $id_agent = $_SESSION['id_agent'];
        if(!isset($id_agent)){
            header('Location: ../index.php?id=55');
            exit();
	}
	else{
                require_once('header2.php');
        }
?>

     <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>
                  Agent
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
                  <h2>Vente <small>Agent</small></h2>
                  <div class="clearfix"></div>
                </div>





        <?php

                require_once '../db_connect.php';
                $query  = "SELECT * FROM agent where id_agent='".$id_agent."' ";
                $result = mysqli_query($conn,$query);
                if(mysqli_num_rows($result)){
                        $client = mysqli_fetch_object($result);
                        $id_promoteur=$client->id_promoteur;
                }
        ?>



			 <form  enctype="multipart/form-data" method="post" action="insert_client.php?id_agent=<?php echo $id_agent;?>&id_promoteur=<?php echo $id_promoteur ;?>">
			<h4>Formulaire d'inscription</h4>
                          <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control" placeholder="Votre prenom" name="prenom" >
                            </div>
			   <label class="control-label col-md-3 col-sm-3 col-xs-3">Prénom</label>
                          </div>
				<br/>
                          <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control" placeholder="Votre nom"  name="nom"  >
                            </div>
			   <label class="control-label col-md-3 col-sm-3 col-xs-3">Nom</label>
                          </div>
				<br/>
                          <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control" name="date_naissance" placeholder="Date Naissance" >
                            </div>
			   <label class="control-label col-md-3 col-sm-3 col-xs-3">Date Naissance</label>
                          </div>
				<br/>
                          <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control" placeholder="Lieu naissance" name="lieu_naissance" >
                            </div>
			   <label class="control-label col-md-3 col-sm-3 col-xs-3">Lieu Naissance</label>
			  </div>
				<br/>
			  <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control"  name="date_delivrance" placeholder="Date délivrance"  >
                            </div>
			   <label class="control-label col-md-3 col-sm-3 col-xs-3">Date délivrance</label>
			  </div>
				<br/>
			  <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control" name="date_expiration" placeholder="Date expiration"  >
                            </div>
			   <label class="control-label col-md-3 col-sm-3 col-xs-3">Date expiration</label>
                          </div>
				<br/>
                          <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control" placeholder="Numéro CNI" name="numero_cni" required>
			    </div>
			   <label class="control-label col-md-3 col-sm-3 col-xs-3">Numéro CNI</label>
			  </div>
				<br/>
			  <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control" placeholder="MSISDN" name="MSISDN" required>
                            </div>
			   <label class="control-label col-md-3 col-sm-3 col-xs-3">MSISDN</label>
			  </div>
				<br/>
			  <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control" placeholder="Téléphone" name="telephone" >
                            </div>
			   <label class="control-label col-md-3 col-sm-3 col-xs-3">Téléphone</label>
                          </div>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
			  <div class="form-group">
                              <div class="col-md-9 col-sm-9 col-xs-9">
                            	<input type="file" id="files1" name="photo_recto" accept="image/*" capture="camera" required>
                              </div>
                            	<label for="files1" class="control-label col-md-3 col-sm-3 col-xs-3" >Carte recto</label>
                          </div>
			  <div class="form-group">
                              <div class="col-md-9 col-sm-9 col-xs-9">
                           	 <input type="file" id="files2" name="photo_verso" accept="image/*" capture="camera" required>
                              </div>
                            	<label for="files2" class="control-label col-md-3 col-sm-3 col-xs-3" >Carte verso</label>
                          </div>
                    	  <div class="form-group">
                    	    <div class="col-md-9 col-md-offset-3">
                    	    	<button type="reset" class="btn btn-primary">Cancel</button>
                    	    	<button name="uploadBtn"  value="Upload"  type="submit" class="btn btn-success">Submit</button>
                    	    </div>
                    	  </div>
                 	</form-->

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

