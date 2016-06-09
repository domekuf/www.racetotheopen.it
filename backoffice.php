<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Backoffice</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">
    
    
    <!-- UsKids CSS -->
    <link rel="stylesheet" href="css/uk/main.css" type="text/css">
    
    
    <!-- UsKids CSS -->
    <link rel="stylesheet" href="css/datepicker/bootstrap-datepicker.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>



<body id="page-top">


    <div class="backoffice container">
        <div class="row backoffice">
            <!--div class="well well-lg col-xs-12 col-md-5 mail-list">
                
            </div-->
            <div class="col-xs-12">
                <div class="panel panel-default">
                  <!-- Default panel contents -->
                  <div class="panel-heading">Iscritti</div>
                  <div class="panel-body">
                    <p>Elenco degli iscritti, sono preselezionati quelli di cui manca il pagamento</p>
                  </div>
                
                  <!-- Table -->
                  <form action="sollecito.php"  class="ajaxForm" id="form-sollecito" data-callback="outFill" data-output="o-sollecito" method="POST" >
                        <table class="table"> 
                            <thead> 
                                <tr> <th>#</th> <th>Nome</th> <th>Cognome</th> <th>Username</th> <th>idUSK</th> </tr> 
                            </thead> 
                            <tbody> 
                                <?php
                                    include('lib/pagati.php');
                                ?>
                            </tbody> 
                        </table>
                        <div class="text-center form-group">
                            <button class="btn btn-primary" type="submit">Invia Mail Sollecito</button>
                        </div>
                        <div class="text-center form-group">
                            <span id="o-sollecito"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	
    <script type="text/javascript">
        
    function outFill(id,msg){
        $('#'+id).html(msg);
    }

    </script>


	<script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>

	
	<!-- USKids -->
    <script src="js/uk/main.js"></script>
    <script src="js/uk/backoffice.js"></script>
    <script src="js/uk/ajaxForm.js"></script>
    
    <!--ajax Setup -->
	<script src="js/ajax_setup.js"></script>
	
	<!-- Bootstrap vaildator -->
	<script src="js/validator.min.js"></script>
	
	<!-- Bootstrap datepicker -->
	<script src="js/datepicker/bootstrap-datepicker.js"></script>
	
</body>
 
</html>
