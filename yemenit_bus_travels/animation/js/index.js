
 function retcosts(){
 	var trid=document.getElementById("retrid").value;
	var snumber=document.getElementById("renseats").value;
	var trcost=document.getElementById(""+trid+"").value;
	//var price=document.getElementById("retcost");
	 //alert('hello');

 	if(snumber!=""){
 	document.getElementById("retcost").innerHTML="Travels Cost:   $"+trcost*snumber;
 	}
  }
   function restcosts(){
 	var trid=document.getElementById("restrid").value;
	var snumber=document.getElementById("resnseats").value;
	var trcost=document.getElementById(""+trid+"").value;
	//var price=document.getElementById("retcost");
	 //alert('hello');

 	if(snumber!=""){
 	document.getElementById("restcost").innerHTML="Travels Cost:   $"+trcost*snumber;
 	}
  }

