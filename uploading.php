
<!DOCTYPE html>
<html>
<head>
	<title>Overylay Panel</title>

<link rel="icon" href="https://ecellnsit.com/img/ecell.png">

<script type="text/javascript" src="//api.filestackapi.com/filestack.js"></script>  
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

<style type="text/css">
	

.fpbtn {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  display: inline-block;
  height: 34px;
  padding: 4px 40px 5px 40px;
  margin-bottom: 0;
  vertical-align: middle;
  -ms-touch-action: manipulation;
  touch-action: manipulation;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  font-family: "Open Sans", sans-serif;
  font-size: 12px;
  font-weight: 600;
  line-height: 1.42857143;
  color: #fff;
  text-align: center;
  white-space: nowrap;
  background: #3ac7ed;
  background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA0AAAANCAYAAABy6+R8AAAAGXRF…NJ5pXfNcLBnUVuU8u6AHe9fwXQ+4P2vjAHj2kLzyS+RVgAJKfyOcTLuk9AAAAAElFTkSuQmCC");
  background-repeat: no-repeat;
  background-position: 17px 9px;
  border: 1px solid transparent;
  border-radius: 17px;
}


</style>
</head>
<body>

<div class="container text-center">

<h1>Uploading panel</h1> <hr>

<div class="row">
<div class="col-md-6 col-md-offset-3 text-center">
	

 <button onclick="upload()" class="fpbtn" name="up">Upload</button>
<br>

<div id="url" ></div>

<br>

<div id="result">
	
</div>
<br>
<div id="dwl">
	
</div>
</div>
	
</div>
	
</div>
         


   </body>

</html>

  <script type="text/javascript">

function upload() 
{ 
filepicker.setKey("AjcIkquQR3qWKqPaYEczez");

filepicker.pick( 
{ 


services: ['URL','CONVERT','COMPUTER', 'FACEBOOK', 'CLOUDAPP','WEBCAM','GMAIL',['INSTAGRAM']] 
}, 
function(Blob){ 
var url= Blob.url; 
//alert(url); 
console.log(url);

var img = document.createElement('img'); 
img.src = Blob.url; 
result.removeChild(result.firstChild); 
result.appendChild(img); 
document.getElementById('url').innerHTML='<a href='+Blob.url+' target="_blank">'+Blob.url+'</a>'

}, 
function(FPError){ 
console.log(FPError.toString()); 
} 
);

}

</script>













































          <script type="text/javascript">


           /*filepicker.convert(
  Blob,
  {
    width: 640,
    height: 640,
    fit:'crop',
    watermark: 'https://ecounsellors.in/Womens-Day/women.png'
  },
  function(new_Blob){
    var img = document.createElement('img');
    img.src = new_Blob.url;
    result.removeChild(result.firstChild);
    result.appendChild(img);
    console.log("Convert successful");
    console.log(new_Blob.url);
  }
);*/

  /* var img_url= "https://process.filestackapi.com/AjcIkquQR3qWKqPaYEczez/watermark=file:WqSM0y9mTlOGqL5ZPjCq/https://process.filestackapi.com/AjcIkquQR3qWKqPaYEczez/resize=width:640,height:640,fit:crop/"+url;

   document.getElementById("result").innerHTML='<img style="width:400px;" src='+img_url+'>'
   setTimeout(function(){

    document.getElementById("dwl").innerHTML='<a href='+img_url+' class="btn btn-lg btn-info btn-block" download>Download Overlay Image</a><br> <h3>--- OR ---</h3> <br> <a href="" class="btn btn-warning btn-lg btn-block">Retry</a><br> <strong>NOTE: for better results please upload a squre image of dimention more than 640PX</strong>'



}, 5000);*/

    /*if (window.XMLHttpRequest)
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

        
       
    }
  else if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      
      window.location='profile';

    }
  }
 
 
  xmlhttp.open("POST","ajax/upload.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("url="+url);
*/

//http://process.filestackapi.com/AjcIkquQR3qWKqPaYEczez/output=format:png/http://www.queness.com/resources/images/png/apple_raw.png
</script>