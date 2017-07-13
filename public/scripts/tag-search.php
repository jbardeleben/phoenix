<?php
/**
 * TAG SEARCH ENGINE (tag-search.php)
 * -----------------------------------------------------------------------------
 * @author Jay Bardeleben <jbardeleben@gmail.com>
 * @copyright (C) 2016 Jay Bardeleben
 *
 * Get the xml document, load it into a new DOMDocument Object and iterate over
 * the data. Echo out the response for the js file grab the response via AJAX.
 * The URL for the links in the XML document come from Search.class
 */

$xmlDoc = new DOMDocument();
$xmlDoc->load("taglist.xml");
$x = $xmlDoc->getElementsByTagName('link');

/**
 * get the q parameter from URL
 * @var String $q Query string from search form
 */
$q = $_GET["q"];

// lookup all links from the xml file if length of q > 0
if (strlen($q) > 0) {
	$hint = "";
	for($i = 0; $i < ($x->length); $i++) {
		$name = $x->item($i)->getElementsByTagName('tag');
		$link = $x->item($i)->getElementsByTagName('tagurl');
		if ($name->item(0)->nodeType == 1) {
			//find a link matching the search text
			if (stristr($name->item(0)->childNodes->item(0)->nodeValue, $q)) {
				if ($hint == "") {
					$hint = '<a href="' . 
							$link->item(0)->childNodes->item(0)->nodeValue . '">' . 
							$name->item(0)->childNodes->item(0)->nodeValue . '</a>';
				}
				else {
					$hint = $hint . '<br><a href="' . 
							$link->item(0)->childNodes->item(0)->nodeValue . '">' . 
							$name->item(0)->childNodes->item(0)->nodeValue . '</a>';
				}
			}
		}
	}
}

// This sets output to a "no suggestion" message if no hints was found or to the
// correct values if hints were found. Echo out the response
if ($hint == "") {
	$response = "No Suggestions Found";
}
else {
	$response = $hint;
}
echo $response;
