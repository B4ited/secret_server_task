function $(id){
	return document.getElementById(id);
}

function kiir(){
	var timeleft=document.getElementsByTagName("p")[0].getAttribute("class");
	var del=false;

var downloadTimer = setInterval(function(){

  $("countdown").innerHTML = timeleft + " seconds remaining";
  timeleft -= 1;
  if(timeleft <= 0){
    clearInterval(downloadTimer);
    window.location.href = 'index.php';
  }
},500);
 


}

  
  
 

window.addEventListener("load",kiir,false);