function showOption(state){
    if(state == 2){
        document.getElementById("managed_op").style.display = "block";
        document.getElementById("managed").style.display = "block";
        document.getElementById("adremove").style.display = "none";
        document.getElementById("hostedj").style.display = "none";
        document.getElementById("isfancy").style.display = "block";
        document.getElementById("cboption1").checked = false;
        document.getElementById("cboption2").checked = true;
        document.getElementById("hostcolor").style.display = "block";
        document.getElementById("validate").style.display = "none";
        document.getElementById("resetid").style.display = "none";
        document.getElementById("hosted").value = "FALSE";
    }else{
        if(document.getElementById("valid").value != ""){
            document.getElementById("adremove").style.display = "none";
            document.getElementById("resetid").style.display = "block";
        }else{
            document.getElementById("adremove").style.display = "block";
            document.getElementById("validate").style.display = "block";
        }
        document.getElementById("hostedj").style.display = "block";
        document.getElementById("managed_op").style.display = "none";
        document.getElementById("managed").style.display = "none";
        document.getElementById("isfancy").style.display = "none";
        document.getElementById("hostcolor").style.display = "none";
        document.getElementById("cboption1").checked = true;
        document.getElementById("cboption2").checked = false;
        document.getElementById("hosted").value = "TRUE";
        
        
    }
    
}

function showbgcolor(){
    if(document.getElementById("transbg").checked == true){
        //document.getElementById("hasbg").style.display = "none";
        jQuery('#bgcolor').attr("disabled","disabled");
        document.getElementById("transbg").value = "1";
    }else{
        //document.getElementById("hasbg").style.display = "block";
        jQuery('#bgcolor').attr("disabled","");
        document.getElementById("transbg").value = "0";
    }
}

function usedefaultloader(){
    if(document.getElementById("usedefault").checked == true){
        document.getElementById("transbg").value = "1";
        jQuery('#loadingimg').attr("disabled","disabled");
    }else{
        document.getElementById("transbg").value = "0";
        jQuery('#loadingimg').attr("disabled","");
    }
}

function useoverflow(){
    if(document.getElementById("overflow").checked == true){
        document.getElementById("overflow").value = "1";
    }else{
        document.getElementById("overflow").value = "0";
    }
}

function showFancy(state){
    if(state == 0){
        document.getElementById("fancyon").checked = false;
        document.getElementById("fancyoff").checked = true;
        document.getElementById("fancytog").value = "FALSE";
    }
    if(state == 1){
        document.getElementById("fancyon").checked = true;
        document.getElementById("fancyoff").checked = false;
        document.getElementById("fancytog").value = "TRUE";
    }
}

function resetdonid(){
    jQuery('#valid').val('');
    jQuery('#donateid').val('');
    document.opionsform.submit();
}

function autoSelect(selectTarget) {
    if(selectTarget != null && ((selectTarget.childNodes.length == 1
      && selectTarget.childNodes[0].nodeName == "#text") || (selectTarget.tagName == "INPUT"
      && selectTarget.type == "text"))) {
        if(selectTarget.tagName == 'TEXTAREA' || (selectTarget.tagName == "INPUT" && selectTarget.type == "text")) {
             selectTarget.select();
        } else if(window.getSelection) { // FF, Safari, Opera
            var sel = window.getSelection();
            var range = document.createRange();
            range.selectNode(selectTarget.firstChild);
            sel.removeAllRanges();
            sel.addRange(range);
        } else { // IE
            document.selection.empty();
            var range = document.body.createTextRange();
            range.moveToElementText(selectTarget);
            range.select();
        }
    }
}