<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Demand Planning</title>
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-blue.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/dataTables.material.min.css" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
    <link href="css/style.css" rel="stylesheet" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
  </head>
  <body class="mdl-base">
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
        </header>
        <main class="mdl-layout__content">
            <div class="page-content mdl-layout__tab-panel is-active">
                <div class="section--center mdl-grid mdl-grid--no-spacing">
                    <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
                    <div class="mdl-cell mdl-cell--8-col">
                        <div class="" id="ajaxResponse"></div>
                        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" id="demandTable" width="100%">
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
                </div>
                <div class="section--center mdl-grid mdl-grid--no-spacing">
                    <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
                    <div class="mdl-cell mdl-cell--8-col mdl-typography--text-center">
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" id="export-btn">Export</button>
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" id="save-btn">Save</button>
                        <p id="export-text" ></p>
                    </div>
                </div>
                <div aria-live="assertive" aria-atomic="true" aria-relevant="text" class="mdl-js-snackbar mdl-snackbar">
                    <div class="mdl-snackbar__text"></div>
                    <button class="mdl-snackbar__action" type="button"></button>
                </div>
            </div>
        </main>
    </div>
    <!-- Scripts -->  
    <script type="text/javascript">var GlobalPartnerId = '<?= PARTNER_ID ?>';</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/t/bs/jqc-1.12.0,dt-1.10.11,b-1.1.2,fh-3.1.1/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.material.min.js"></script>
    
    <script src="js/app.js"></script>
  </body>
</html>