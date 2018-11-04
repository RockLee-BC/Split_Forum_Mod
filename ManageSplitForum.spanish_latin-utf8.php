<?php
/**********************************************************************************
* ManageSplitForum..spanish_latin-utf8.php - Latin Spanish language file of the Split Forum Mod
***********************************************************************************
* This mod is licensed under the 2-clause BSD License, which can be found here:
*	http://opensource.org/licenses/BSD-2-Clause
***********************************************************************************
* This program is distributed in the hope that it is and will be useful, but      *
* WITHOUT ANY WARRANTIES; without even any implied warranty of MERCHANTABILITY    *
* or FITNESS FOR A PARTICULAR PURPOSE.                                            *
***********************************************************************************
* Spanish translation by Rock Lee (https://www.bombercode.net) Copyright 2014-2018
***********************************************************************************/
if (!defined('SMF')) 
	die('Hacking attempt...');

$txt['favicon'] = 'Enlace del icono de su página web';
$txt['sp-subforums'] = 'Subforo';

$txt['forumid_title'] = 'Foro Primario';
$txt['forumid_desc'] = 'El sub-foro de esta categoría es utilizable en';

$txt['subforums_list'] = 'Subforos';
$txt['subforums_list_title'] = 'Administrar y configurar Subforos';
$txt['subforums_list_desc'] = 'Editar su subforo aqui. Para crear un nuevo sub-foro, haga clic en el botón Añadir subforo.';
$txt['subforums_list_header'] = 'Administrar subforo';
$txt['subforums_list_forumid'] = 'Subforo identificación(ID)';
$txt['subforums_list_boardname'] = 'Nombre del subforo';
$txt['subforums_list_add'] = 'Crear nuevo subforo';
$txt['subforums_list_boards'] = 'Foros';
$txt['subforums_list_delete'] = 'Borrar';
$txt['subforums_list_prefix'] = 'Subforo';

$txt['subforum_modify_header'] = 'Configuración del subforo';
$txt['subforum_modify_boardname'] = 'Nombre del subforo/foro:';
$txt['subforum_modify_boardurl'] = 'Dirección Web del subforo (Enlace):';
$txt['subforum_modify_boardurl_small'] = 'Dirección completa debe incluir "http://"';
$txt['subforum_modify_favicon'] = 'Dirección del icono de su página web para el subforo:';
$txt['subforum_modify_subtheme'] = 'Tema por defecto del subforo:';
$txt['subforum_modify_language'] = 'Idioma predeterminado del subforo:';
$txt['subforum_modify_primary_membergroup'] = 'Usuario del grupo primario para nuevos usuarios:';
$txt['subforum_modify_dontchange'] = 'NO cambiar esta configuración a menos que sepa lo que está haciendo!!!';
$txt['subforum_modify_forumid'] = 'Número de Identificación(ID) del subforo:';
$txt['subforum_modify_forumdir'] = 'Ruta de acceso a la carpeta del subforo:';
$txt['subforum_modify_cookiename'] = 'Nombre de la Cookie:';
$txt['subforum_modify_confirm'] = '¿Está seguro de que desea eliminar este subforo?';
$txt['subforum_modify_news'] = '¿Copiar noticias del foro primario?';

$txt['subforum_modify_prettyURL_title'] = 'URLs bonitas';
$txt['subforum_modify_prettyURL_enable'] = 'Activar URLs bonitas en este subforo:';

$txt['subforum_modify_sp_title'] = 'Simple Portal bloques';
$txt['subforum_modify_sp_blocks'] = 'Copiar bloques desde el subforo';
$txt['subforum_modify_sp_blocks_nothing'] = '[ No hacer nada. ]';
$txt['subforum_modify_sp_blocks_default'] = '[ Usar bloques predeterminados ]';
$txt['subforum_modify_sp_blocks_remove'] = '[ Eliminar los bloques ]';

$txt['subforum_modify_ez_title'] = 'EzPortal bloques';
$txt['subforum_modify_ez_portal_enable'] = '¿Habilitar EzPortal de página de inicio?';
$txt['subforum_modify_ez_homepage_title'] = 'Título de la página de inicio EzPortal';
$txt['subforum_modify_ez_shoutbox'] = '¿Habilitar EzPortal ShoutBox(chat) en el subforo?';
$txt['subforum_modify_ez_blocks'] = $txt['subforum_modify_sp_blocks'];

$txt['subforum_server_url'] = 'Enlace del servidor web raíz de los nuevos subforos';
$txt['subforum_server_root'] = 'Ruta del servidor raíz para nuevos subforos';
$txt['subforum_redirect_wrong'] = 'Redirigir foro para corregir subforo en lugar de un mensaje de error';
$txt['subforum_sister_sites_title'] = 'Sitios amigos del título del menú';
$txt['subforum_settings_topmenu'] = 'Mostrar sitios amigos en el menú superior';
$txt['subforum_settings_topmenu_admin_only'] = 'Mostrar sitios amigos en el menú superior sólo para administradores';
$txt['subforum_sister_sites'] = 'Sitios amigos';
$txt['subforum_settings_register_at_primary'] = 'Redirigir el registro al foro primario:';
$txt['subforum_settings_show_who_in_subforum'] = '¿Quién está en línea restringido al subforo?';

$txt['subforum_delete_title'] = 'Eliminar subforo';
$txt['subforum_delete_line'] = 'La supresión de este subforo también eliminará las categorías y foros de abajo, incluyendo todos los temas, mensajes y archivos adjuntos dentro de cada una:';
$txt['subforum_delete_what_to_do'] = 'Por favor seleccione lo que le gustaría hacer con estas categorías y/o foros';
$txt['subforum_delete_option1'] = 'Eliminar subforo, junto con todas las categorías y foros que contiene.';
$txt['subforum_delete_option2'] = 'Eliminar subforo y mover todas las categorías contenidas dentro de ';

$txt['subforum_error_no_url'] = 'Sin una dirección web especificado para este foro.';
$txt['subforum_error_dup_id'] = 'La identificación(ID) del subforo especificado ya se ha utilizado. Por favor seleccione otro número de identificación(ID).';

$txt['no_pack_in_subforum'] = 'No se puede acceder a la página de paquetes a través de un subforo!';

$txt['subforum_mod_update'] = 'Foro versión dividida Mod %s está disponible para su descarga!';
$txt['subforum_no_mod_update'] = 'Su instalación del Foro de Split Mod esta actualizada a la fecha!';

$txt['subforum_no_categories'] = 'No hay categorías definidas';
$txt['wrong_forum'] = 'El foro que ha especificado se encuentra en un foro diferente!';

$txt['subforum_deny'] = 'Denegar el acceso a';
$txt['permissiongroup_access_subforums'] = 'Acceso a subforos';
$txt['subforum_settings_permission_access'] = '¿Restringir el acceso a subforos usando permisos?';
$txt['subforum_settings_permission_access_log'] = '¿Miembros de registro que acceden a subforos restringidos?';
$txt['subforum_access_denied'] = 'El acceso a este subforo ha sido denegado.';
$txt['wrong_forum'] = 'El foro que especificó está ubicada en un foro diferente.';
$txt['subforum_error_bad_membergroup'] = 'No puede agregar grupos de miembros que no están asociados con este subforo.';

?>
