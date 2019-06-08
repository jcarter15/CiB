/* 
	time display (credits: from http://albavicius.com/portfolio/no_1/)
*/
var x = document.getElementById("cc_time");
		
var currDate = new Date();
var currDay = currDate.getDay();
		
x.innerHTML = String(currDate).substr(16, 8);
		
function time() {
	var xTime = new Date();
			
	x.innerHTML = String(xTime).substr(16, 8);
}
		
setInterval(time, 1000);