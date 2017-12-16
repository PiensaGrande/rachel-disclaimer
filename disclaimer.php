<?php include(dirname(__FILE__) . "/template.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <title><?php echo $templ['title']; ?></title>
  </head>
  <body> 

<?php 
      if (isset($_REQUEST["preview"])) {
          echo "<div id=\"pg-content\" role=\"main\" class=\"white-popup\">";
      } else {
          echo "<div id=\"pg-content\" role=\"main\">";
      }
?>
<div style='border:1px solid green;padding:10px;background:MintCream;'>
<p style='background:yellow'>
<b><?php echo $templ['disclaimer_textbox_blurb']; ?></b>
</p>

<input type='text' id='disclaimer-auth-name' placeholder='<?php echo $templ['setOpenAccess_name_short']; ?>'></input>
<button id='disclaimer-accept'><?php echo $templ['setOpenAccess']; ?></button>
<button id='disclaimer-close' style='float:right;'><?php echo $templ['close']; ?></button>
</div>

<?php
    echo show_module_contributions('rachel-disclaimer.php');
    echo "</hr>";
?>

</body>
</html>
