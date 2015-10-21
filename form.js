
// Send the form data to the server without reloading the page
var httpRequest;
function MakeRequest(url) { 
    
    // Make the request with the global parameters $_GET
    var params_url = url + '?' + process_form();
    if (params_url == false)
        return false;
	if (window.XMLHttpRequest)
    	httpRequest = new XMLHttpRequest();
	if (!httpRequest) {
	    alert('Giving up :( Cannot create an XMLHTTP instance');
	    return false;
	}
	//$('#Name').val();
	httpRequest.onreadystatechange = function() { httpResponse(httpRequest); };
	httpRequest.open('GET', params_url, true);
	httpRequest.send('');
}

//get value from the form and check validation, return the GET/POST params
function process_form()
{
    var values = 'Building=' + $('#Building').val() +
        '&Lots=' + $('#Lots').val() + '&Degree=' + $('#Degree').val();
    if (isNaN($('#Degree').val()))
    {
        alert('Degree value must be a number!');
        return false;
    }
    return values;
}
// Show the results returned from the server
function httpResponse(httpRequest) {
    if (httpRequest.readyState == 4) {
        if (httpRequest.status == 200) {
			//document.getElementById("showserver").innerHTML = httpRequest.responseText;
			FormData = JSON.parse(httpRequest.responseText);
			document.getElementById("showserver").innerHTML = "Building: " + FormData.building + 
			    "<br>Lots: " + FormData.lots + "<br>Degree:" + FormData.degree;
			    ShowLot(FormData.lots);
        } else {
            alert('There was a problem with the request. '+ httpRequest.status);

        }
    }
}
