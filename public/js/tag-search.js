/*!
 * TAG SEARCH (~/js/tag-search.js)
 * -----------------------------------------------------------------------------
 * @author Jay Bardeleben <jbardeleben@gmail.com>
 * @copyright (C) 2016 Jay Bardeleben
 */

/**
 * showResult displays search results via AJAX
 * @param {string} str Query parameter from XML via AJAX
 */
function showResult(str) {
	if (str.length == 0) {
		document.getElementById("livesearch").innerHTML = "";
		document.getElementById("livesearch").style.color = "#000";
		document.getElementById("livesearch").style.padding = "0px";
		document.getElementById("livesearch").style.border = "0px";
		document.getElementById("livesearch").style.zIndex = "4000";
		return;
	}
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();  // XHR compatible browsers
	} 
	else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");  // for IE5 - IE6
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
			document.getElementById("livesearch").style.color = "#000";
			document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
			document.getElementById("livesearch").style.width = "60%";
			document.getElementById("livesearch").style.maxHeight = "175px";
			document.getElementById("livesearch").style.padding = "3px 0px 4px 6px";
			document.getElementById("livesearch").style.margin = "0px 0px 0px 0px";
			document.getElementById("livesearch").style.backgroundColor = "#FFF";
			document.getElementById("livesearch").style.overflow = "auto";
		}
	}
	// Get the requested url and send it to the user
	xmlhttp.open("GET", "scripts/tag-search.php?q=" + str, true);
	xmlhttp.send();
}  // showResult