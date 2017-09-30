function pay(ur)
{
  window.location=ur;
}
 function save(vx)
 {
 if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState==1||xmlhttp.readyState==2||xmlhttp.readyState==3)
    {

        document.getElementById("loadbar").style.display="inline";
        document.getElementById("quiz").style.display="none";
        


       
    }
  else if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      document.getElementById('mainframe').innerHTML= xmlhttp.responseText;
    }
  }
  var sub=<?php echo "'".$sub."'"; ?>;
xmlhttp.open("POST","/ajax/meet.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("vx="+vx+"&sub="+sub);
 }

 function setdate(rand)
 {
 if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState==1||xmlhttp.readyState==2||xmlhttp.readyState==3)
    {

        document.getElementById("loadbar").style.display="inline";
        document.getElementById("quiz").style.display="none";
        


       
    }
  else if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      document.getElementById('mainframe').innerHTML= xmlhttp.responseText;
    }
  }
  var dx=document.getElementById("date").value;
xmlhttp.open("POST","/ajax/meet.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("setdate="+dx+"&rand="+rand);
 }
  function setime(rand)
 {
 if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState==1||xmlhttp.readyState==2||xmlhttp.readyState==3)
    {

        document.getElementById("loadbar").style.display="inline";
        document.getElementById("quiz").style.display="none";
        


       
    }
  else if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      if(tx=="")
      {
        document.getElementById('mainframe').innerHTML= "<h1>No Time Slot Selected<a class='btn btn-info' href='' onclick='window.location.reload(true);'> Reload</a></h1>";
      }
      else
      {
      document.getElementById('mainframe').innerHTML= xmlhttp.responseText;

      }
      

    }
  }
 var tx = document.querySelector('input[name="rads"]:checked').value;

xmlhttp.open("POST","/ajax/meet.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("setime="+tx+"&rand="+rand);
 }

function confirm(ans,rand)
 {
 if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState==1||xmlhttp.readyState==2||xmlhttp.readyState==3)
    {

        document.getElementById("loadbar").style.display="inline";
        document.getElementById("quiz").style.display="none";
        


       
    }
  else if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      
      if(ans=="no")
      {
        location.reload();
      }
      else
        document.getElementById('mainframe').innerHTML= xmlhttp.responseText;
    }
  }
 
  if(ans=="yes")
xmlhttp.open("GET","/ajax/meet.php?confirm=yes"+"&rand="+rand,true);
else
  xmlhttp.open("GET","/ajax/meet.php?confirm=no"+"&rand="+rand,true);


xmlhttp.send();
 }






















 function save_f(vx)
 {
 if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState==1||xmlhttp.readyState==2||xmlhttp.readyState==3)
    {

        document.getElementById("loadbar_f").style.display="inline";
        document.getElementById("quiz_f").style.display="none";
        


       
    }
  else if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      document.getElementById('mainframe_f').innerHTML= xmlhttp.responseText;
    }
  }
  var sub=<?php echo "'".$sub."'"; ?>;
xmlhttp.open("POST","/ajax/meet_f.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("vx="+vx+"&sub="+sub);
 }

 function setdate_f(rand)
 {
 if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState==1||xmlhttp.readyState==2||xmlhttp.readyState==3)
    {

        document.getElementById("loadbar_f").style.display="inline";
        document.getElementById("quiz_f").style.display="none";
        


       
    }
  else if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      document.getElementById('mainframe_f').innerHTML= xmlhttp.responseText;
    }
  }
  var dx=document.getElementById("date").value;
xmlhttp.open("POST","/ajax/meet_f.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("setdate="+dx+"&rand="+rand);
 }
  function setime_f(rand)
 {
 if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState==1||xmlhttp.readyState==2||xmlhttp.readyState==3)
    {

        document.getElementById("loadbar_f").style.display="inline";
        document.getElementById("quiz_f").style.display="none";
        


       
    }
  else if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      if(tx=="")
      {
        document.getElementById('mainframe_f').innerHTML= "<h1>No Time Slot Selected<a class='btn btn-info' href='' onclick='window.location.reload(true);'> Reload</a></h1>";
      }
      else
      {
      document.getElementById('mainframe_f').innerHTML= xmlhttp.responseText;

      }
      

    }
  }
 var tx = document.mainForm.rads.value;

xmlhttp.open("POST","/ajax/meet_f.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("setime="+tx+"&rand="+rand);
 }

function confirm_f(ans,rand)
 {
 if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState==1||xmlhttp.readyState==2||xmlhttp.readyState==3)
    {

        document.getElementById("loadbar_f").style.display="inline";
        document.getElementById("quiz_f").style.display="none";
        


       
    }
  else if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      
      if(ans=="no")
      {
        location.reload();
      }
      else
        document.getElementById('mainframe_f').innerHTML= xmlhttp.responseText;
    }
  }
 
  if(ans=="yes")
xmlhttp.open("GET","/ajax/meet_f.php?confirm=yes"+"&rand="+rand,true);
else
  xmlhttp.open("GET","/ajax/meet_f.php?confirm=no"+"&rand="+rand,true);


xmlhttp.send();
 }


