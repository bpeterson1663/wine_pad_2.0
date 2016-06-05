<?php
  include('scripts/connection.php');
  include('scripts/registration_login_script.php');

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Update Delete</title>
    <script src="vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/update_delete.js" type="text/javascript"></script>
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="styles/styles.css" rel="stylesheet" />
    <link href="styles/animate.css" rel="stylesheet" />
  </head>
<body data-spy="scroll" data-target=".navbar-collapse">
  <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand">winePad</a>
      </div>
      <div class="collapse navbar-collapse">
        <div class="pull-left">
          <ul class="navbar-nav nav">
            <li><a href="home.php">Home</a></li>
            <li><a href="add.php">Add</a></li>
            <li><a href="update_delete.php">Update / Delete</a></li>
            <li><a href="wine_menu.php">Wine Menu</a></li>
          </ul>
        </div>
        <div class="pull-right">
          <ul class="navbar-nav nav">
            <li><a href="index.php?logout=1">Log Out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="container" id="topContainer">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <h1>Update / Delete Wine</h1>
        <div class="wine-feed-box">

        <?php
          $query = "SELECT * FROM winelist_".$_COOKIE['username'].";";
          if($result = mysqli_query($link, $query)){

            while ($row = mysqli_fetch_array($result)){
              echo('<div class="animated fadeInRight underline">
                      <div class="wine-avatar"><img class="pull-left" src="'.$row['Imgurl'].'" /></div>
                      <div><b>'.$row['Name'].' '.$row['Vintage'].' '.$row['Varietal'].'</b></div>
                      <div>Inventory: '.$row['Inventory'].' Cost: $'.$row['Cost'].' Price: $'.$row['Price'].'</div>
                      <form action="scripts/edit.php" method="POST"><button type="submit" value="'.$row['ID'].'" class="btn btn-danger" name="update" >Update</button></form><button value="'.$row['ID'].'" data-id="'.$row['ID'].'" class="btn btn-danger delete" name="delete" data-toggle="modal" data-target="#deleteWine" >Delete</button>
                   </div>');
              }
            }


         ?>


       </div>

      </div>
    </div>
  </div>

<!--Delete Wine Modal-->
  <div class="modal fade" id="deleteWine" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Search Results</h4>
        </div>
        <div class="modal-body">
          <div class="wine-results">
            <p>Are You Sure You Want to Delete This Wine?</p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger confirm-delete" data-dismiss="modal">Yes</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>
  <!--End of Delete Wine Modal-->
  <!--Start of Update Modal-->
  <div class="modal fade" id="updateWine" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Search Results</h4>
        </div>
        <div class="modal-body">
          <div class="wine-results">

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


</body>
</html>
