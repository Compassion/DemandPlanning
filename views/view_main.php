<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Demand Planning</title>
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-blue.min.css" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
    <link href="css/style.css" rel="stylesheet" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--overlay-drawer-button">
        <header class="mdl-layout__header mdl-layout__header--scroll">
            <div class="mdl-layout__header-row">
                <!-- Title -->
                <span class="mdl-layout-title">Demand Planning</span>
                <!-- Add spacer, to align navigation to the right -->
                <div class="mdl-layout-spacer"></div>
                <!-- Navigation -->
                <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href=""></a>
                </nav>
            </div>
<<<<<<< HEAD
        </header>
        <main class="mdl-layout__content">
        <div class="page-content">
          <div class="mdl-grid" style="padding: 20px;">
            <div class="mdl-layout-spacer"></div>
              <div class="mdl-cell mdl-cell--7-col">
               <div class="" id="ajaxResponse"></div>
                  <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" id="demandTable" width="92%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Week Start</th>
                        <th>Week End</th>
                        <th>Demand</th>
                        <th>Resupply</th>
                        <!--<th>Status</th>-->
                      </tr>
                    </thead>
                  </table>
              </div>
            <div class="mdl-layout-spacer"></div>
          </div>
        <div class="mdl-grid" style="margin-top:20px;">
          <div class="mdl-layout-spacer"></div>
            <div class="mdl-cell mdl-cell--4-col mdl-typography--text-center">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" id="export-btn" style="margin-left:5px;margin-right:5px">Export</button>
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" id="save-btn" style="margin-left:5px;margin-right:5px">Save</button>
                <p id="export-text" ></p>
=======
        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <button class="btn btn-primary btn-lg" id="export-btn">Submit to GMC</button>
                <button class="btn btn-success btn-lg" id="save-btn">Save</button>
                <p id="export-text"></p>
>>>>>>> bacbd101b787519bd99da6963d6037af7af1e624
            </div>
          <div class="mdl-layout-spacer"></div>
        </div>
    </div>
    <!-- Scripts -->  
    <script type="text/javascript">var GlobalPartnerId = '<?= PARTNER_ID ?>';</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/t/bs/jqc-1.12.0,dt-1.10.11,b-1.1.2,fh-3.1.1/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.material.min.js"></script>
    <script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>