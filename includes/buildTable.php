<?php
//buildtable for wordpress
//require_once('logtimer.php');
function buildTable( &$stat, $name, $cid ,$base, $chcolor, $adcolor, $phcolor, $uscolor, $fancy) {
	$tab1 = "\t";
	$tab2 = "\t\t";
	$tab3 = "\t\t\t";
	$tab4 = "\t\t\t\t";
	$tab5 = "\t\t\t\t\t";
	$nl = "\n";
    
    
    if($fancy == "TRUE"){
	    $passimgon = "<td style='height: 14px; width: 18px;'><img style='padding-top: 2px; padding-right: 3px;' src='http://www.onykage.com/vspy/images/chan_pass_on.gif' alt='' /></td>";
	    $authimgon = "<td style='height: 14px; width: 18px;'><img style='padding-top: 2px; padding-right: 3px;' src='http://www.onykage.com/vspy/images/chan_auth_on.gif' alt='' /></td>";
	    $pubimgon = "<td style='height: 14px; width: 18px;'><img style='padding-top: 2px; padding-right: 3px;' src='http://www.onykage.com/vspy/images/chan_pub_on.gif' alt='' /></td>";
		$passimgoff = "<td style='height: 14px; width: 18px;'><img style='padding-top: 2px; padding-right: 3px;' src='http://www.onykage.com/vspy/images/chan_pass_off.gif' alt='' /></td>";
		$authimgoff = "<td style='height: 14px; width: 18px;'><img style='padding-top: 2px; padding-right: 3px;' src='http://www.onykage.com/vspy/images/chan_auth_off.gif' alt='' /></td>";
		$pubimgoff = "<td style='height: 14px; width: 18px;'><img style='padding-top: 2px; padding-right: 3px;' src='http://www.onykage.com/vspy/images/chan_pub_off.gif' alt='' /></td>";
		$pcimg = "<td style='height: 14px; width: 18px;'><img style='padding-top: 2px; padding-right: 3px;' src='http://www.onykage.com/vspy/images/pc.gif' alt='' /></td>";
		$userimg = "<td style='height: 14px; width: 18px;'><img src='http://www.onykage.com/vspy/images/user_off.gif' alt='' /></td>";
    }else{
	    $passimgon = "<td style='height: 14px; width: 9px; padding-top: 2px; padding-right: 2px; color: #ff0000;'>-</td>";
	    $authimgon = "<td style='height: 14px; width: 9px; padding-top: 2px; padding-right: 2px; color: #ffff00;'>-</td>";
	   	$pubimgon = "<td style='height: 14px; width: 9px; padding-top: 2px; padding-right: 2px; color: #00ff00;'>-</td>";
	   	$passimgoff = "<td style='height: 14px; width: 9px; padding-top: 2px; padding-right: 2px; color: #ff0000;'>+</td>";
		$authimgoff = "<td style='height: 14px; width: 9px; padding-top: 2px; padding-right: 2px; color: #ffff00;'>+</td>";
		$pubimgoff = "<td style='height: 14px; width: 9px; padding-top: 2px; padding-right: 2px; color: #00ff00;'>+</td>";
		$pcimg = "<td style='height: 14px; width: 9px; padding-right: 2px; color: #c4c4c4;'>(n)</td>";
		$userimg = "<td style='height: 14px; width: 9px; color: #A90D01; padding-right: 2px;'>O</td>";
    }
	    $chan = $stat->ChannelFind( $cid );
    
	if($stat->ClientFind($cid)){
		 switch($chan->m_prot){
		    case 1:
		    	$cha = $tab2."<table border='0' cellpadding='0' cellspacing='0' style='height: 14px;'><tr>".$passimgon."<td style='height: 14px; color: #".$chcolor."'><font size='2'>" . $name . "</font></td></tr></table>".$nl;
		    	break;
		    case 2:
		    	$cha = $tab2."<table border='0' cellpadding='0' cellspacing='0' style='height: 14px;'><tr>".$authimgon."<td style='height: 14px; color: #".$chcolor."'><font size='2'>" . $name . "</font></td></tr></table>".$nl;
		    	break;
		    default:
		    	$cha = $tab2."<table border='0' cellpadding='0' cellspacing='0' style='height: 14px;'><tr>".$pubimgon."<td style='height: 14px; color: #".$chcolor."'><font size='2'>" . $name . "</font></td></tr></table>".$nl;
		    	break;
	    }
	}else{
	    switch($chan->m_prot){
		    case 1:
		    	$cha = $tab2."<table border='0' cellpadding='0' cellspacing='0' style='height: 14px;'><tr>".$passimgoff."<td style='height: 14px; color: #".$chcolor."'><font size='2'>" . $name . "</font></td></tr></table>".$nl;
		    	break;
		    case 2:
		    	$cha = $tab2."<table border='0' cellpadding='0' cellspacing='0' style='height: 14px;'><tr>".$authimgoff."<td style='height: 14px; color: #".$chcolor."'><font size='2'>" . $name . "</font></td></tr></table>".$nl;
		    	break;
		    default:
		    	$cha = $tab2."<table border='0' cellpadding='0' cellspacing='0' style='height: 14px;'><tr>".$pubimgoff."<td style='height: 14px; color: #".$chcolor."'><font size='2'>" . $name . "</font></td></tr></table>".$nl;
		    	break;
	    }
    }
    if($base){
        $cha = "<table border='0' cellpadding='0' cellspacing='0' style='height: 14px; width: 18px;'><tr>".$pcimg."<td style='height: 14px; width: 18px; color: #".$chcolor."'><font size='2'>" . $name . "</font></td></tr></table>";
        echo $tab1."<div style='font-family: arial, 'lucida console', sans-serif; font-size: 7pt;'>".$nl.$tab2."<strong>\n";
	    echo $tab3.$cha.$nl;
	    echo $tab2."</strong>".$nl;
	    echo $tab2."<div style='padding-left: 15px;'>".$nl;
    }else{
	    echo $tab3."<div style='font-family: arial, 'lucida console', sans-serif; font-size: 7pt;'>".$nl.$tab4."<strong>".$nl;
	    echo $tab3.$cha;
	    echo $tab4."</strong>".$nl;
	    echo $tab4."<div style='padding-left: 15px;'>".$nl;
	}

    // Display Client for this channel.
    for ( $i = 0; $i < count( $stat->m_clientlist ); $i++ )
    {
        $client = $stat->m_clientlist[ $i ];

        if ( $client->m_cid != $cid ){
            continue;
        }
        if ($client->m_sec){
            $inputval = $client->m_sec;
        }

        //echo "<div>";

        $flags = $uscolor;

        if ( $client->m_admin )
            $flags = $adcolor;

        if ( $client->m_phan )
            $flags = $phcolor;

        //if ( strlen( $flags ) )
        //  echo "<font color='blue' size='1'>$flags</font> ";

        if($client->m_comm){$comm = ", " . $client->m_comm;}
        if(substr($client->m_comm,0,7)=="http://"){$link = "href='" . $client->m_comm . "' target='_blank'";}
        echo $tab5."<table border='0' cellpadding='0' cellspacing='0' style='table-layout: fixed; margin: 1px; cursor: help;'><tr>".$userimg."<td style='height: 14px; color: #".$flags."; font-size: 8pt; font-family: arial, 'lucida console', sans-serif;'><a style='text-decoration: none; color: #".$flags.";' ".$link." title='Ping:" . $client->m_ping . ", Connected: " . logtime($inputval) . " " . $comm . "'>" . $client->m_name . "</a></td></tr></table>\n";
        //echo $tab5."<div style='color: ".$flags."; font-size: 8pt; font-family: arial, 'lucida console', sans-serif;'><img src='http://www.onykage.com/vspy/images/user_off.gif' alt='' /><a ".$link." title='Ping:" . $client->m_ping . ", Connected: " . logtime($inputval) . " " . $comm . "'>" . $client->m_name . "</a>".$nl."</div>".$nl;
       // echo "</div>\n";
        $comm = "";
        $link = "";
        $conTime = "";
    }
    // Display sub-channels for this channel.

    for ( $i = 0; $i < count( $stat->m_channellist ); $i++ )
    {
        if ( $stat->m_channellist[ $i ]->m_pid == $cid )
        {
            $cn = $stat->m_channellist[ $i ]->m_name;


            //if ( strlen( $stat->m_channellist[ $i ]->m_comm ) )
            //{
            //  $cn .= " (";
            //  $cn .= $stat->m_channellist[ $i ]->m_comm;
            //  $cn .= ")";
            //}

            buildTable( $stat, $cn, $stat->m_channellist[ $i ]->m_cid, "", $chcolor, $adcolor, $phcolor, $uscolor, $fancy );
        }
    }

    echo "\t\t\t\t</div>\n";
    echo "\t\t\t</div>\n";
}
?>