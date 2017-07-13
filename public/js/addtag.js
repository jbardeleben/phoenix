/*
 * DYNAMICALLY ADD TAGS (~/js/addtag.js)
 * -----------------------------------------------------------------------------
 * Author: Jay Bardeleben
 * Copyright: (C) 2016 Jay Bardeleben
 * License: MIT License (see license that the bottom of this script)
 * This script will be for dynamically adding tags on the create page so that if
 * a tag is not available, it can be added on the fly. These tags should not be
 * comma separated but a double comma. This will then trigger the ajax function
 * to submit that tag to the server to check if it is available to add or not. I
 * need this to be asynchronous so we can add them dynamically.
 * 
 * This script uses markdown to comment the functions for display in Microsoft's
 * Visual Studio Code text editor.
 */

/**
 * __*logProgramStatus - LOG CURRENT STATE TO THE CONSOLE*__  
 * -----
 * Utility function to log status messages. This currently only logs to console,
 * but will be extended to log to a text file on the server. (This will be soon
 * renamed to logToServer once the ajax is set up to log to the server)
 * 
 * @param {string} method - Name of the method logging the message
 * @param {string} logStatus - Status message to log
 */
function logProgramStatus(method, logStatus) {
	var date = new Date();
	var logMsg = ">>>  " + date + " : " + method + "() : " + logStatus + "\n";
	console.log(logMsg);
}  // logProgramStatus


/**
 * __*addTag - Dynamically add tag to database*__  
 * -----
 * addTag will dynamically submit the supplied tag to the database via AJAX. If
 * the tag already exists, the function will simply exit, logging the status to
 * the console. Otherwise, the tag will be added to the database.
 * 
 * @param {string} tag The tag to submit
 */
function addTag(tag) {
    // dynamically add a tag to the tags database table via AJAX with tags.store
    // with the data parameter as 'name'. ie: data { 'name': tag }

    // validate tag as a string. If the user enters a number, it will need to be
    // cast to a string as tags are strings only. If validation fails, report it
    // back on user submit via the publish button
    logProgramStatus("addTag NOTICE", "addTag called with tag: " + tag);

    // Using jQuery AJAX, submit the tag to the server via the route tags.store.
    var save = $.ajax({
        //method: "POST", url: 'http://laravel/tags/store',
        //data: { name: tag }
    });
	logProgramStatus("SAVE NOTICE", "Saving...");
	save.done(function(data, textStatus, jqXHR) {
        logProgramStatus("SAVE NOTICE", "save.done...");
	});
	save.fail(function(jqXHR, textStatus) {
        logProgramStatus("SAVE NOTICE", "save.fail...");
	});
}


/**
 * MIT License
 * 
 * Copyright (c) 2016 Jay Bardeleben
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */