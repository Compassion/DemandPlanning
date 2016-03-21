<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Demand Planning</title>
    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Demand Planning</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../">Keep it simple. <span class="glyphicon"></span></a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <div class="container-fluid">
        
      <div class="row">
         <div class="col-md-8 col-md-offset-2">
               <div id="ajaxResponse"></div>
                <table class="table table-striped table-responsive" id="demandTable">
                  <thead>
                    <tr>
                      <th>Week Number</th>
                      <th>Week Start</th>
                      <th>Week End</th>
                      <th>Demand</th>
                      <th>Resupply</th>
                      <!--<th>Status</th>-->
                    </tr>
                  </thead>
                </table>

            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <button class="btn btn-primary btn-lg" id="export-btn">Submit to GME</button>
                <button class="btn btn-success btn-lg" id="save-btn">Save</button>
                <p id="export-text"></p>
            </div>
        </div>
    </div>
    <!-- Scripts -->  
    <script type="text/javascript">var GlobalPartnerId = '<?= PARTNER_ID ?>';</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/t/bs/jqc-1.12.0,dt-1.10.11,b-1.1.2,fh-3.1.1/datatables.min.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>