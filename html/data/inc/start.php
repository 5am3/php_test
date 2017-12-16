<?php
//Make sure the file isn't accessed directly.
defined('IN_CMS') or exit('Access denied!');

//Introduction text
?>
	<p>
		<strong><?php echo $lang['start']['welcome']; ?></strong>
		<br />
		<?php echo $lang['start']['manage']; ?>
	</p>
	<span class="kop2"><?php echo $lang['start']['more']; ?></span>
<?php
//Show the divs
showmenudiv($lang['start']['website'], $lang['start']['result'], 'data/image/website.png', 'index.php', true);
showmenudiv($lang['credits']['title'], $lang['start']['people'], 'data/image/credits.png', '?action=credits');
showmenudiv($lang['writable']['title'], $lang['writable']['title'], 'data/image/update-no.png', '?action=writable');
showmenudiv($lang['start']['help'], $lang['start']['love'], 'data/image/help.png', '', true);

?>
