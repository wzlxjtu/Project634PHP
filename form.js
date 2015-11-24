
// Send the form data to the server without reloading the page

function SubmitForm(url) { 
    // Make the request with the global parameters $_GET
    var params_url = url + '?' + process_form();
	var ReasoningRequest = new XMLHttpRequest();
	ReasoningRequest.onreadystatechange = function() { ReasoningResponse(ReasoningRequest); };
	ReasoningRequest.open('GET', params_url, true);
	ReasoningRequest.send('');
}

//get value from the form and check validation, return the GET/POST params
function process_form()
{
    var values = 'Building=' + $('#Building').val() +
        '&Lots=' + $('#Lots').val() +
        '&Hours=' + $('#Hours').val() +
        '&Meridiems=' + $('#Meridiems').val() +
        'Date=' + $('#datepicker').val();
    return values;
}
// Show the results returned from the server
function ReasoningResponse(ReasoningRequest) {
    if (ReasoningRequest.readyState == 4 && ReasoningRequest.status == 200) {
			//document.getElementById("showserver").innerHTML = httpRequest.responseText;
			//alert(ReasoningRequest.responseText);
			var FormData = JSON.parse(ReasoningRequest.responseText);
			//document.getElementById("showserver").innerHTML = "Building: " + FormData.building + 
			//    "<br>Lots: " + FormData.lots;
			ResetMap();
			CalcRoute(FormData.Building);
    }
}
