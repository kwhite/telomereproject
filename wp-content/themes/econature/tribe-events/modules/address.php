<?php
/**
 * Address Module Template
 * Render an address. This is used by default in the single event view.
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/address.php
 *
 * @package TribeEventsCalendar
 *
 * @cmsms_package 	EcoNature
 * @cmsms_version 	1.2.2
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$venue_id = get_the_ID();

$full_region = tribe_get_full_region( $venue_id );

?>
<span class="tribe-address adr">

<?php
// This location's street address.
if ( tribe_get_address( $venue_id ) ) : ?>
<span class="tribe-street-address"><?php echo tribe_get_address( $venue_id ); ?></span>
	<?php if ( ! tribe_is_venue() ) : ?>
		<br>
	<?php endif; ?>
<?php endif; ?>

<?php
// This locations's city.
if ( tribe_get_city( $venue_id ) ) :
	if ( tribe_get_address( $venue_id ) ) : ?>
		<br>
	<?php endif; ?>
	<span class="tribe-locality"><?php echo tribe_get_city( $venue_id ); ?></span><span class="tribe-delimiter">,</span>
<?php endif; ?>

<?php
// This location's abbreviated region. Full region name in the element title.
if ( tribe_get_region( $venue_id ) ) : ?>
	<abbr class="tribe-region tribe-events-abbr" title="<?php echo esc_attr( $full_region ); ?>"><?php echo tribe_get_region( $venue_id ); ?></abbr>
<?php endif; ?>

<?php
// This location's postal code.
if ( tribe_get_zip( $venue_id ) ) : ?>
	<span class="tribe-postal-code"><?php echo tribe_get_zip( $venue_id ); ?></span>
<?php endif; ?>

<?php
// This location's country.
if ( tribe_get_country( $venue_id ) ) : ?>
	<span class="tribe-country-name"><?php echo tribe_get_country( $venue_id ); ?></span>
<?php endif; ?>

</span>
