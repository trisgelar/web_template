<?php

/**
 * _init.php - Initialize site variables and includes. 
 *
 * This file is called before any template files are rendered
 * This behavior was defined in /site/config.php - $config->prependTemplateFile
 *
 */


// We pull some data from the homepage in a few places in this main template, so we keep it ready here
$homepage = $pages->get('/');
$pageClass = $page->name;
$sectionClass = $page->rootParent->name;
$titleParent = $page->rootParent->title;
// $templateClass = $page->template;

if(empty($page->body)){
	$content = "<p>
	Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.
	</p>
	<p>
	Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.
	</p>
	<p>
	Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.
	</p>";
}else{
	$content = $page->body;	
}

// determine what the ever important browser <title> tag should be
if($page->browser_title) $browserTitle = $page->browser_title; 
else if($page === $homepage) $browserTitle = $page->headline; 
else $browserTitle = $page->title . ' &bull; ' . $homepage->headline;

// set the meta description
if($page->meta_description) $metaDescription = $page->meta_description;
elseif ($page->body) $metaDescription = strip_tags(substr($page->body, 0, 155));
else $metaDescription = 'Your fallback description';


$view->set('aiom_css', AIOM::CSS(array(
	'styles/tabler.css',
	'styles/main.css',
)));

$view->set('aiom_js', AIOM::JS(array(
	'scripts/vendor/jquery-3.2.1.min.js',
	'scripts/vendor/jquery.sparkline.min.js',
	'scripts/vendor/jquery.tablesorter.min.js',
	'scripts/vendor/bootstrap.bundle.min.js',
	'scripts/vendor/chart.bundle.min.js',
	'scripts/vendor/circle-progress.min.js',
	'scripts/vendor/core.js',
	'scripts/vendor/main.js',
)));

/*
 * Include shared functions we want to utilize in all our templates
 *
 */

include_once("_functions.inc");