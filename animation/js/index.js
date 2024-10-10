
 function retcosts(){
 	var trid=document.getElementById("retrid").value;
	var snumber=document.getElementById("renseats").value;
	var trcost=document.getElementById(""+trid+"").value;
	//var price=document.getElementById("retcost");
	 //alert('hello');

 	if(snumber!=""){
 		document.getElementById("retlable").innerHTML=" Travels Cost in Yemenit RIAL :";
 	document.getElementById("retcost2").value=trcost*snumber;
 	document.getElementById("retcost").value=document.getElementById("retcost2").value;
 	}
  }
   function restcosts(){
 	var trid=document.getElementById("restrid").value;
	var snumber=document.getElementById("resnseats").value;
	var trcost=document.getElementById(""+trid+"").value;
	//var price=document.getElementById("retcost");
	 //alert('hello');

 	if(snumber!=""){
 		document.getElementById("restlable").innerHTML=" Travels Cost in Yemenit RIAL :";
 	document.getElementById("restcost2").value=trcost*snumber;
 	document.getElementById("restcost").value=document.getElementById("restcost2").value;
 	}
  }

