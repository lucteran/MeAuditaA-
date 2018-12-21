<?php
session_start();
 
require_once '../conf.php';
 
require '../sessao.php';

$PDO = db_connect();

?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from wrappixel.com/ampleadmin/ampleadmin-html/ampleadmin-minimal/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Dec 2018 03:29:54 GMT -->
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
    <!-- toast CSS -->
    <link href="plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- Calendar CSS -->
    <link href="plugins/bower_components/calendar/dist/fullcalendar.css" rel="stylesheet" />
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
    <div id="wrapper">
        <?php include "painel-superior.php"; ?>
        
        <?php include "menu-lateral.php" ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Inicio</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <?php 
                                                        /* 
                                    |======STATUS======|
                                    |Pendente --------1|
                                    |Realizadas ----- 2|
                                    |Solucionadas --- 3|
                                    |Canceladas ----- 4|
                                    |==================|
                                                        */

                                $sql = "SELECT * FROM auditoria WHERE status_auditoria = :status AND id_auditor = :idUsuario";
                                $stmt = $PDO->prepare($sql);
                                $status = '1';
                                $stmt->bindParam(':status', $status);
                                $stmt->bindParam(':idUsuario', $_SESSION['UsuarioId']);

                                $stmt->execute();

                                $statusAuditoria = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            ?>
                            <h3 class="box-title">Pendentes</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <i class="fas fa-hourglass-half"></i>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple"><?php echo count($statusAuditoria); ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <?php   
                                $sql = "SELECT * FROM auditoria WHERE status_auditoria = :status AND id_auditor = :idUsuario";
                                $stmt = $PDO->prepare($sql);
                                $status =  '2';
                                $stmt->bindParam(':status', $status);
                                $stmt->bindParam(':idUsuario', $_SESSION['UsuarioId']);

                                $stmt->execute();

                                $statusAuditoria = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Realizadas</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <i class="fas fa-check"></i>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success"><?php echo count($statusAuditoria); ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <?php   
                                $sql = "SELECT * FROM auditoria WHERE status_auditoria = :status AND id_auditor = :idUsuario";
                                $stmt = $PDO->prepare($sql);

                                $status = '3';
                                $stmt->bindParam(':status', $status);
                                $stmt->bindParam(':idUsuario', $_SESSION['UsuarioId']);

                                $stmt->execute();

                                $statusAuditoria = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Solucionadas</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <i class="fas fa-copy"></i>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info"><?php echo count($statusAuditoria); ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <?php 
                            
                                $sql = "SELECT * FROM auditoria WHERE status_auditoria = :status AND id_auditor = :idUsuario";
                                $stmt = $PDO->prepare($sql);
                                
                                $status = '0';
                                $stmt->bindParam(':status', $status);
                                $stmt->bindParam(':idUsuario', $_SESSION['UsuarioId']);

                                $stmt->execute();

                                $statusAuditoria = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            ?>
                            <h3 class="box-title">Canceladas</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <i class="fas fa-ban"></i>
                                </li>
                                <li class="text-right"><i class="ti-arrow-down text-danger"></i> <span class="text-danger"><?php echo count($statusAuditoria); ?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/.row -->
                <!-- ============================================================== -->
                <!-- calendar widgets -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- .col -->
                    <div class="col-lg-4 col-md-10 col-sm-12">
                        <div class="panel">
                            <div class="sk-chat-widgets">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        AUDITADORIAS SEM RESPOSTAS
                                    </div>
                                    <div class="panel-body">
                                        <ul class="chatonline">
                                             <?php   
                                                $sql = "SELECT * FROM usuario INNER JOIN auditoria ON auditoria.usuario_idusuario = usuario.idusuario WHERE auditoria.status_auditoria = :status AND auditoria.id_auditor = :idUsuario LIMIT 5";
                                                $stmt = $PDO->prepare($sql);
                                                $status =  '2';
                                                $stmt->bindParam(':status', $status);
                                                $stmt->bindParam(':idUsuario', $_SESSION['UsuarioId']);

                                                $stmt->execute();

                                            while($empresas = $stmt->fetch(PDO::FETCH_OBJ)){
                                                    $nomeEmpresa = $empresas->nome;
                                                    $telEmpresa = $empresas->telefone;
                                                    $emailEmpresa = $empresas->email;
                                            ?>    
                                            <li>
                                                <div class="call-chat">
                                                    <a class="btn btn-success btn-circle btn-lg" href="tel:<?php echo $telEmpresa; ?>" type="button"><i class="fa fa-phone"></i></a>
                                                    <a class="btn btn-info btn-circle btn-lg" href="mailto:<?php echo $emailEmpresa; ?>" type="button"><i class="fas fa-comments"></i></a>
                                                </div>
                                                <a href="javascript:void(0)"><img src="plugins/images/users/<?php
                                                    $thumbnail = $_SESSION['UsuarioId'];
                                                    if(file_exists($thumbnail . ".png")){
                                                        $thumbnail = $thumbnail . ".png";
                                                    } else if(file_exists($thumbnail . ".jpg")) {
                                                        $thumbnail = $thumbnail . ".jpg";
                                                    } else if(file_exists($thumbnail . ".jpeg")) {
                                                        $thumbnail = $thumbnail . ".jpeg";
                                                    } else if(file_exists($thumbnail . ".gif")) {
                                                        $thumbnail = $thumbnail . ".gif";
                                                    } else {
                                                        $thumbnail = "default.png";
                                                    }
                                                    echo "$thumbnail"; ?>" alt="user-img" class="img-circle"> <span><?php echo $nomeEmpresa; ?></span></a>
                                            </li>
                                            <?php 
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-12 col-lg-8 col-sm-12">
                        <div class="panel">
                            <div class="panel-heading">ÚLTIMAS AUDITORIAS (MÁX. 5)</div>
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
                                                $sql = "SELECT * FROM auditoria INNER JOIN usuario ON usuario_idusuario = idusuario WHERE auditoria.id_auditor = :idUsuario ORDER BY data_auditoria DESC LIMIT 5";
                                                $stmt = $PDO->prepare($sql);
                                                $stmt->bindParam(':idUsuario', $_SESSION['UsuarioId']);

                                                $stmt->execute();

                                            while($empresas = $stmt->fetch(PDO::FETCH_OBJ)){
                                                    $nomeEmpresa = $empresas->nome;
                                                    $statusEmpresa = $empresas->status_auditoria;
                                                    $data = $empresas->data_auditoria;
                                                    $emailEmpresa = $empresas->email;
                                                    $solucaoEmpresa = $empresas->solucao;
                                                    $idauditoria = $empresas->idauditoria;
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
                                                <button type="button" onclick="excluirAuditoria(<?php echo $empresas->idauditoria; ?>)" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="icon-trash"></i></button>
                                            </td>
                                        </tr>
                                        
                                        <div class="modal fade" id="exampleModal<?php echo $empresas->idauditoria;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><b>Avaliação</b></h5>
                                                        </div> 
                                                    <div class="modal-body">
                                                        <?php 
                                                $sql3 = "SELECT * FROM `avaliacao` inner join categoria_vulnerabilidade on avaliacao.categoria_vulnerabilidade_idcategoria_vulnerabilidade = categoria_vulnerabilidade.idcategoria_vulnerabilidade where auditoria_idauditoria = (SELECT idauditoria FROM auditoria WHERE idauditoria = :idauditoria) ORDER BY data_avaliacao";
                                                $stmt3 = $PDO->prepare($sql3);
                                                $stmt3->bindParam(':idauditoria', $empresas->idauditoria);

                                                $stmt3->execute();

                                                while($avaliacao = $stmt3->fetch(PDO::FETCH_OBJ)){
                                                    $titulo = $avaliacao->titulo;
                                                    $data = $avaliacao->data_avaliacao;
                                                    $data = date('d-m-Y H:i:s', strtotime($data));
                                                    $categoria = $avaliacao->nome;
                                                    $site = $avaliacao->site;
                                                    $url = $avaliacao->url_vulnerabilidade;
                                                    $nivel = $avaliacao->nivel;   
                                                    $descricao = $avaliacao->descricao;   
                                                        ?>
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><b><?php echo $titulo;?></b></h5>
                                                        </div> <br>
                                                        <?php echo "<b>Data:</b> ".$data."<br><br>";
                                                        echo "<b>Categoria do erro:</b> ".$categoria."<br><br>";
                                                        echo "<b>Site:</b> ".$site."<br><br>";
                                                        echo "<b>URL:</b> ".$url."<br><br>";
                                                        if($nivel=="1")
                                                            $nivel="Baixa";
                                                        else if($nivel=="2")
                                                            $nivel="Média";
                                                        else if($nivel=="3")
                                                            $nivel="Alta";
                                                        echo "<b>Nível do erro:</b> ".$nivel."<br><br>";   
                                                        echo "<b>Descrição do Problema:</b> ".$descricao."<br><hr/>";
                                                    
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
                <!-- ============================================================== -->
                <!-- chats, message & profile widgets -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- start right sidebar -->
                <!-- ============================================================== -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Painel de Config. <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>Temas</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme working">12</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- /.container-fluid -->
            <?php include "rodape.php"; ?>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script>
        function excluirAuditoria(idAuditoria){
            var verifica=confirm("Tem certeza que deseja apagar?");
            if (verifica==true){
                var link = "deletar.php?id="+idAuditoria;
                window.location.assign(link);
            }
        }
    </script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- chartist chart -->
    <script src="plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <script src="plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <!--Style Switcher -->
    <script src="plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>


<!-- Mirrored from wrappixel.com/ampleadmin/ampleadmin-html/ampleadmin-minimal/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Dec 2018 03:30:44 GMT -->
</html>
