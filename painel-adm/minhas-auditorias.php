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
    <title>Ample Admin Template - The Ultimate Multipurpose admin template</title>
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
                        <h4 class="page-title">Ver todas as auditorias</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                        <ol class="breadcrumb">
                            <li><a href="#">Inicio</a></li>
                            <li><a href="#">Auditorias</a></li>
                            <li class="active">Ver minhas auditorias</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- ============================================================== -->
                <!-- Demo table -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">Auditorias - ordenadas por data</div>
                            <div class="table-responsive">
                                <table class="table table-hover manage-u-table">
                                    <thead>
                                        <tr>
                                            <th style="width: 70px;" class="text-center">DATA</th>
                                            <th>EMPRESA</th>
                                            <th>STATUS</th>
                                            <th>AVALIAÇÃO</th>
                                            <th>SOLUÇÃO</th>
                                            <th>OPÇÕES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php   
                                                $sql = "SELECT * FROM auditoria INNER JOIN usuario ON usuario_idusuario = idusuario WHERE auditoria.id_auditor = :idUsuario ORDER BY status_auditoria";
                                                $stmt = $PDO->prepare($sql);
                                                $stmt->bindParam(':idUsuario', $_SESSION['UsuarioId']);

                                                $stmt->execute();

                                            while($empresas = $stmt->fetch(PDO::FETCH_OBJ)){
                                                    $nomeEmpresa = $empresas->nome;
                                                    $statusEmpresa = $empresas->status_auditoria;
                                                    $data = $empresas->data_auditoria;
                                                    $emailEmpresa = $empresas->email;
                                                    $solucaoEmpresa = $empresas->solucao;
                                                    $auditoria = $empresas->idauditoria;
                                                $sql2 = "SELECT * FROM avaliacao WHERE auditoria_idauditoria = :idauditoria";
                                                $stmt2 = $PDO->prepare($sql2);

                                                $stmt2->bindParam(':idauditoria', $idauditoria);

                                                $stmt2->execute();

                                                $avaliacao = $stmt2->fetchAll(PDO::FETCH_ASSOC);

                                            ?>
                                        <tr data-toggle="modal" data-target="#exampleModal<?php echo $empresas->idauditoria; ?>">
                                            <td class="text-center"><?php $data = date('d-m-y', strtotime($data)); echo $data; ?></td>
                                            <td><span class="font-medium"><?php echo $nomeEmpresa; ?></span>
                                            </td>
                                            <td>
                                                <span class="text-muted"><?php 
                                                if($statusEmpresa==0)
                                                    echo "Cancelada";
                                                else if($statusEmpresa==1)
                                                    echo "Pendente";
                                                else if($statusEmpresa==2)
                                                    echo "Realizada";
                                                else
                                                    echo "Solucionada";
                                                                         ?></span></td>
                                            <td>
                                                <span class="text-muted"><?php if(count($avaliacao)==0)
                                                                            echo "Não"; 
                                                                        else
                                                                            echo "Sim";
                                                                         ?>                                                
                                                </span></td>
                                            <td>
                                                <span class="text-muted"><?php if($solucaoEmpresa==0)
                                                                                    echo "Não Resolvido";
                                                                                else
                                                                                    echo "Resolvido";
                                                                                ?></span>
                                            </td>
                                            <td>
                                                <button type="button" onclick="editarAuditoria(<?php echo $empresas->idauditoria; ?>)" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-pencil-alt"></i></button>
                                                <button type="button" onclick="excluirAuditoria(<?php echo $empresas->idauditoria; ?>)" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="icon-trash"></i></button>
                                            </td>
                                        </tr>
                                        
                                        <div class="modal fade" id="exampleModal<?php echo $empresas->idauditoria;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><b>Avaliação</b></h5>
                                                        </div> 
                                                        <?php 
                                                $sql3 = "SELECT * FROM `avaliacao` inner join categoria_vulnerabilidade on avaliacao.categoria_vulnerabilidade_idcategoria_vulnerabilidade = categoria_vulnerabilidade.idcategoria_vulnerabilidade where auditoria_idauditoria = (SELECT idauditoria FROM auditoria WHERE idauditoria = :idauditoria) ORDER BY data_avaliacao";
                                                $stmt3 = $PDO->prepare($sql3);
                                                $stmt3->bindParam(':idauditoria', $empresas->idauditoria);

                                                $stmt3->execute();

                                                while($avaliacao = $stmt3->fetch(PDO::FETCH_OBJ)){
                                                    $titulo = $avaliacao->titulo;
                                                    $data = $avaliacao->data_avaliacao;
                                                    $categoria = $avaliacao->nome;
                                                    $site = $avaliacao->site;
                                                    $url = $avaliacao->url_vulnerabilidade;
                                                    $nivel = $avaliacao->nivel;   
                                                    $descricao = $avaliacao->descricao;   
                                                        ?>
                                                    <div class="modal-body">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><b><?php echo $titulo;?></b></h5>
                                                        </div> 
                                                        <?php echo "Data: ".$data."<br><br>";
                                                        echo "Categoria do erro: ".$categoria."<br><br>";
                                                        echo "Site: ".$site."<br><br>";
                                                        echo "URL: ".$url."<br><br>";
                                                        echo "Nível do erro: ".$nivel."<br><br>";   
                                                        echo "Descrição do Problema: ".$descricao."<br><br>"; 
                                                } ?>
                                                    <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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
</body>


<!-- Mirrored from wrappixel.com/ampleadmin/ampleadmin-html/ampleadmin-minimal/basic-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Dec 2018 03:31:10 GMT -->
</html>
