<?php
define('WP_USE_THEMES', false);
require_once('../../../../wp-load.php');

$id = $_GET['id'];

$args = array(
	'p' => $id,
	'post_type' => 'any');
$member = new WP_Query($args);
$member->the_post();

$jsonMember = new stdClass();

if (get_post_type() == 'member') {
	$jsonMember->heading = get_field('first_name') . ' ' . get_field('last_name');
	$jsonMember->description = get_field('bio');
	$jsonMember->image = get_field('profile_image')['url'];
} else {
	$jsonMember->heading = get_field('startup_name');
	$jsonMember->description = get_field('detailed_description');
	$jsonMember->image = get_field('logo')['url'];
}

$jsonMember->email = get_field('email');
$jsonMember->website = get_field('website');
$jsonMember->phone = get_field('phone');
$jsonMember->facebook = get_field('facebook');
$jsonMember->twitter = get_field('twitter');
$jsonMember->linkedin = get_field('linkedin');

echo json_encode($jsonMember);