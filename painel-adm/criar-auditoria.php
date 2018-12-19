<!DOCTYPE html>
<html lang="en">
<?php
    
session_start();
    
require_once '../conf.php';
 
require '../sessao.php';

$PDO = db_connect();

?>

<!-- Mirrored from wrappixel.com/ampleadmin/ampleadmin-html/ampleadmin-minimal/basic-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Dec 2018 03:31:09 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <title>Audita aí</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->

        <?php include "painel-superior.php"; ?>
        
        <?php include "menu-lateral.php" ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Cadastrar auditorias </h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                        <ol class="breadcrumb">
                            <li><a href="#">Inicio</a></li>
                            <li><a href="#">Auditorias</a></li>
                            <li class="active">Cadastrar avaliação da auditoria</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- ============================================================== -->
                <!-- Demo table -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <p class="text-muted m-b-30 font-13"> Escolha uma empresa para iniciar a auditoria:</p>
                            <form class="form-horizontal" action="c_criar-auditoria.php" method="post">
                                 <div class="form-group">
                                    <label class="col-sm-12">Empresa</label>
                                    <div class="col-sm-12">
                                        <select name="empresa" class="form-control" id="tipo">
                                                <option selected disabled>Selecione...</option>
                                            <?php 

    $sql = "SELECT * FROM usuario INNER JOIN auditoria ON usuario.idusuario = auditoria.usuario_idusuario WHERE usuario.tipo_usuario = :tipo AND (auditoria.id_auditor=0 AND auditoria.status_auditoria=1) ORDER BY idusuario";
        $stmt = $PDO->prepare($sql);
        $tipo = 'E';
        $stmt->bindParam(':tipo', $tipo);
        
        $stmt->execute();
        

        while($empresa = $stmt->fetch(PDO::FETCH_OBJ)){
            $idEmpresa = $empresa->idusuario;
            $nomeEmpresa = $empresa->nome;
            echo "<option value=\"$idEmpresa\">$nomeEmpresa</option>";
        }
                                            ?>
                                                
                                        </select>
                                    </div>
                                </div>
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Auditar</button>
                                        <button formaction="index.php" onclick="href" class="btn btn-inverse waves-effect waves-light">Cancelar</button>
                                
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <?php include "rodape.php"; ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- jQuery peity -->
    <script src="plugins/bower_components/peity/jquery.peity.min.js"></script>
    <script src="plugins/bower_components/peity/jquery.peity.init.js"></script>
    <!--Style Switcher -->
    <script src="plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
     <?php if(isset($_GET['msg']) || !empty($_GET['msg'])){
    ?>
    <script>
            window.alert("<?php echo $_GET['msg']; ?>");
    </script>
    <?php } 
    ?> 
</body>


<!-- Mirrored from wrappixel.com/ampleadmin/ampleadmin-html/ampleadmin-minimal/basic-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Dec 2018 03:31:10 GMT -->
</html> 