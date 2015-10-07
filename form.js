
// Send the form data to the server without reloading the page
var httpRequest;
function MakeRequest(url) { 
    
    // Make the request with the global parameters $_GET
    var params_url = url + '?' + 'Name=' + $('#Name').val() +
        '&Lots=' + $('#Lots').val();
        
	if (window.XMLHttpRequest)
    	httpRequest = new XMLHttpRequest();
	if (!httpRequest) {
	    alert('Giving up :( Cannot create an XMLHTTP instance');
	    return false;
	}
	//$('#Name').val();
	httpRequest.onreadystatechange = function() { alertContents(httpRequest); };
	httpRequest.open('GET', params_url, true);
	httpRequest.send('');
}
// Show the results returned from the server
function alertContents(httpRequest) {
    if (httpRequest.readyState == 4) {
        if (httpRequest.status == 200) {
			document.getElementById("showserver").innerHTML = httpRequest.responseText;
        } else {
            alert('There was a problem with the request. '+ httpRequest.status);

        }
    }
}