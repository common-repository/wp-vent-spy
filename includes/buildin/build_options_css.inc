<?php
//build options styles
?>
<style rel="stylesheet" type="text/css">
    /* buildin options page styles */
    .option {
        background-image: url('<?php echo $plugin_url; ?>includes/images/cellbg2.gif');
        background-repeat: repeat;
        width: 800px;
        border: 1px solid #000;
        padding: 10px;
        padding-right: 0px;
    
    }
    .state {
        background-image: url('<?php echo $plugin_url; ?>includes/images/cellbg2.gif');
        background-repeat: repeat;
        width: 812px;
        border: 1px solid #000;
        padding: 10px;
        margin-bottom: 10px;
    }
    <?php if(get_option('hosted') == "TRUE"){
        echo "#hostcolor { display: none; }";
    }
    if(get_option('hosted') == "TRUE"){
        echo "#managed {display: none;}";
    }else{ 
        echo "#hostedj {display: none;}";
        echo "#adremove {display: none;}";
        echo "#validate {display: none;}";
        echo "#resetid {display: none;}";
    } ?>
    <?php if(get_option('valid') != ''){
        echo '#validate {display: none;}';
        echo '#adremove {display: none;}';
    }?>
    <?php if(get_option('valid') == ''){
        echo '#resetid {display: none;}';
    }?>
    <?php if(get_option('hosted') == "TRUE"){ ?>
    #managed_op {
        display: none;
    }
    
    #isfancy {
        display: none;
    }
    <?php } ?>
</style>
<?php echo "\n\n"; ?>