<?php
/*
Plugin Name: The post author info
Plugin URI: https://artemsannikov.ru/portfolio/wordpress-plugins/the-post-author-info/
Description: Плагин «The post author info» выводит информацию об авторе записи из профиля в панели управления WordPress.
Version: 1.0
Author: Artem Sannikov
Author URI: https://artemsannikov.ru
Donate link: https://artemsannikov.ru/donate/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/*
Copyright 2016  Artem Sannikov  (email : info@artemsannikov.ru)
 
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.
 
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

# Plugin code css
function tpai_plugin_styles() {
	wp_register_style('the-post-author-info', plugins_url('style.css', __FILE__));
	wp_enqueue_style('the-post-author-info');
}

add_action('wp_enqueue_scripts', 'tpai_plugin_styles');


# Plugin code
function tpai_author_info(){

?>
	<!-- The post author info -->
	<section class="the-post-author-info">

		<!-- Photo author -->
		<div class="photo-author">
			<?php 
				$author_email = get_the_author_meta('user_email');
				$size = 128;
				echo get_avatar($author_email, $size);
			?>
		</div>

		<!-- Current author info -->
		<div class="current-author-info">
			<?php
				$curent_author = wp_get_current_user();

				echo '<h4>'.$curent_author->user_firstname.'&nbsp;'.$curent_author->user_lastname.'</h4>';

				echo '<p><strong>Basic info</strong>: '.$curent_author->user_description.'</p>';

				echo '<p><strong>Number of posts published</strong>: '.count_user_posts($curent_author->id).'</p>';

				echo '<p>Web-site</strong>: <a href="'.$curent_author->user_url.'" target="_blank">'.$curent_author->user_url.'</a></p>';
			?>
		</div>

	</section>

<?php } ?>