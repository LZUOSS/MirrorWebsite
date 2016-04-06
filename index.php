<!DOCTYPE html>
<html lang="zh-Hans">

<?php
$MIRROR_SCRIPT_DIR="/data/script/";
$MIRROR_LOCK_DIR="/data/script/lock/";
$MIRROR_STATUS_DIR="/data/script/status/";
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
foreach ($current_dir_folder_list as $item){
	$mirror_item["name"]=$item;
	if ($lock_file_handle=fopen($MIRROR_LOCK_DIR.$item.".lock", "r")){
		$mirror_item["status"]=1;

	}else{
		$mirror_item["status"]=0;
	}
	fclose($lock_file_handle);
	if ($status_file_handle=fopen($MIRROR_STATUS_DIR.$item, "r")) {
		$mirror_item["update_time"]=str_replace("\n","",fgets($status_file_handle));
	}else{
		$mirror_item["update_time"]="-";
	}
	fclose($status_file_handle);
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
<!--    <link href="./assets/css/bootstrap.css" rel="stylesheet">-->

    <!-- Custom CSS -->
    <link href="./assets/css/style.css" rel="stylesheet">

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
                    <h3><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgBAMAAACBVGfHAAAAD1BMVEUAAAAsPlAsPlAsPlAsPlD44XfsAAAABHRSTlMA2tzef2ujvAAAACpJREFUKJFjYKAJUHFkUHGBAUeggIsLgwsCYBMwcWIwgfOdRm2hiS0kAwDO0DWZ6xj+BAAAAABJRU5ErkJggg==">镜像列表 </h3>
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
                            echo('                            <td  class="mirror_item">'.'<a href="/'.$item["name"].'/">'.$item["name"].'</a></td>'."\n");
                            echo('                            <td>'.$item["update_time"].'</td>'."\n");
	                        if ($item["status"]==1) {
		                        echo('                            <td><span class="label label-warning">Syncing</span></td>'."\n");
	                        } else{
		                        echo('                            <td></td>'."\n");
	                        }
                            echo('                        </tr>'."\n");
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

        </div>
        <div class="col-md-3">
                <div class="sidebar">
                    <h3><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAMAAABF0y+mAAAArlBMVEUAAAAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAd+Zw+AAAAOXRSTlMAAQIGCgsQEhMVGhsmOz1HVVZZW2ZnaXR8gIWGi4yPl5iam6KjpaiqsLK0t7nIytrc4OTm6ff5+/1S9qHIAAAA4klEQVQYGa3B60IBURiG0Qc5FVFqx6STikYqScN7/zfW7G/vCemntTiMylGFf5Xb40xSNm6X+et0qcLylB3lB+VG1Wp1pNx9mY3SVJ4DnLy0xK9rGQc4mYRCS8EAGChoEb1r3xvBiYL5R06FY8ylzC3elaILzFQmwXOKUsyXzB2eU7TAZIoc4BR9Yz4VOcApmmOeFDnAKXrEdBU5wCnqYmoyq2kH6KQrmRrBWN6QYCjvmaguLyFI5NUpnCk3JLhRrstGX9J69urN1pL6bOtp2zm7mqkKL032NHqTRbaY9BocwA8TBEhjmM6z0wAAAABJRU5ErkJggg=="> 通知公告 </h3>
                    <p>镜像站现已恢复正常服务。部分镜像仍在同步当中，请耐心等待同步完成。</p>
                    <p>镜像站启用新主页。</p>
                    <h3><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAMAAABF0y+mAAAArlBMVEUAAAAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAd+Zw+AAAAOXRSTlMAAQIEBQYIDA0QEhUaHB8gISIqNDY3ODk6TWNka2xtb36FhoiLjJi0tbnBzM7P1eTm6Ont7/Hz9/tu1HFHAAAA8ElEQVQYGa3B61qCQBQF0D0cupdGGXQxL9gdTS2o2e//Ys1hBkW+/tVa+AeS5kVZFtNU0CUjy8AOBTvO12xZ9tAyYMclNvpUX7dHEfbSd6oeAlnRKQ5QM490lgJvROdzH4F5oTNETSydGzjHJ3DO6FiByqg+EuCBfAIQUaVQOb27Cck3ABHVFGrOrUkM4JSqgKrY+E7gmGeqEqpi4xrO4StrJdSCjQjAhaVXQM3YMIApGeRQGX+VQsWWgQEMAyuojRnAYTCCJ2t6cOitBEFCzwCGXh8bV+wYoCVZs2XVxw4ZWwb2XtAVZ7NFVc3zTPB3Py6QTy21376NAAAAAElFTkSuQmCC"> 镜像帮助 </h3>
                    <p>部分开源软件镜像帮助，请参阅<a href="https://oss.lzu.edu.cn/wiki/mirror/help">兰大开源社区文档中心 > 镜像帮助</a></p>
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
                                <p><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAilBMVEUAAAD////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////2N2iNAAAALXRSTlMAAQMHCAwNERQcIyYnKCosPD5CQ0dJSktoa2yImpu0ur7AyMrM19zg5PX3+/29DL5wAAAAhUlEQVQYGa3B2RaBUACG0S8kZZ4jQlIa/vd/PSfWsui4tDf/MbqrJQ+Amyw5kMpyAcayDDFmtb7Uc4w1XqIPiccK0LHn7PQWOt2DAKlY4md6ynwWhQTIiN1OJCPquLEMQI1qwzS9TthWagB6OQWOE5z1AugHQD8ApSwlsJclxOgPWvr8xwN5QS6H5V6ebgAAAABJRU5ErkJggg=="> E-Mail: <a href="mailto:oss.lzu.edu.cn@gmail.com" class="href">oss.lzu.edu.cn@gmail.com</a></p>
                            </li>
                            <li>
                                <p><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAA6lBMVEUAAAD///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////+Le70HAAAATXRSTlMAAQIDBAYHCAoLDhAREhMUFyAhIiMlKSorLzY4O0FHSk5VV1tdXmdsbXGAg5GSmp2eo6aqq7Cyt7zAw8XHyM7P0dPZ2t7i5Ojp8fX5/XSksmgAAADTSURBVBgZfcHpIgJRAIbh7zjIniwlWcJYKlso2Yc0MvXe/+04M8bM+NPzaCKz1XoLv7reovI2P0mcTyvlkemvKHFM3vecYutQLxyNHq9vB09lG/Bg5Jg+bCh1A/tyKkBNKR8GcpowtErtAkVJr9BUZgaoSQrhUDlAXdIQGspYYE9SD3xlSkBV0gmwrT+mA8xLWuX9ngOrWLEL9BTpBEunjM8kFQIiFUUWRr7xLpblPONc6leVhlWsDbxMKVEOYU1OG+6sUrOtcUnO1ceO/rGKWE32A48TLksVDXzTAAAAAElFTkSuQmCC" /> <a href="https://github.com/LZUOSS/Mirror" class="href" target="_blank">GitHub</a></p>
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
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAVFBMVEUAAAD///////////////////////////////////////////////////////////////////////////////////////////////////////////8wXzyWAAAAG3RSTlMAAQIgJic0N0BHUVVZW1xdYm9wcXeFlZ2rrf2L0Jb5AAAAXUlEQVQYV8XNRw7AIBBDUYf03uvc/55hQAgQrBOvvt7GwBdLjimmF9EcqJAaulaiJaq+i5sodK1P1nluFOgdt2p85TytAoPyRtbGmpufkbnk2h1VXutqUzirCvyyFwMKCwz/lJP8AAAAAElFTkSuQmCC">
        </a>
    </div>

</body>

</html>
