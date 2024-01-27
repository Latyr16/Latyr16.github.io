
<?php
        session_start();
        $login = $_SESSION['login'];
        if(!isset($login)){
            header('Location: index.php?id=55');
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
                  Administrateur 
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
                  <h2>Modifier Superviseur  <small> superviseur</small></h2>
                  <div class="clearfix"></div>
                </div>



            <!--div class="col-md-6 col-sm-12 col-xs-12">
              <-div class="x_panel">
                <div class="x_content"-->
                  <br/>



                  <br/>
			 <?php
	                        $id_admin=$_GET['id_superviseur'];
				require_once 'db_connect.php';
        	       	 	$query  = "SELECT * FROM superviseur where id_superviseur='".$id_admin."' ";
	        	        $result = mysqli_query($conn,$query);
                		if(mysqli_num_rows($result)){
					while ($client = mysqli_fetch_object($result)){
                        ?>
			 <form class="form-horizontal form-label-left"  method="post" action="listersuperviseur_admin.php?id=212">
                  	  <div class="form-group">
                  	    <label class="control-label col-md-3 col-sm-3 col-xs-3">Id superviseur:</label>
                  	    <div class="col-md-9 col-sm-9 col-xs-9">
			    <input type="text" readonly class="form-control" data-inputmask="'mask': '99/99/9999'" name="id_superviseur" value="<?php echo $id_admin;?>" >
                  	      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                  	    </div>
			  </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Prénom:</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control" data-inputmask="'mask': '99/99/9999'" name="prenom" value="<?php echo $client->prenom;?>" >
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Nom:</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control" data-inputmask="'mask': '99/99/9999'" name="nom" value="<?php echo $client->nom;?>" >
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">CNI:</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control" data-inputmask="'mask': '99/99/9999'" name="cni" value="<?php echo $client->cni;?>" >
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Téléphone:</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control" data-inputmask="'mask': '99/99/9999'" name="telephone" value="<?php echo $client->telephone;?>" >
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Email:</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="email" class="form-control" data-inputmask="'mask': '99/99/9999'" name="email" value="<?php echo $client->email;?>" >
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                          </div>

			<?php
			    }
		 	 }
			?>

                    	  <div class="form-group">
                    	    <div class="col-md-9 col-md-offset-3">
                    	    	<button type="submit" class="btn btn-primary">Cancel</button>
                    	    	<button type="submit" class="btn btn-success">Submit</button>
                    	    </div>
                    	  </div>
                 	</form>

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

