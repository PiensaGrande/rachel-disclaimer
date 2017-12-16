<?php include(dirname(__FILE__) . "/template.php"); ?>
<script src="<?php echo $templ['web_path']; ?>/js/jquery-ui-1.10.4.custom.min.js"></script>
<script src="<?php echo $templ['web_path']; ?>/js/magnific/jquery.magnific-popup.js"></script>
<link rel="stylesheet" href="<?php echo $templ['web_path']; ?>/css/magnific/magnific-popup.css"/>
<script>

// onload
$(function() {
	setOpenAccess();
	removeOpenAccess();
        // disclaimer lightbox
	registerDisclaimerEvent();
}); // end onload


 // button click calls this to Approve Disclaimer (and Open system access)
function setOpenAccess() {
    $("#setOpenAccessButton").on('click', function() {
        var name = $("#auth_name").val();
        if (name == "") {
            alert("<?php echo $templ['setOpenAccess_name']; ?>");
        } else {
            $.ajax({
                url: "<?php echo $templ['engine_web_loc']; ?>?enableOpenAccess=1&auth_name="+name,
                success: function(data){
                    //alert("<?php echo $templ['setOpenAccess_ok']; ?>");
                    $("#accessDiv").css('border', '1px solid green');
                    $("#accessDiv").css('background', 'MintCream');
                    $("#openAccessStatus").html("<?php echo $templ['setOpenAccess_ok']; ?>");
                    $("#openAccessStatus").css('color','green');
                    $("#auth_name").hide();
                    $("#setOpenAccessButton").hide();
                    $("#accessInfo").html("<?php echo $templ['disclaimer_blurb']; ?>");
                    $("#accessInfo").css('display','inline');
                    $("#removeOpenAccessButton").show();
                    registerDisclaimerEvent(); // re-register disclaimer lightbox event
                },
                error: function(){
                    alert("<?php echo $templ['setOpenAccess_failed']; ?>");
                }
            });
        }
    });
}

 // button click calls this to close system access
function removeOpenAccess () {
    $("#removeOpenAccessButton").on('click', function() {
        $.ajax({
            url: "<?php echo $templ['engine_web_loc']; ?>?disableOpenAccess=1",
            success: function(data){
                //alert("<?php echo $templ['removeOpenAccess_ok']; ?>");
                $("#accessDiv").css('border', '1px solid red');
                $("#accessDiv").css('background', '#fee');
                $("#openAccessStatus").html("<?php echo $templ['removeOpenAccess_ok']; ?>");
                $("#openAccessStatus").css('color','Crimson');
                $("#removeOpenAccessButton").hide();
                $("#auth_name").show();
                $("#setOpenAccessButton").show();
                $("#accessInfo").html("<?php echo $templ['openAccess_blurb']; ?>");
                registerDisclaimerEvent(); // re-register disclaimer lightbox event
            },
            error: function(){
                alert("<?php echo $templ['removeOpenAccess_failed']; ?>");
            }
            });
        });
}

// onload
$(function() {
	setOpenAccess();
	removeOpenAccess();
        // disclaimer lightbox
	registerDisclaimerEvent();
}); // end onload


function registerDisclaimerEvent () {
        // disclaimer lightbox
        $("a.disclaimer").on('click', function(event) {
            event.preventDefault();
            $srcPopup = "<?php echo $templ['web_path'] . '/disclaimer.php?preview=1'; ?>";
            $.magnificPopup.open({
                    items: {
                        src: $srcPopup
                    },
                    callbacks: {
                        ajaxContentAdded: function() {
                            var m = this;
                            this.content.find('#disclaimer-accept').on('click', function(e) {
                                e.preventDefault();
                                $("#auth_name").val($("#disclaimer-auth-name").val());
                                $("#setOpenAccessButton").trigger('click');
                                m.close();
                            });
                            this.content.find('#disclaimer-close').on('click', function(e) {
                                e.preventDefault();
                                m.close();
                            });
                        }
                    },
                    modal: true,
                    type: 'ajax'
            });
        });

}

</script>
