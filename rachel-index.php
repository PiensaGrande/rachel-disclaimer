<?php namespace pg_disclaimer; ?>
<?php ob_start(); ?>
<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/admin/common.php");
require_once(dirname(__FILE__) . "/pg-common.php");
if (!disclaimerApproved()) { exit(); }
// Place module specific hints for RACHEL in template.php
// For a simple module, that will be all that is necessary.
include dirname(__FILE__) . "/template.php"; 

// Permit template.php to define whether we show anything on index.
// Remember that hiding in admin will cause rachel-admin.php to be hidden as well.
if (strtoupper($templ["hide_index"]) == "YES") { return; }

// Here we build core module structure with logo, title
// Note the availability of this data to jquery using data-
echo "
<div class='indexmodule' data-moduletype='{$templ['module_type']}' data-title='{$templ['title']}' data-img_uri='{$templ['img_uri']}' data-index_loc='{$templ['index_loc']}'>
<a href='{$templ['index_loc']}'>
<img src='{$templ['img_uri']}' alt='Your Content Logo'>
</a>
<h2><a href='{$templ['index_loc']}'>{$templ['title']}</a></h2>
";

// If you have any links or additional info to provide do it here, extend $templ in messages.php for multi-lingual.
// Comment out the description if not used.
echo "<p>{$templ["description"]}</p>";
echo "</div>";
?>
<?php ob_end_flush(); ?>
