<?php
global $db_prefix, $smcFunc, $sourcedir, $subforum_tree;
global $boardurl, $cookiename, $mbname, $language, $boarddir;

$SSI_INSTALL = false;
if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF'))
{
	$SSI_INSTALL = true;
	require_once(dirname(__FILE__) . '/SSI.php');
}
elseif (!defined('SMF')) // If we are outside SMF and can't find SSI.php, then throw an error
	die('<b>Error:</b> Cannot install - please verify you put this file in the same place as SMF\'s SSI.php.');
db_extend('packages');

// We need to disable query checks for this next operation:
if (isset($modSettings['disableQueryCheck']))
	$tmp = $modSettings['disableQueryCheck'];
$modSettings['disableQueryCheck'] = true;

//==============================================================================
// Insert column into the necessary tables to associate with a subforum:
//==============================================================================
$smcFunc['db_add_column'](
	'{db_prefix}categories', 
	array(
		'name' => 'forumid', 
		'size' => 4, 
		'type' => 'int', 
		'null' => false, 
		'default' => 0
	)
);
$smcFunc['db_add_column'](
	'{db_prefix}calendar', 
	array(
		'name' => 'forumid', 
		'size' => 4, 
		'type' => 'int', 
		'null' => false, 
		'default' => 0
	)
);
$smcFunc['db_add_column'](
	'{db_prefix}log_online', 
	array(
		'name' => 'forumid', 
		'size' => 4, 
		'type' => 'int', 
		'null' => false, 
		'default' => 0
	)
);

//==============================================================================
// Alter membergroups table to allow per-subforum membergroups:
//==============================================================================
$indexes = $smcFunc['db_list_indexes']("{db_prefix}membergroups", true);
$smcFunc['db_add_column'](
	'{db_prefix}membergroups', 
	array(
		'name' => 'forumid', 
		'size' => 4, 
		'type' => 'int', 
		'null' => false, 
		'default' => -1
	)
);
if (isset($indexes['forum_member']))
{
	$smcFunc['db_query']('', '
		ALTER TABLE {db_prefix}membergroups
		CHANGE "forumid" "forumid" INT(4) NOT NULL DEFAULT "-1";'
	);
}

//==============================================================================
// Build the Primary Membergroups table:
//==============================================================================
$columns = array(
	array(
		'name' => 'forumid',
		'type' => 'int',
		'size' => 4,
		'unsigned' => false,
		'null' => false, 
	),
	array(
		'name' => 'id_member',
		'type' => 'mediumint',
		'size' => 8,
		'unsigned' => false,
		'null' => false, 
	),
	array(
		'name' => 'id_group',
		'type' => 'int',
		'size' => 8,
		'unsigned' => false,
		'null' => false, 
		'default' => 0,
	),
);
$smcFunc['db_create_table']('{db_prefix}primary_membergroups', $columns, array(), array(), 'update_remove');

// We also need to create a 2-column index on the "forumid" and "id_member"
// columns, jumping through hoops along the way.... :[  Have to do it this way,
// since SMF doesn't appear to be able create 2-column indexes correctly....
$indexes = $smcFunc['db_list_indexes']("{db_prefix}primary_membergroups", true);
if (!isset($indexes['forum_member']))
	$smcFunc['db_query']('', '
		ALTER TABLE {db_prefix}primary_membergroups 
		ADD UNIQUE forum_member (forumid, id_member);');

// Populate each subforum's membergroup data using "id_group" field from members table:
if (!function_exists('SplitForum_Populate'))
	require_once(dirname(__FILE__) . '/Subs-SplitForumHooks.php');
SplitForum_Populate();

//==============================================================================
// If Simple Portal is installed, add support for subforums within the DB:
//==============================================================================
if ($SSI_INSTALL)
	$smcFunc['db_query']('', 'USE '. (substr($db_name, 0, 1) == '`' ? $db_name : '`' . $db_name . '`'));
$tblchk = $smcFunc['db_query']('', 'SHOW TABLES LIKE "%sp_blocks"');
while ($row = $smcFunc['db_fetch_row']($tblchk))
{
	if (str_replace('sp_blocks', '', $row[0]) <> $db_prefix)
		continue;

	// Insert forumid column into categories table to associate each category with a particular forum:
	$smcFunc['db_add_column'](
		'{db_prefix}sp_blocks',
		array(
			'name' => 'forum',
			'type' => 'varchar',
			'size' => 64,
			'default' => '0'
		)
	);
	$smcFunc['db_remove_column']('{db_prefix}sp_blocks', 'forums');
}
$smcFunc['db_free_result']($tblchk);

//==============================================================================
// If EZ Portal is installed, add support for subforums within the DB:
//==============================================================================
$tblchk = $smcFunc['db_query']('', 'SHOW TABLES LIKE "%ezp_block_layout"');
while ($row = $smcFunc['db_fetch_row']($tblchk))
{
	if (str_replace('ezp_block_layout', '', $row[0]) <> $db_prefix)
		continue;

	// Insert forumid column into categories table to associate each category with a particular forum:
	$smcFunc['db_add_column'](
		'{db_prefix}ezp_block_layout',
		array(
			'name' => 'forum',
			'type' => 'int',
			'size' => 4,
			'default' => '0'
		)
	);
	$smcFunc['db_remove_column']('{db_prefix}ezp_block_layout', 'forums');
}
$smcFunc['db_free_result']($tblchk);

// Restore query checks to previous status:
if (isset($tmp))
	$modSettings['disableQueryCheck'] = $tmp;

// Echo that we are done if necessary:
if ($SSI_INSTALL)
	echo 'DB Changes should be made now...';
?>