 <script>
 function upload()
  {
  filepicker.setKey("AIUuas6SgROumOQMCJ64pz");

filepicker.pick(
 {
    mimetype: 'image/*',
    imageQuality: 80,
    crop_first:true,
    cache:true,
   
    services: ['URL','CONVERT','COMPUTER', 'FACEBOOK', 'CLOUDAPP','WEBCAM','GMAIL',['INSTAGRAM']]
  },
  function(Blob){
   var url= Blob.url;
   //alert(url);
   //console.log(url);

   var img_url= "https://process.filestackapi.com/AqXZPMiF9QUiioSSFuTepz/watermark=file:mDAQJzXRqSDOwsQVT3vw/https://process.filestackapi.com/AqXZPMiF9QUiioSSFuTepz/resize=width:640,height:640,fit:crop/"+url;


 

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
   // if (xmlhttp.readyState==1||xmlhttp.readyState==2||xmlhttp.readyState==3)
    if(xmlhttp.readyState==1)
    {
         document.getElementById("btn").innerHTML='<h3 class="bg-gold animated tada infinite" style="visibility: visible; animation-duration: 3s;border-radius:90%;padding:10px;">Processing Image Please Wait...</h3>'

        
       
    }
  else if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      
      //window.location='profile';
      var resp=xmlhttp.responseText;
        document.getElementById("result").innerHTML='<img class="img-responsive" src='+resp+'>'
  // setTimeout(function(){

    document.getElementById("dwl").innerHTML='<br> <a href="" class="btn btn-warning btn-lg btn-block animated dropInDown">Retry</a><br> <strong>NOTE: for better results please crop your Image while uploading</strong>'


document.getElementById("btn").innerHTML='<a href='+resp+' class="btn btn-lg btn-info btn-block animated dropInDown" download="ecounsellors.jpg">Download Overlay Image</a>'
//}, 4500);

    }
  }
 
 
  xmlhttp.open("POST","b2",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("url="+img_url);


   
  },
  function(FPError){
    console.log(FPError.toString());
  }
);

}