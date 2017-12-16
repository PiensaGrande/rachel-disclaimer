<?php namespace pg_disclaimer; ?>
<?php
global $lang1;

// default english // Disclaimer and Open Access
$templ['openAccess_blurb'] = "<p>By default, only the administrator is given access to RACHEL content.</p><p>After reading the <a href='#' class='disclaimer'>disclaimer</a>, enter your name and accept the disclaimer to enable open access.</p>";
$templ['disclaimer_blurb'] = "Read the <a href='#' class='disclaimer'>disclaimer</a>.";
$templ['disclaimer_textbox_blurb'] = "Once you open access, you assume responsibility for all content and possible uses, and you accept the conditions of use presented in this document.";
$templ['setOpenAccess'] = "Accept Disclaimer";
$templ['removeOpenAccess'] = "Disable Open Access";
$templ['setOpenAccess_name_short'] = "enter your name";
$templ['setOpenAccess_name'] = "Please " . $templ['setOpenAccess_name_short'] . ".";
$templ['openAccessEnabled'] = "Open Access: Enabled";
$templ['openAccessDisabled'] = "Open Access: Disabled"; // (Disclaimer must be approved.)
$templ['setOpenAccess_ok'] = "Disclaimer Approved. Open Access: Enabled";
$templ['setOpenAccess_failed'] = "Open Access could not be enabled.";
$templ['removeOpenAccess_ok'] = "Open Access: Disabled";
$templ['removeOpenAccess_failed'] = "Open Access could not be disabled.";
$templ['close'] = "Close";
$templ["goto_admin"] = "Goto Admin";
$templ["disk_space_avail"] = "Available disk space";
$templ["no_space_for_new"] = "Insufficient disk space to create new module.";
$templ["just_image"] = "Image";
$templ["just_title"] = "Title";
$templ["just_description"] = "Description";
$templ["large_file"] = "is too large";
$templ["fix_errors"] = "Please fix the following errors";
$templ["required"] = "is required";
$templ["special_chars"] = "Please eliminate the special characters";
$templ["allowed_chars_title"] = "Only alphamumeric characters, underscores, and dashes are allowed in the title";
$templ["no_upload_space"] = "There is not sufficient disk space to upload this image";
$templ["upload_your_content"] = "Upload your content!";
$templ["file_to_upload"] = "File to upload";
$templ["select"] = "Select";
$templ["content_type"] = "Content type";
$templ["upload"] = "Upload";
$templ["delete"] = "Delete";
$templ["error"] = "Error";
$templ["preview"] = "Preview";
$templ["save"] = "Save";
$templ["new"] = "New";
$templ["optional"] = "Optional";
$templ["finished"] = "Finished";
$templ["saved"] = "Saved!";
$templ["are_you_sure"] = "Are you sure?";
$templ["delete_element"] = "Delete Element";

// override with language translations when available
// This allows for partial translations to exists
switch ($lang1) {
	case ("es"):
                // Disclaimer and Open Access
                $templ['openAccess_blurb'] = "<p>De manera predeterminada, sólo los administradores tienen acceso a los paginas de RACHEL. Cuando se abre el acceso a este botón, la escuela acepta responsabilidad por todo lo presentado.</p><p>Después de leer el <a href='#' class='disclaimer'>Discargo de Responsabilidad</a>, introduzca su nombre para abrir el acceso.</p>";
                $templ['disclaimer_blurb'] = "Leer el <a href='#' class='disclaimer'>Discargo de Responsabilidad</a>";
		$templ['disclaimer_textbox_blurb'] = "Cuando se marca la casilla para abrir el acceso, usted asume responsabilidad por el contenido y los posibles usos, y usted acepta todas las condiciones de uso que se presentan en este documento.";
                $templ['setOpenAccess'] = "Aceptar el Descargo de Responsabilidad"; // // Aceptar la renuncia de responsabilidad
                $templ['removeOpenAccess'] = "Cerrar El Acceso";
		$templ['setOpenAccess_name_short'] = "introduzca su nombre";
                $templ['setOpenAccess_name'] = "Por favor, " . $templ['setOpenAccess_name_short'] . ".";
                $templ['openAccessEnabled'] = "El acceso está abierto.";
                $templ['openAccessDisabled'] = "El acceso está cerrado.";
                $templ['setOpenAccess_ok'] = "El acceso ha sido abierto con éxito.";
                $templ['setOpenAccess_failed'] = "Ocurrió un error.";
                $templ['removeOpenAccess_ok'] = "El acceso ha sido cerrado con éxito.";
                $templ['removeOpenAccess_failed'] = "Ocurrió un error.";
		$templ['close'] = "Cerrar";
		$templ["goto_admin"] = "Ir a Admin";
		$templ["no_space_for_new"] = "Insuficiente espacio en disco para crear.";
		$templ["fix_errors"] = "Arreglar los siguientes errores";
		$templ["required"] = "es requerido";
		$templ["special_chars"] = "Por favor, elimina los caracteres especiales"; 
		$templ["allowed_chars_title"] = "Sólo caracteres alfanuméricos, _ y - están permitidos en el Título";
		$templ["no_upload_space"] = "No hay suficiente espacio en el disco para cargar";
		$templ["upload_your_content"] = "¡Carga su contenido!";
		$templ["file_to_upload"] = "Archivo para cargar";
		$templ["select"] = "Seleccione";
		$templ["content_type"] = "Tipo de contenido";
		$templ["upload"] = "Cargar";
		$templ["delete"] = "Borrar";
		$templ["error"] = "Error";
		$templ["preview"] = "Preestreno";
		$templ["save"] = "Guardar";
		$templ["new"] = "Nuevo";
		$templ["optional"] = "Opcional";
		$templ["finished"] = "Acabado";
		$templ["saved"] = "¡Se guardó!";
		$templ["are_you_sure"] = "¿Seguro?";
		$templ["title_uri_required"] = "Título y Enlace necesitan valores";
		$templ["delete_element"] = "Borrar Elemento";
		break;
	// can support additional languages via extra cases 
}

?>
