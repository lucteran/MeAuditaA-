<!DOCTYPE html>
<html lang="en">
<?php
session_start();
 
require_once '../conf.php';
 
require '../sessao.php';

$PDO = db_connect();

?>
<html lang="en">


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
                        <h4 class="page-title">Cadastrar avaliação </h4> </div>
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
                            <p class="text-muted m-b-30 font-13"> Dados do teste realizado </p>
                            <form class="form-horizontal" action="c_criar-avaliacao.php" method="post">
                                <div class="form-group">
                                    
                                    <label class="col-md-12">Empresa  <span class="help"> Auditada </span></label>
                                    <div class="col-md-12">
                                        <select class="form-control" name="empresa" id="empresa">
                                        <option value="" disabled>SELECIONE...</option>
                                        <?php   
                                                $sql = "SELECT idusuario, nome FROM usuario INNER JOIN auditoria ON auditoria.usuario_idusuario = usuario.idusuario WHERE (auditoria.status_auditoria <>3 OR auditoria.status_auditoria<>0) AND auditoria.id_auditor = :idUsuario ORDER BY nome";
                                                $stmt = $PDO->prepare($sql);
                                                $stmt->bindParam(':idUsuario', $_SESSION['UsuarioId']);
                                                $stmt->execute();

                                            while($empresas = $stmt->fetch(PDO::FETCH_OBJ)){
                                                    $nomeEmpresa = $empresas->nome;
                                                    $idEmpresa = $empresas->idusuario;
                                            ?>
                                        <option value="<?php echo $idEmpresa; ?>"><?php echo $nomeEmpresa; ?></option><?php } ?>
                                                
                                        </select> 
                                    </div>      
                                </div>
                                 
                                <div class="form-group">
                                    <label class="col-md-12">Site </label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="site" id="site" placeholder="Site"> </div>   
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-12">Titulo da Vulnerabilidade </label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título"> </div>   
                                </div>
                                
                                
                                 <div class="form-group">
                                    <label class="col-sm-12">Tipo de Vulnerabilidade</label>
                                    <div class="col-sm-12"> 
                                        <select class="form-control" name="categoria" id="tipo">
                                                <option value="" selected>Escolher...</option>
                                            <?php   
                                                $sql = "SELECT idcategoria_vulnerabilidade, nome FROM categoria_vulnerabilidade";
                                                $stmt = $PDO->prepare($sql);
                                                $stmt->execute();

                                            while($vuln = $stmt->fetch(PDO::FETCH_OBJ)){
                                                    $nomevuln = $vuln->nome;
                                                    $idvuln = $vuln->idcategoria_vulnerabilidade;
                                            ?>
                                                <option value="<?php echo $idvuln; ?>" ><?php echo $vuln->nome; 
                                            
                                            ?></option><?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                 <div class="form-group">
                                    <label class="col-md-12">URL com vulnerabilidade </label>
                                    <div class="col-md-12">
                                        <input type="text" name="url" class="form-control" id="url" placeholder="URL"> </div>   
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-12">Nível</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="nivel" id="nivel">
                                                <option selected>Escolher...</option>
                                                <option value="1">Baixa</option>
                                                <option value="2">Média</option>
                                                <option value="3">Alta</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-12">Descrição </label>
                                    <div class="col-md-12">
                                        <textarea class="form-control" name="descricao" rows="5" id="descricao" placeholder="Descreva aqui detalhes sobre os erros encontrados."></textarea>
                                    </div>
                                </div>
                                
                                 <div class="form-group">
                                            <div class="checkbox checkbox-success">
                                                <input id="checkbox1" type="checkbox">
                                                <label for="checkbox1"> Estou de acordo com os termos da plataforma </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Enviar</button>
                                        <button formaction="index.php" class="btn btn-inverse waves-effect waves-light">Cancelar</button>
                                
                                
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
    <script>
            window.alert("<?php echo $_GET['msg']; ?>");
    </script>
</body>


<!-- Mirrored from wrappixel.com/ampleadmin/ampleadmin-html/ampleadmin-minimal/basic-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Dec 2018 03:31:10 GMT -->
</html>
