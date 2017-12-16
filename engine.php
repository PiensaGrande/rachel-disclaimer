<?php namespace pg_disclaimer; ?>
<?php require_once($_SERVER["DOCUMENT_ROOT"] .  "/admin/common.php"); ?>
<?php
require_once(dirname(__FILE__) . "/pg-common.php");
include(dirname(__FILE__) . "/template.php");

if (isset($_REQUEST['enableOpenAccess'])) {
    ini_set('display_errors', '0');
    $position = 1;
    try {
        exec("echo '{$_REQUEST['auth_name']}' > {$_SERVER['DOCUMENT_ROOT']}/disclaimerApproved.txt", $exec_out, $exec_err);
// Option with date, though the history is kept in rachelLogger and the date is on the file so it may not be necessary.
//        exec("echo -n '{$_REQUEST['auth_name']} @ ' >> {$_SERVER['DOCUMENT_ROOT']}/disclaimerHistory.log", $exec_out, $exec_err);
//        exec("date >> ../disclaimerHistory.log", $exec_out, $exec_err);
    } catch (Exception $ex) {
        error_log($ex);
        header("HTTP/1.1 500 Internal Server Error");
        exit;
    }
    $logdata = array();
    $logdata['type'] = 'disclaimer';
    $logdata['auth_name'] = $_REQUEST['auth_name'];
    if(rachelLogger($logdata)) {
        header("HTTP/1.1 200 OK");
        exit;
    } else {
        header("HTTP/1.1 500 Internal Server Error");
        exit;
    }
} else if (isset($_REQUEST['disableOpenAccess'])) {
    ini_set('display_errors', '0');
    $position = 1;
    try {
        exec("rm {$_SERVER['DOCUMENT_ROOT']}/disclaimerApproved.txt", $exec_out, $exec_err);
    } catch (Exception $ex) {
        error_log($ex);
        header("HTTP/1.1 500 Internal Server Error");
        exit;
    }
    header("HTTP/1.1 200 OK");
    exit;
}

// If we haven't exited by this point, we must want to display admin box.
if(!file_exists($_SERVER['DOCUMENT_ROOT'] . "/disclaimerApproved.txt")) { // admin must approve the disclaimer to open access to rachel
        // TODO: Add error check to require name
           echo "
            <div id='accessDiv' style='margin: 50px 0 50px 0; padding: 10px; border: 1px solid red; background: #fee;'>
            <h4 id='openAccessStatus'>{$templ['openAccessDisabled']}</h4>
            <div id='accessInfo'>{$templ['openAccess_blurb']}</div>
            <input type='text' id='auth_name' placeholder='{$templ['setOpenAccess_name_short']}'>
            <button id='setOpenAccessButton'>{$templ['setOpenAccess']}</button>
            <button id='removeOpenAccessButton' style='display:none;'>{$templ['removeOpenAccess']}</button>
            </div>
            ";
} else {
        // TODO: update disclaimer blurb to say "approved by NAME on DATE".
        $name = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/disclaimerApproved.txt");
        echo "
            <div id='accessDiv' style='margin: 50px 0 50px 0; padding: 10px; border: 1px solid green; background: MintCream;'>
            <h4 id='openAccessStatus'>{$templ['openAccessEnabled']}</h4>
            <div id='accessInfo' style='display:inline-block;'>{$templ['disclaimer_blurb']}</div>
            <input type='text' id='auth_name' style='display:none;' placeholder='{$templ['setOpenAccess_name_short']}'>
            <button id='setOpenAccessButton' style='display:none;'>{$templ['setOpenAccess']}</button>
            <button id='removeOpenAccessButton' style='display:inline-block;'>{$templ['removeOpenAccess']}</button>
            </div>
            ";
}

?>
