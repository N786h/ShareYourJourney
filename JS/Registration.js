function checkname(str)
{

 str=str.trim();
 if(str.length==0)
 {
    document.getElementById("spanmsg").style.color="blue";
	 document.getElementById("spanmsg").innerHTML="Write username...";
	 document.getElementById("submit").disabled=true;
 }
 else
 {
 
  var req= new XMLHttpRequest();
  req.open("get","http://localhost:8080/SYJ/checkname.php?username="+str,true);
  req.send();
  req.onreadystatechange=function()
  {
     if(req.status==200 && req.readyState==4)
    {
      if((req.responseText)=="user hai")
  	 {
  	   document.getElementById("spanmsg").style.color="red";
  	   document.getElementById("spanmsg").innerHTML="Username already exists";
  	   document.getElementById("submit").disabled=true;
  	 }
  	 else 
  	 {
  	  document.getElementById("spanmsg").style.color="green";
  	  document.getElementById("spanmsg").innerHTML="Perfect!!!";
  	  document.getElementById("submit").disabled=false;
  	 }
    }
  }
 }
}