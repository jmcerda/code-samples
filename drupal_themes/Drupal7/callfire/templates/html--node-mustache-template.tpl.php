<?php 
/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<!DOCTYPE html>
<!--[if IEMobile 7]><html class="iem7"><![endif]-->
<!--[if lte IE 6]><html class="lt-ie9 lt-ie8 lt-ie7 lt-ie10"><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="lt-ie9 lt-ie8 lt-ie10"><![endif]-->
<!--[if IE 8]><html class="lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 9]><html class="lt-ie10"><![endif]-->
<!--[if (gte IE 10)|(gt IEMobile 7)]><!--><html><!--<![endif]-->
<head profile="<?php print $grddl_profile; ?>">
	<?php print $head; ?>
  <title>
	<?php 
	if ($nid == '2391001') {
  	$url = $wsdl."?ac=". preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', curPageName());
		$titletemp = '{{#if areaCodes}}' . $head_title . '{{/if}}{{#each areaCode}}{{region}} {{code}} phone number | {{region}} ({{code}}) phone numbers | {{region}} {{code}} local number | ({{code}}) {{region}} local numbers | CallFire{{/each}}';
		print renderHandlebars($url, $titletemp);
	}
	else {
		print $head_title; 
	}
	?></title>
  <?php
  	if ($nid == '2391001') {
	  	$temp = '<meta name="description" content="{{#if areaCodes}} Buy a local phone number. Purchase a number today at CallFire. {{/if}}{{#each areaCode}}Buy a local {{region}} {{code}} phone number.  Purchase a local {{region}} ({{code}}) number today at CallFire.{{/each}}">';
	  	echo renderHandlebars($url, $temp);
  	}
  ?>

  <?php print $scripts; ?>

  <?php print $styles; ?>

	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>
<body class="<?php print $classes; ?>">

	<?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>