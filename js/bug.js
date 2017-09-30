



$(function() {
  $("#feedback-tab").click(function() {
    $("#feedback-form").toggle("slow");
    $("#bug-tab").toggle("slow");
  });
  $(".closex").click(function() {
        $("#feedback-form").toggle("slow");
        $("#bug-tab").toggle("slow");

    
  });


  /*$("#feedback-form form").on('submit', function(event) {
    var $form = $(this);
    $.ajax({
      type: $form.attr('method'),
      url: $form.attr('action'),
      data: $form.serialize(),
      success: function() {
        $("#feedback-form").toggle("slide").find("textarea").val('');
      }
    });
    event.preventDefault();
  });*/
});


$(function() {
  $("#bug-tab").click(function() {
    $("#bug-form").toggle("slow");
   
  });
  $(".closex-bug").click(function() {
        $("#bug-form").toggle("slow");
       

    
  });

  



});






var urls='';

$('#upload_bug').click(function(){

  $("#bug-form").toggle("slow");
  filepicker.setKey("AjcIkquQR3qWKqPaYEczez");



filepicker.pickMultiple(
 {
    mimetype: 'image/*',
    imageQuality: 60,
    crop_first:true,
    cache:true,
    maxFiles: 3,
   
    services: ['CONVERT','COMPUTER','URL','WEBCAM']
  },
  function(Blob){
    
   // alert(Blob);
    //var arr = JSON.stringify(Blob);
    //alert(arr);
  //for(var i = 0; i < arr.length; i++) {
       for(var url in Blob)
        {
           // var attrName = key;
             //attrValue =attrValue + arr[url].url+",";
             //alert(JSON.stringify(Blob[url].url));
             urls = urls + (Blob[url].url)+',';
        }
  
   //alert(urls);
  
     $("#bug-form").toggle("slow");
     $("#bug_div").html('<button class="fpbtn btn-block" id="upload_bug"><span class="fa fa-check"></span>Files Uploaded</button>');

   
  },
  function(FPError){
    console.log(FPError.toString());
  }
);


});





$('#bug_send').click(function(){

  var bug_exp=document.getElementById('bug_exp').value;
  var bug_email=document.getElementById('bug_email').value;
  
   if(bug_email=='')
    {
      alert("Please enter you email.");
      return false;
    }

    if(urls=='')
    {
      alert("Please Upload Screenshots");
      return false;
    }
  
    if(bug_exp!='')
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

               document.getElementById("loadbar_feed").style.display="inline";
        document.getElementById("bug-cont").style.display="none";
             
          }
        else if (xmlhttp.readyState==4 && xmlhttp.status==200)
          {
                    document.getElementById("bug-cont").style.display="inline";
               document.getElementById("loadbar_feed").style.display="none";
        document.getElementById("bug-cont").innerHTML="<br><h3>Thank you! for Reporting bug, we will fix it as soon as possible.</h3><br><button class='btn btn-info' onclick='closex()'>Close</button>"

          }
        }
       
       
       xmlhttp.open("POST","/ajax/bug.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("urls="+urls+"&exp="+bug_exp+"&email="+bug_email);


    }
    else
    {
        alert("Please Explain the problem you are facing.");
        return false;
    }


});







$('#feed_send').click(function(){

  var feed_exp=document.getElementById('feed_exp').value;
  var feed_email=document.getElementById('feed_email').value;
    var feed_option=document.getElementById('feed_option').value;
  
   if(feed_email=='')
    {
      alert("Please enter you email.");
      return false;
    }
if(feed_option=='')
    {
      alert("Please select a category");
      return false;
    }
  
    if(feed_exp!='')
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

               document.getElementById("loadbar_feed").style.display="inline";
        document.getElementById("feed-cont").style.display="none";
             
          }
        else if (xmlhttp.readyState==4 && xmlhttp.status==200)
          {
                    document.getElementById("feed-cont").style.display="inline";
               document.getElementById("loadbar_feed").style.display="none";
        document.getElementById("feed-cont").innerHTML="<br><h3>Thank you! for your valuable feedback, our team will try to implement it as soon as possible.</h3><br><button class='btn btn-info' onclick='closex2()'>Close</button>"

          }
        }
       
       
       xmlhttp.open("POST","/ajax/bug.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("op="+feed_option+"&exp="+feed_exp+"&email="+feed_email);


    }
    else
    {
        alert("Please provide feedback.");
        return false;
    }


});
