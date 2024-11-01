<?php
/***
** Options page for WP Vent Spy
**/
$cmod = substr(base_convert(fileperms(dirname(__FILE__)."/ventrilo_status"), 10, 8), 3);
if($cmod < 755){
    chmod(dirname(__FILE__)."/ventrilo_status", 0755);
    $cmod = "<span style='color: #ff0000;'>".$cmod." <-- this may have been automatically corrected.  Refresh the page.</span>";
    $check = "<span style='color: #ff0000;'><b><em>Failed!</em></b></span>";
} else {
    $cmod = "<span style='color: #000000;'>".$cmod."</span>";
    $check = "<span style='color: #00ff00;'><b>Passed!</b></span>";
}

$status_file_loc_p = explode('/', dirname(__FILE__)."/ventrilo_status");
$root = $status_file_loc_p[1];
$plugin_basename = explode('/', plugin_basename(__FILE__));
for($d=0;$d<sizeof($status_file_loc_p);$d++){
    if($status_file_loc_p[$d] == $plugin_basename[0]){
        $f = $d;
        //$plugin_base_loc = $status_file_loc_p[$d];
    }
}
for($g=0;$g<$f;$g++){
    $h = array_shift($status_file_loc_p);
}

$status_file_loc = implode('/', $status_file_loc_p);

$plugin_url = defined('WP_PLUGIN_URL') ? trailingslashit(WP_PLUGIN_URL . '/' . dirname(plugin_basename(__FILE__))) : trailingslashit(get_bloginfo('wpurl')) . PLUGINDIR . '/' . dirname(plugin_basename(__FILE__));
include 'cURL.php';
?>

<div class="wrap">
    <?php
    $tmp = cURLget_webpage("http://www.onykage.com/files/projecthead.php?project=wpvspy");
        if ($tmp['errno'] == 0){
            $stuff = $tmp['content'];
        }else{
            $stuff = "<span style=\"color: #ff0000;\"><b>There was an Error while tring to communicate with the target website.</b></span>";
        }
        echo $stuff;
    ?>
    <div class="desc">
        <h2><font class="opTitle">Wordpress Ventrilo Status Monitor</font></h2>
        <ul>
            <li>Please make sure to rate this plugin!</li>
            <li>Higher rating tells people you use and like this plugin.</li>
            <li>Please report all bugs and issues concerning this plugin so that I can fix the issues.</li>
            <li>And your donations help with further development and hosting of this plugin and its service.</li>
        </ul>
    </div>
    <!-- Options -->
    <table border="0" cellpadding="0" cellspacing="0" class="state">
        <tr>
            <?php if(get_option('hosted') == "TRUE"){
                echo "<td><input type=\"checkbox\" id=\"cboption1\" onClick=\"showOption(this.value);\" value=\"1\" checked=\"true\" /> <b><font class=\"OPHeader\">Hosted Interface</font></b></td>\n";
                echo "<td><input type=\"checkbox\" id=\"cboption2\" onClick=\"showOption(this.value);\" value=\"2\" /> <b><font class=\"OPHeader\">Managed Interface</font></b></td>\n";
            }else{
                echo "<td><input type=\"checkbox\" id=\"cboption1\" onClick=\"showOption(this.value);\" value=\"1\" /> <b><font class=\"OPHeader\">Hosted Interface</font></b></td>\n";
                echo "<td><input type=\"checkbox\" id=\"cboption2\" onClick=\"showOption(this.value);\" value=\"2\" checked=\"true\" /> <b><font class=\"OPHeader\">Managed Interface</font></b></td>\n";
            } ?>
        </tr>
    </table>
    <form method="post" action="options.php" name="opionsform">
    <?php wp_nonce_field('update-options');
    if(get_option('hosted') == "TRUE"){
        echo "<input type=\"hidden\" name=\"hosted\" id=\"hosted\" value=\"TRUE\" />\n";
    }else{
        echo "<input type=\"hidden\" name=\"hosted\" id=\"hosted\" value=\"FALSE\" />\n";
    }  
    ?>
    <!-- Option 1 site control -->
    <div class="option" id="option1">
        <h4><font class="OPHeader">Description:</font></h4>
        <div class="hosted" id="hostedj">
            <p>The <em>Hosted Option</em> is a straight forward plug, play, and forget setup.&nbsp;&nbsp;With this option the monitor refresh is disabled but the plugin is hosted via onykage.com free of charge.&nbsp;&nbsp;In a nutshell your wordpress blog will query the specified ventrilo server via the vspy script hosted on onykage.com.  No hidden information is transmitted or stored with this script.</p>
        </div>
        <div class="managed" id="managed">
            <p>The <em>User Managed Option</em> is a more robust and configurable option in this plugin.&nbsp;&nbsp;This option requires the "ventrilo_status" application to be setup correctly on your webserver.&nbsp;&nbsp;It also requires that the ventrilo listen port be un-blacklisted from your webserver.&nbsp;&nbsp;In some cases some php knowledge will be needed to do some last minute fine tuning.  With this option the refresh is enabled and no data is sent anywhere, it is only recieved.
            <br /><b><font style="color: #ff0000;">WARNING!</font></b> The refresh option works and it will eat on average 100mb of bandwidth per day at a refresh rate of 30 seconds.&nbsp;&nbsp;You are strongly encouraged to not go below 30 seconds.&nbsp;&nbsp;If anything, refresh less instead of more often.</p>
            <div id="statustest"  style="padding-bottom: 10px;">
                <b><font class="OPHeader">Status</font></b>
                <div class="icell">
                    Status Test</font></b> <?php echo $check; ?><br />
                    Program Permissions: <em><?php echo $cmod; ?></em><br />
                    Program Location: <em><?php echo $root."/....../".$status_file_loc; ?></em><br />
                </div>
            </div>
        </div>
        <div class="adremove" id="adremove">
            <b><font class="OPHeader">Remove the Status Footer Ad</font></b>
            <p>The footer ad on the status widget can be removed with a donation.&nbsp;&nbsp;If you make your donation 15 USD or greater the ID code will <b>NEVER</b> expire, other wise, the ID will expire when your site has used the use credits on file which equal (0.1 cents per use or 1000 uses per dollar).&nbsp;&nbsp;The donate button above will take you to the correct link and once the donation has been completed you will recieve an email with your donation id.&nbsp;&nbsp;Provide the donation id and click "<b>Validate Id Code</b>" at the bottom and poof, no more ad.
            <br/><br/>The ID can be used with only 1 domain/email at a time.&nbsp;&nbsp;If you want to use this plugin with out the ad on multiple websites you will need to donate again using a different email address for a different website.</p>
            <b><font class="OPHeader">Donation ID</font></b>
            <div class="icell">
                <table border="0" cellpadding="0" cellspacing="0" width="800">
                    <tr>
                        <td style="text-align: left; width: 200px;">Donation ID Code:&nbsp;<span id="showvalid"></span></td>
                        <td style="text-align: right; width: 600px; padding-right: 22px;"><input class="OPinput" name="donateid" id="donateid" type="text" size="60" value="<?php echo get_option('donateid'); ?>" /><input type="hidden" name="valid" id="valid" value="<?php echo get_option('valid'); ?>"></td>
                    </tr>
                </table>
            </div>
        </div>
        <b><font class="OPHeader">Connection Data</font></b>
        <div class="icell">
            <table border="0" cellpadding="0" cellspacing="0" width="800" class="iInner">
                <tr>
                    <td class="OPFieldLH">Server Address:</td><td class="OPFieldRH"><input class="OPinput" name="vaddy" type="text" size="30" value="<?php if(get_option('vaddy') == ""){echo 'vent.onykage.com';}else{ echo get_option('vaddy');} ?>" /></td>
                </tr>
                <tr>
                    <td class="OPFieldLH">Server Port:</td><td class="OPFieldRH"><input class="OPinput" name="vport" type="text" size="30" value="<?php if(get_option('vport') == ""){echo '5733';}else{ echo get_option('vport');} ?>" /></td>
                </tr>
                <tr>
                    <td class="OPFieldLH">Server Password:</td><td class="OPFieldRH"><input class="OPinput" name="vpass" type="text" size="30" value="<?php if(get_option('vpass') == ""){echo '';}else{ echo get_option('vpass');} ?>" /></td>
                </tr>
                <tr>
                    <td class="OPFieldLH">Widget Name:</td><td class="OPFieldRH"><input class="OPinput" name="winame" type="text" size="30" value="<?php if(get_option('winame') == ""){echo 'Onys VSpy Plugin';}else{ echo get_option('winame');} ?>" /></td>
                </tr>
            </table>
            <table border="0" cellpadding="0" cellspacing="0" width="800" class="managed_op iInner" id="managed_op">
                <tr>
                    <td class="OPFieldLH">Server Name:</td><td class="OPFieldRH"><input class="OPinput" name="vsname" type="text" size="30" value="<?php echo get_option('vsname'); ?>" /></td>
                </tr>
            </table>
        </div>
        <div id="isfancy" style="margin-top: 10px;">
            <?php 
            if(get_option('fancytog') == "TRUE"){
                echo "<input type=\"hidden\" name=\"fancytog\" id=\"fancytog\" value=\"TRUE\" />\n";
            }else{
                echo "<input type=\"hidden\" name=\"fancytog\" id=\"fancytog\" value=\"FALSE\" />\n";
            }
            if(get_option('fancytog') == "FALSE"){
                $fancyoff = "checked=\"true\"";
            }else{
                $fancyon = "checked=\"true\"";
            }

            ?>
            <b><font class="OPHeader">Fancy Display</font></b>
            <div class="icell">
                <table border="0" cellpadding="0" cellspacing="0" width="800" style="text-align: center;">
                    <tr>
                        <td style="width: 400px;"><input type="checkbox" onClick="showFancy(this.value);" <?php echo $fancyon; ?> id="fancyon" value="1"> Fancy</td>
                        <td style="width: 400px;"><input type="checkbox" onClick="showFancy(this.value);" <?php echo $fancyoff; ?> id="fancyoff" value="0"> Plain</td>
                    </tr>
                </table>
            </div>
        </div>
        <b><font class="OPHeader">Display Style</font></b>
        <div class="icell">
            <table border="0" cellpadding="0" cellspacing="0" width="800">
                <tr>
                    <td class="OPFieldLH" style="height: 24px;">Show Ventrilo Logo in Titlebar&nbsp;<input type="checkbox" <?php if(get_option('showlogo') != ""){echo "checked=\"true\"";}?> name="showlogo" id="showlogo" value="<?php if(get_option('showlogo') == ''){echo '0';}else{ echo get_option('showlogo');} ?>"/></td><td class="OPFieldRH"></td>
                </tr>
                <tr>
                    <td class="OPFieldLH">Widget Width:(in pixels)</td><td class="OPFieldRH"><input class="OPinput" name="wigwidth" type="text" size="30" value="<?php if(get_option('wigwidth') == ""){echo '200';}else{ echo get_option('wigwidth');} ?>" /></td>
                </tr>
                <tr>
                    <td class="OPFieldLH">Widget Height:(in pixels: Leave blank for no restriction.)</td><td class="OPFieldRH"><input class="OPinput" name="wigheight" type="text" size="30" value="<?php if(get_option('wigwidth') == ""){echo '';}else{ echo get_option('wigheight');} ?>" /></td>
                </tr>
                <tr>
                    <td style="text-align: left; width: 500px;">Div Overflow:(Recommended with a height value.)</td><td style="text-align: right; width: 300px; padding-right: 110px;"><input type="checkbox" <?php if(get_option('overflow') == "1"){echo "checked=\"true\"";}?>  onclick="useoverflow();" name="overflow" id="overflow" value="<?php if(get_option('overflow') == ''){echo '0';}else{ echo get_option('overflow');} ?>">&nbsp;Use Overflow?</td>
                </tr>
            </table>
            <table border="0" cellpadding="0" cellspacing="0" width="800" id="hostcolor">
                <tr>
                    <td class="OPFieldLH" style="height: 24px;">BackGround Color:(Hex Value)&nbsp;<input type="checkbox" <?php if(get_option('transbg') == "1"){echo "checked=\"true\"";}?>  onclick="showbgcolor();" name="transbg" id="transbg" value="<?php if(get_option('transbg') == ''){echo '0';}else{ echo get_option('transbg');} ?>"> Transparent?</td><td id="hasbg" style="display: <?php if(get_option('transbg') == '0' || get_option('transbg') == ''){ echo 'block'; }else{ echo 'none'; } ?>;" class="OPFieldRH"><input class="OPinput" style="background-color: #<?php if(get_option('bgcolor') == ""){echo 'ffffff';}else{ echo get_option('bgcolor');} ?>;" name="bgcolor" id="bgcolor" type="text" size="30" value="<?php if(get_option('bgcolor') == ""){echo 'ffffff';}else{ echo get_option('bgcolor');} ?>" /></td>
                </tr>
                <tr>
                    <td class="OPFieldLH">Channel Color:(Hex Value)</td><td class="OPFieldRH"><input class="OPinput" style="background-color: #<?php if(get_option('chcolor') == ""){echo 'c4c4c4';}else{ echo get_option('chcolor');} ?>;" name="chcolor" id="chcolor" type="text" size="30" value="<?php if(get_option('chcolor') == ""){echo 'c4c4c4';}else{ echo get_option('chcolor');} ?>" /></td>
                </tr>
                <tr>
                    <td class="OPFieldLH">User Color:(Hex Value)</td><td class="OPFieldRH"><input class="OPinput" style="background-color: #<?php if(get_option('uscolor') == ""){echo '386DA1';}else{ echo get_option('uscolor');} ?>;" name="uscolor" id="uscolor" type="text" size="30" value="<?php if(get_option('uscolor') == ""){echo '386DA1';}else{ echo get_option('uscolor');} ?>" /></td>
                </tr>
                <tr>
                    <td class="OPFieldLH">Admin Color:(Hex Value)</td><td class="OPFieldRH"><input class="OPinput" style="background-color: #<?php if(get_option('adcolor') == ""){echo '8F2E11';}else{ echo get_option('adcolor');} ?>;" name="adcolor" id="adcolor" type="text" size="30" value="<?php if(get_option('adcolor') == ""){echo '8F2E11';}else{ echo get_option('adcolor');} ?>" /></td>
                </tr>
                <tr>
                    <td class="OPFieldLH">Phantom Color:(Hex Value)</td><td class="OPFieldRH"><input class="OPinput" style="background-color: #<?php if(get_option('phcolor') == ""){echo '98A019';}else{ echo get_option('phcolor');} ?>;" name="phcolor" id="phcolor" type="text" size="30" value="<?php if(get_option('phcolor') == ""){echo '98A019';}else{ echo get_option('phcolor');} ?>" /></td>
                </tr>
                <tr>
                    <td class="OPFieldLH" style="height: 24px;">Show Menubar in Status Window&nbsp;<input type="checkbox" <?php if(get_option('showmenu') != ""){echo "checked=\"true\"";}?> name="showmenu" id="showmenu" value="<?php if(get_option('showmenu') == ''){echo '0';}else{ echo get_option('showmenu');} ?>"/></td><td class="OPFieldRH"></td>
                </tr>
            </table>
        </div>
        <table border="0" cellpadding="0" cellspacing="0" width="800">
            <tr>
                <td width="400">
                    <input type="hidden" name="action" value="update" />
                    <input type="hidden" name="page_options" value="hosted, vsname, vaddy, vport, vpass, winame, wigwidth, wigheight, overflow, chcolor, uscolor, adcolor, phcolor, bgcolor, transbg, fancytog, donateid, valid, showmenu, showlogo" />
                </td>
                <td class="OPUpdate" align="right"><input type="button" id="validate" value="Validate ID Code" class="button-primary" onclick="getValid();"/></td><td class="OPUpdate" align="right"><input type="button" id="resetid" onclick="resetdonid();" class="button-primary" value="<?php _e('Release Donation Code') ?>" /></td><td class="OPUpdate" align="right">&nbsp;&nbsp;<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></td>
            </tr>
        </table>
    </div>
    </form>
</div>
<div class="wrap">
    <table border="0" cellpadding="0" cellspacing="0" width="800" style="margin-top: 10px; text-align: center;">
        <tr>
            <td><span>Vspy for WP is Proudly Sponsored by Instant Ventrilo.  Please show your support by clicking the banner below.</span></td>
        </tr>
        <tr>
            <td style="padding-top: 5px;"><a href="https://cp.light-speed.com/t.php?OKEY=custom_ivt_onykage" target="_blank" title="Get Your 30 day free trial Today!"><img src="http://www.instantventrilo.com/images/a-images/ivt-leader-risk-free-blue1.gif" alt="Instantventrilo" /></a></td>
        </tr>
    </table>
</div>
<form>
