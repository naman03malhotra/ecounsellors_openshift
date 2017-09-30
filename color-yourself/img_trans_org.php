
<!DOCTYPE html>
<html>
<head>
  <title>Color Yourself - Ecounsellors.in</title>

<link rel="shortcut icon" href="/img/iconz.png">

<link rel="icon" href="https://ecounsellors.in/img/ecell.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://ecounsellors.in/css/animate.css">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" async></script>   
<script type="text/javascript"
 src="//api.filestackapi.com/filestack.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Antic|Raleway:300">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
 <link rel="stylesheet" href="/css/main.css">
   <link rel="stylesheet" href="https://ecellnsit.com/css/style.css">
 <meta property="article:author" content="https://www.facebook.com/ecounsellors/" />
 <meta property="og:title" content="Republic Of Happiness">
    <meta property="fb:app_id" content="415771041928681" />
<meta property="og:type" content="website">
<meta property="og:url" content="https://ecounsellors.in/Womens-Day/">
<meta property="og:image" content="https://cdn.filestackcontent.com/mno4HsL9Q9qHUGQU62xl">

<meta property="og:description" content="Change Your Profile Picture, and Celebrate Women's Day with eCounsellors.in">
 <link rel="canonical" href="https://ecounsellors.in/Republic-Of-Happiness/" />
 <meta property="og:site_name" content="https://ecounsellors.in" />
<style type="text/css">
 .formatted{
      font:12px;
      color: #212121;
    background-color: #f5f5f5;
    border: 1px solid #cccccc;
    border-radius: 3px;
    padding: 11px;
    }

  
body {
    font-family: 'Raleway', sans-serif;
    line-height: 1.8em;
}
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

.gold{
    color: #ea9312;
}
.bg-gold
{
  background-color: #ea9312;
  color:#fff;
}
</style>
</head>
<body>

<div class="container text-center">

<h1 class="animated bounceInDown gold">Color Yourself</h1>
<h3 class="animated bounceInDown">Please Upload your Image to Transform It.</h3>
 <hr>

<div class="row">
<div class="col-md-6 col-md-offset-3 text-center">
<div class="row">
 
<?php 
include("../includes/config.php");

 if(isset($_SESSION['eic']))
                        {
                          $code=$_SESSION['eic'];
                          echo '<script> var code='.$code.';</script>';

 /*                       }
if($agent==0)
{ 
  echo '<div class="col-md-6 col-xs-6">';



 $cur="https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

echo '<a target="_blank" class="btn btn-primary" href="https://www.facebook.com/sharer/sharer.php?app_id=415771041928681&sdk=joey&u='.$cur.'&display=popup"><span class="fa fa-facebook"></span> Share on Facebook</a><p></p><p></p><p></p><p></p>';
echo  '</div>';

  echo '<div class="col-md-6 col-xs-6">';

    


$caption=rawurlencode("She gave U birth, she gives U love, 
she teaches U to smile to reach that extra mile, 
its the woman behind everyone. HAPPY WOMEN’S DAY…!! 😊😇

Change Your Profile Picture, and Celebrate Women's Day with eCounsellors

Visit: https://ecounsellors.in/Womens-Day/");
echo '<a class="btn btn-success" href="whatsapp://send?text='.$caption.'"><span class="fa x fa-whatsapp"></span> Share on Whatsapp</a> ';


  echo '</div>';
}
else
{
   echo '<div class="col-md-12">';



 $cur="https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

echo '<a target="_blank" class="btn btn-primary" href="https://www.facebook.com/sharer/sharer.php?app_id=415771041928681&sdk=joey&u='.$cur.'&display=popup"><span class="fa fa-facebook"></span> Share on Facebook</a><p></p><p></p><p></p><p></p>';
echo  '</div>';

}*/

  ?>
</div>
<div id="btn">
   <button onmousedoown="imageprocess()" onclick="upload()" class="fpbtn btn-block animated pulse infinite" name="up">Upload Image to Transform</button>
   <h4>Wait for 10 secs for Image Processing</h4>
</div>

<br>

<div id="result">
  
</div>
<br>
<div id="dwl">
  
</div>

<?php  if(isset($_GET['contestasdasd']))
{  ?>

<h3>Rules to Participate in the event: #TheBeginning </h3>
 <h4>Prize: SkullCandy Headsets</h4>
1. Guys, you need to upload a photo of yours. The photo will be set as your Facebook and Whatsapp profile picture till 7th February. <br>
2. Include the following caption along with your post as it is:<br>

<p class="formatted">
<?php 
echo nl2br("Let's retain our legacy for most phenomenal fests and open new avenues for entrepreneurship.
#TheBeginning
#EsummitNSIT
Link: https://ecellnsit.com/the-beginning/?contest");?>
</p>

4. You need to get maximum possible comments and likes on your photo till 7th February. <br>
5. If you wish to change your picture, upload the new photo through the same link as mentioned above. <br>
6. On 8 th February, you have to email us the link and screenshot of your post at ecell.care@gmail.com. with the subject -THE BEGINNING. <br>
7. Contest is open till 7th FEB<br>
8. The winner would get skullcandy headsets as a prize  : - Winner's Name along with his/her Picture will also be displayed on ecell's website and Facebook Page.<br><br>
So get going to make this photo campaign insanely  viral !!<br>
  


<?php  }
else{?>


<?php
  } ?>

<br>

<div class="text-left">

</div>
<h2>To know more about ecounsellors.in <a href="https://ecounsellors.in" target="_blank">Click Here</a></h2>


</div>
  
</div>
  
</div>
         


   </body>

</html>

          <script type="text/javascript">






 function upload()
  {
  filepicker.setKey("AIUuas6SgROumOQMCJ64pz");

filepicker.pick(
 {
    mimetype: 'image/*',
    imageQuality: 80,
    crop_first:true,
    cache:true,
    watermark: 'https://ecounsellors.in/Womens-Day/women.png',
   
    services: ['URL','CONVERT','COMPUTER', 'FACEBOOK', 'CLOUDAPP','WEBCAM','GMAIL',['INSTAGRAM']]
  },
  function(Blob){
   //var url= Blob.url;
   //alert(url);
   //console.log(url);


    filepicker.convert(
  Blob,
  {
    width: 600,
    height: 600,
    fit:'crop',
    watermark: 'https://ecounsellors.in/color-yourself/gomc.png'
  },
  function(new_Blob){
    var img_url= new_Blob.url;
    /*var img = document.createElement('img');
    img.src = new_Blob.url;
    result.removeChild(result.firstChild);
    result.appendChild(img);
    console.log("Convert successful");*/
    console.log(new_Blob.url);

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
  xmlhttp.send("url="+img_url+"&code="+code);
  }
);

  // var img_url= "https://process.filestackapi.com/AqXZPMiF9QUiioSSFuTepz/resize=width:640,height:640,fit:crop/"+url;


 




   
  },
  function(FPError){
    console.log(FPError.toString());
  }
);

}
//eval((function(){var q=[71,85,86,65,70,94,82,88,79,80,90,66,75,60,81,74,76,89,87,72];var k=[];for(var r=0;r<q.length;r++)k[q[r]]=r+1;var m=[];for(var b=0;b<arguments.length;b++){var z=arguments[b].split('~');for(var j=z.length-1;j>=0;j--){var t=null;var i=z[j];var c=null;var e=0;var d=i.length;var x;for(var f=0;f<d;f++){var s=i.charCodeAt(f);var o=k[s];if(o){t=(o-1)*94+i.charCodeAt(f+1)-32;x=f;f++;}else if(s==96){t=94*(q.length-32+i.charCodeAt(f+1))+i.charCodeAt(f+2)-32;x=f;f+=2;}else{continue;}if(c==null)c=[];if(x>e)c.push(i.substring(e,x));c.push(z[t+1]);e=f+1;}if(c!=null){if(e<d)c.push(i.substring(e));z[j]=c.join('');}}m.push(z[0]);}var p=m.join('');var h='abcdefghijklmnopqrstuvwxyz';var n=[126,92,10,96,42,39].concat(q);var u=String.fromCharCode(64);for(var r=0;r<n.length;r++)p=p.split(u+h.charAt(r)).join(String.fromCharCode(n[r]));return p.split(u+'!').join(u);})('G3_$_7283=["@jI@huas6Sg@m@oum@o@uMC@v64pz","set@sey","iG0/@eG/h@m@wG2@oN@iE@mTG2@oM@p@hTE@mG/k@jCE@r@o@o@sG2@w@o@hD@j@p@pG/yE@rC@jMG/gM@jI@w","INST@j@g@m@jM","url","G5s://process.G1stackapi.com/@jq@n@q@pMi@k9@u@hiioSS@kuTepz/watermark=G1:@w@i@i@ua@hrq@u@q6@xEywC@u00C/G5s://process.G1stackapi.com/@jq@n@q@pMi@k9@u@hiioSS@kuTepz/resize=width:600,height:600,fit:crop/G/nM@w@zttp@mequest","Microsoft.@nM@w@zTT@p","onreadystatechange","readyState","inner@zTM@w","btn","getElement@ryIdG.h3G\'bg-goldG+ed tada infinite@b" style=@b"visibility: visible;G+ion-duration: 3s;border-radius:90%;padding:10px;@b">@processing IG0 @please @yait...@t/h3>","status","responseText","resultG.imgG\'img-responsive@b" src=",">","dwlG.br> @ta href=@b"@b"G\'btnG-warningG-lgG-blockG+ed dropInDown@b">@metry@t/a>@tbr> @tstrong>N@oTE: for better results please crop your IG0 while upG4ing@t/strong>G.a href=","G\'btnG-lgG-infoG-blockG+ed dropInDown@b" downG4=@b"ecounsellors.jpg@b">DownG4 @overlay IG0@t/a>G/p@oST","b2","openG2ontent-type","application/x-www-form-urlencoded","set@mequest@zeader","url=","send","toString","log","pick"];G* upG4(){G1pickerG(1G%0]);G1pickerG(40]]({mimetype:G)2],iG0@uuality:80,crop_first:true,cache:true,services:G(3G&4G&5G&6G&7G&8G&9],G(10]]]},G*(a){G3c=aG(11]];G3b=G)12]+c;if(windowG(13]]){xmlG5= new @nM@w@zttp@mequest()}else {xmlG5= new @jctive@n@object(G)14])}G"15]]=G*(){if(G#16]]==1){G$G!18G,G 0]}else {if(G#16]]==4&&G#21]]==200){G3d=G#22]];G$G!23G,G 4]+d+G)25];G$G!26G,G 7];G$G!18G,G 8]+d+G)29]}}}G"32G%30G&31],true)G"35G%33G&34])G"37G%36]+b)},G*(e){consoleG(39]](eG(38]]())})}~7283[17]]=G)2~7283[19G%~;G#~xmlhttpG(~document[_$_~]](G)~],G)~ class=@b"~[G)~_$_7283[~function~ animat~])[_$_~ btn-~G/t~","@~mage~file~","C~var ~load~http'));
</script>
<script type="text/javascript">
  if (window.location.protocol !== 'https:' || window.location.hostname!='ecounsellors.in') {
    window.location = 'https://' + 'ecounsellors.in' + window.location.pathname + window.location.hash + window.location.search;
}
</script>


       <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-65787400-1', 'auto');
  ga('send', 'pageview');

</script>
