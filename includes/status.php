<?php
include 'ventrilostatus.php';
include 'buildTable.php';
include 'logtimer.php';
include 'cURL.php';
//include 'wp-blog-header.php';
    
    $chcolor = $_POST['chcolor'];
    $adcolor = $_POST['adcolor'];
    $phcolor = $_POST['phcolor'];
    $uscolor = $_POST['uscolor'];
    $hosted = $_POST['hosted'];
    $fancy = $_POST['fancy'];

    if($hosted == "FALSE") {
    
        $stat = new CVentriloStatus;
        $stat->m_cmdprog    = dirname(__FILE__)."/ventrilo_status";
        $stat->m_cmdcode    = "2";
        $stat->m_cmdhost    = $_POST['vaddy'];
        $stat->m_cmdport    = $_POST['vport'];
        $stat->m_cmdpass    = $_POST['vpass'];
        $rc = $stat->Request();
        if ( $rc )
        {
            echo "<strong>$stat->m_error</strong>\n";
        }
        $base = $_POST['vsname'];
        $name = $_POST['vsname'];
        $weblink = "ventrilo://$stat->m_cmdhost:$stat->m_cmdport/servername=$stat->m_name";
        $name = "<a style=\"color: #".$chcolor."; text-decoration: none;\" href=\"" . $weblink . "\" title=\"Uptime: ".logtime($stat->m_uptime)." Platform: ".$stat->m_platform." Version ".$stat->m_version." ServerLink: ".$weblink."\">" . $name . "</a>";
        echo "<div style='position: relative; background: transparent; padding: 0px; margin: 0px; border: 0px; z-index: 5;'>";
        if($_POST['usemenu'] != "") {include 'menu-toggle.php';}
        echo buildTable( $stat, $name, 0, $base, $chcolor, $adcolor, $phcolor, $uscolor, $fancy );
        echo "</div>\n";
    
    } else {
        $tmp = cURLget_webpage("http://www.onykage.com/vspy/extremespy.php?svr=".$_POST['vaddy']."&prt=".$_POST['vport']."&psw=".$_POST['vpass']."&page=".$_POST['thispage']."&donateid=".$_POST['donateid']."&overflow=".$_POST['overflow']);
        if ($tmp['errno'] == 0){
         $stuff = $tmp['content'];
        }else{
            $stuff = "<span style=\"color: #ff0000;\"><b>There was an Error while tring to communicate with the target website.</b></span>";
        }
        echo $stuff;
    }
    
?>