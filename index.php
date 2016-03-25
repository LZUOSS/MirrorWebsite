<!DOCTYPE html>
<html lang="en">

<?php
$MIRROR_SCRIPT_DIR="/data/script/";
$MIRROR_LOCK_DIR="/data/script/lock/";
$current_dir_list=scandir('./');
$current_dir_folder_list=array();
$sync_lock_dir_list=scandir($MIRROR_LOCK_DIR);
$sync_lock_list = array();
$mirror_item=array(
    "name" => "",
    "update_time" => "-",
    "status" => "-"
);
global $mirror_list;
$mirror_list=array();
foreach($current_dir_list as $item_in_current_folder){
    if ( !(($item_in_current_folder == ".") || ($item_in_current_folder == "..") || ($item_in_current_folder == "assets") )){
        if (strpos($item_in_current_folder,"php")==FALSE) {
            $current_dir_folder_list[]=$item_in_current_folder;
        }
    }
}
if (!empty($sync_lock_dir_list)){
    foreach ($sync_lock_dir_list as $item){
        if ( !(($item == ".") || ($item == "..")) ){
            $sync_lock_list[] = str_replace(".json","",$item);
        }
    }
}
foreach ($current_dir_folder_list as $item){
    $mirror_item["name"]=$item;
    if (in_array($item,$sync_lock_list)){
        $mirror_item["status"]="Syncing";
    }
    $mirror_list[]=$mirror_item;
    $mirror_item=array(
        "name" => "",
        "update_time" => "-",
        "status" => "-"
    );
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="兰州大学开源社区镜像站提供主流Linux发行版以及开源、自由软件镜像。">

    <title>兰州大学开源社区镜像站</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./assets/css/freelancer.css" rel="stylesheet">
    <link href="./assets/css/custom.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.lug.ustc.edu.cn/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.lug.ustc.edu.cn/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <a class="navbar-brand" href="#page-top">兰州大学开源社区镜像站</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <span class="name">欢迎访问兰州大学开源社区镜像站</span>
                        <span class="name-en">Welcome to the Open Source Mirror Site of LZUOSS</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="col-md-9">
                <div class="mirror_list">
                    <h3><i class="fa fa-list"></i> 镜像列表 </h3>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Mirror Name</th>
                            <th>Last Update</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        //print_r($mirror_list);
                        foreach($mirror_list as $item){
                            echo('                        <tr>'."\n");
                            echo('                            <td  class="mirror_item">'.'<a href="/'.$item["name"].'/"">'.$item["name"].'</a></td>'."\n");
                            echo('                            <td>'.$item["update_time"].'</td>'."\n");
                            echo('                            <td>'.$item["status"].'</td>'."\n");
                            echo('                        </tr>'."\n");
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

        </div>
        <div class="col-md-3">
                <div class="sidebar">
                    <h3><i class="fa fa-info-circle"></i> 通知公告 </h3>
                    <p>This is a test.</p>
                    <h3><i class="fa fa-question-circle"></i> 镜像帮助 </h3>
                    <p>This is a test.</p>
                </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-6">
                        <h3>Contact us</h3>
                        <ul class="contact_list">
                            <li>
                                <p><i class="fa fa-envelope"></i> E-Mail: <a href="mailto:oss.lzu.edu.cn@gmail.com" class="href">oss.lzu.edu.cn@gmail.com</a></p>
                            </li>
                            <li>
                                <p><i class="fa fa-github"></i> <a href="https://github.com/LZUOSS/Mirror" class="href" target="_blank">GitHub</a></p>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-6">
                        <h3>About us</h3>
                        <p>兰州大学开源软件镜像站由兰州大学开源社区提供支持。收录了Fedora、Debian、CentOS、Archlinux、Ubuntu等多个发行版的软件源镜像，全国高校最大的开源软件镜像站之一。提供此开源镜像的目的在于宣传自由软件的价值，提高自由软件社区文化氛围, 推广自由软件在高校乃至国内的应用。</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Lanzhou University Open Source Society 2006-<?php echo date('Y'); ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./assets/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="./assets/js/classie.js"></script>
    <script src="./assets/js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="./assets/js/jqBootstrapValidation.js"></script>
    <script src="./assets/js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./assets/js/freelancer.js"></script>

</body>

</html>
