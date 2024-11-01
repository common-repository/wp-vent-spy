<?php
//|-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-|
//|        __        __  .     __     .  __               __        __     - 0 -|
//| *     /\ \     ./\ \   *  /\ \      /\ \     *       /\ \  .   /\ \     / \ |
//|      /::\ \*   /::\ \    /::\ \  . /::\ \      .__  /::\ \    /: | |  .     |
//|    */:/\:\ \  /:/\:\ \  /:/\:\ \  /:/\:\ \     /\_\/:/\:\ \  /: :| |   _    |
//|    /:/ /\:\ \/:/ /\:\ \/::\ \:\ \ \:\ \:\ \   _\/_/:/ /\:\ \/:/|:| |  /\_\  |
//|   /:/_/  \:\_\/_/ *\:| |/\:\_\:\_\_\:\ \:\_\ /\_\/:/_/ _\:\_\/ |:| | /:/ /  |
//|   \:\ \. /:/ /\ \  /:/ /\ \/_/\/_/\ \:\ \/_//:/ /\:\ \/\ \/_/ /|:| |/:/ /   |
//|    \:\ \/:/ /\:\ \/:/ /\:\ \     \:\ \:\_\//:/ /  \:\ \:\_\/_/ |:| /:/ /    |
//|     \:\/:/ /  \:\/:/ /  \:\_\     \:\/:/ //:/ /    \:\/:/_/    |:|/:/ /     |
//|      \::/ /  . \::/ /    \/_/   *  \::/ //:/ /   .  \::/ /   * |:::/ /   .  |
//|    .  \/_/      ~~~~                \/_/ \/_/  .     \/_/      |__/_/       |
//|                                                                             |
//|                Hand coded web software by Onykage Designs                   |
//|-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-|
//|                                                                             |
//|  File: wp-extremespy.php                                                    |
//|  Author: Onykage (AKA M. Hancock)                                           |
//|  HomeSite: www.onykage.com                                                  |
//|  Contact: design@onykage.com                                                |
//|  File Created on: 01/April/2009                                             |
//|  Last Edit: 09/May/2009                                                     |
//|  Current Version: 1.3.27                                                    |
//|                                                                             |
//|-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-|
//|                                                                             |
//|  Change Log                                                                 |
//|-----------------------------------------------------------------------------|
//|2009-04-01 >> Initial release.                                               |
//|-----------------------------------------------------------------------------|
//|2009-05-09 >> Fixed nested channel bug                                       |
//|2009-05-09 >> File Updated and version increase by 0.1.2                     |
//|2009-08-07 >> File Updated and converted to wordpress.                       |
//|2009-08-07 >> version increase by 0.7.25                                     |
//|-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-|

/***
 * useage!
 * in your html use the following line of code.
 * replace the '{everything in here including the curly braces}' with server information.
 * <?php include('includes/wp-extremespy.php?nme={server name}&svr={theserver ipaddress or cname}&prt={server port}&psw={server password, leave blank if no password is needed.}'); ?>
 **/
 

include 'ventrilostatus.php';
include 'buildTable.php';
include 'logtimer.php';
	$name = $_GET['nme'];
	if(!$name){
	    $name = "Lobby"; 
	}
	$port = $_GET['prt'];
	if(!$port){
	    $port = "3784";
	}
	$host = $_GET['svr'];
	if(strpos($host, ":")){
	    $host = substr($host, 0, strpos($host, ":"));
	}

    $stat = new CVentriloStatus;
    $stat->m_cmdprog    = dirname(__FILE__)."/ventrilo_status";
    $stat->m_cmdcode    = "2";
    $stat->m_cmdhost    = $host;
    $stat->m_cmdport    = $port;
    $stat->m_cmdpass    = $_GET['psw'];

    $rc = $stat->Request();
    if ( $rc )
    {
        echo "<strong>$stat->m_error</strong>\n";
    }
    $base = $name;
    $name = $name;
    $weblink = "ventrilo://$stat->m_cmdhost:$stat->m_cmdport/servername=$stat->m_name";
    $name = "<a style=\"color: #386DA1;\" href=\"" . $weblink . "\" title=\"Uptime: ".logtime($stat->m_uptime)." Platform: ".$stat->m_platform." Version ".$stat->m_version." ServerLink: ".$weblink."\">" . $name . "</a>";
    
    echo buildTable( $stat, $name, 0, $base );

?>