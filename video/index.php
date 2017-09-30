<!DOCTYPE html>
<html id="home" lang="en">
<?php
include("../includes/config.php");

$queryu = query("SELECT * FROM video");
    $rowu = mysqli_fetch_array($queryu);
    $sid=$rowu['sid'];
    echo $sid;
    echo '<script> var usid='.$sid.';</script>';
?>
<script type="text/javascript">
   // alert(usid);
</script>
    <head>
        <title>Ecounsellers || Video-Chat</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        
        <meta name="author" content="Nitin kumar">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link rel="stylesheet" href="https://www.webrtc-experiment.com/style.css">
        
        <style>
            audio, video {
                -moz-transition: all 1s ease;
                -ms-transition: all 1s ease;
                
                -o-transition: all 1s ease;
                -webkit-transition: all 1s ease;
                transition: all 1s ease;
                vertical-align: top;
                
                width: 45%;
            }
            input {
                border: 1px solid #d9d9d9;
                border-radius: 1px;
                font-size: 2em;
                margin: .2em;
                width: 70%;
            }
            .setup {
                border-bottom-left-radius: 0;
                border-top-left-radius: 0;
                font-size: 102%;
                height: 47px;
                margin-left: -9px;
                margin-top: 8px;
                position: absolute;
            }
            p { padding: 1em; }
            li {
                border-bottom: 1px solid rgb(189, 189, 189);
                border-left: 1px solid rgb(189, 189, 189);
                padding: .5em;
            }
        </style>
        <script>
            document.createElement('article');
            document.createElement('footer');
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    </head>

    <body>
        <article>
            
                   
                

            

            <table class="visible">
                <tr>
                    <td style="text-align: right;">
                        <input type="text" class="secid" id="conference-name" placeholder="Broadcast Name" value="12345">
                    </td>
                    <td>
                        <button id="start-conferencing">New Broadcast</button>
                    </td>
                </tr>
            </table>
            <table id="rooms-list" class="visible"></table>

          <!--  <table class="visible">
                <tr>
                    <td style="text-align: center;">
                        <h2>
                            <strong>Private Broadcast</strong> ?? <a href="" target="_blank" title="Open this link in new tab. Then your broadcasting room will be private!"><code><strong id="unique-token">#123456789</strong></code></a>
                        </h2>
                    </td>
                </tr>
            </table>-->

            <div id="participants"></div>

            <script src="scripts/firebase.js"> </script>
            <script src="scripts/RTCPeerConnection-v1.5.js"> </script>
            <script src="scripts/broadcast.js"> </script>
           <script type="text/javascript">


           $(document).ready(function(){


    //alert('got here');
     // Focus to the username field on body loads
    $('#start-conferencing').click(function(e){ // Create `click` event function for login
         e.preventDefault();
        //$('#emailid').focus();
        // alert('got here 2');
        var sid = $('.secid'); // Get the username field
       // var password = $('#password'); // Get the password field
       // var login_result = $('.login_result'); // Get the login result div
        //login_result.html('<img style="height:70px;width:70px;" src="images/loading.gif"/>');
        //login_result.html('<p class="error">loading..</p>'); // Set the pre-loader can be an animation
        /*if(emailid.val() == ''){ // Check the username values is empty or not
            emailid.focus(); // focus to the filed
            login_result.html('<p class="error">Enter the Email ID</p>');
            return false;
        }
         if (!isValidEmail(emailid.val())) {
            emailid.focus(); // focus to the filed
            login_result.html('<p class="error">Please enter a valid Email</p>');
            return false;
        }
        if(password.val() == ''){ // Check the password values is empty or not
            password.focus();
            login_result.html('<p class="error">Enter the Password</p>');
            return false;
        }*/
        if(sid.val() != ''){ // Check the username and password values is not empty and make the ajax request
            var UrlToPass = 'action=secret&sid='+sid.val();
            $.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod
            type : 'POST',
            data : UrlToPass,
            url  : 'checker.php',
            success: function(responseText){ // Get the result and asign to each cases
                /*if(responseText == 0){
                    login_result.html('<p class="error">Emailid or Password Incorrect!</p>');
                }
                else if(responseText == 1){
                //login_result.html('<p class="error">success!</p>');

                    window.location = 'profile.php';
                }
                else if(responseText==2)
                {
                    login_result.html('<p class="error">Invalid email!</p>');

                }

                else{
                    alert('Problem with sql query');
                }*/
            }
            });


    }
        return false;
    });
});


var config = {
    openSocket: function(config) {
        // https://github.com/muaz-khan/WebRTC-Experiment/blob/master/Signaling.md
        // This method "openSocket" can be defined in HTML page
        // to use any signaling gateway either XHR-Long-Polling or SIP/XMPP or WebSockets/Socket.io
        // or WebSync/SignalR or existing implementations like signalmaster/peerserver or sockjs etc.

        var channel = config.channel || location.href.replace( /\/|:|#|%|\.|\[|\]/g , '');
        var socket = new Firebase('https://webrtc.firebaseIO.com/' + channel);
        socket.channel = channel;
        socket.on('child_added', function(data) {
            config.onmessage(data.val());
        });
        socket.send = function(data) {
            this.push(data);
        };
        config.onopen && setTimeout(config.onopen, 1);
        socket.onDisconnect().remove();
        return socket;
    },
    onRemoteStream: function(media) {
        var video = media.video;
        video.setAttribute('controls', true);

        participants.insertBefore(video, participants.firstChild);

        video.play();
        rotateVideo(video);
    },
    onRoomFound: function(room) {
        var alreadyExist = document.getElementById(room.broadcaster);
        if (alreadyExist) return;

        if (typeof roomsList === 'undefined') roomsList = document.body;

        var tr = document.createElement('tr');
        tr.setAttribute('id', room.broadcaster);

       
        tr.innerHTML = '<td value="'+room.roomName+'">' + room.roomName + '</td>' +
            '<td><button class="join" id="' + room.roomToken + '">Join Room</button></td>';
        
        roomsList.insertBefore(tr, roomsList.firstChild);

        tr.onclick = function() {
            tr = this;
            captureUserMedia(function() {
                broadcastUI.joinRoom({
                    roomToken: tr.querySelector('.join').id,
                    joinUser: tr.id
                });
            });
            hideUnnecessaryStuff();
        };
    }
};

function createButtonClickHandler() {
    captureUserMedia(function() {
        broadcastUI.createRoom({
            roomName: (document.getElementById('conference-name') || { }).value || 'Anonymous'
        });
    });
    hideUnnecessaryStuff();
}

function captureUserMedia(callback) {
    var video = document.createElement('video');
    video.setAttribute('autoplay', true);
    video.setAttribute('controls', true);
    participants.insertBefore(video, participants.firstChild);

    getUserMedia({
        video: video,
        onsuccess: function(stream) {
            config.attachStream = stream;
            callback && callback();

            video.setAttribute('muted', true);
            rotateVideo(video);
        },
        onerror: function() {
            alert('unable to get access to your webcam.');
            callback && callback();
        }
    });
}

/* on page load: get public rooms */
var broadcastUI = broadcast(config);

/* UI specific */
var participants = document.getElementById("participants") || document.body;
var startConferencing = document.getElementById('start-conferencing');
var roomsList = document.getElementById('rooms-list');

if (startConferencing) startConferencing.onclick = createButtonClickHandler;

function hideUnnecessaryStuff() {
    var visibleElements = document.getElementsByClassName('visible'),
        length = visibleElements.length;
    for (var i = 0; i < length; i++) {
        visibleElements[i].style.display = 'none';
    }
}

function rotateVideo(video) {
    video.style[navigator.mozGetUserMedia ? 'transform' : '-webkit-transform'] = 'rotate(0deg)';
    setTimeout(function() {
        video.style[navigator.mozGetUserMedia ? 'transform' : '-webkit-transform'] = 'rotate(360deg)';
    }, 1000);
}

(function() {
    var uniqueToken = document.getElementById('unique-token');
    if (uniqueToken)
        if (location.hash.length > 2) uniqueToken.parentNode.parentNode.parentNode.innerHTML = '<h2 style="text-align:center;"><a href="' + location.href + '" target="_blank">Share this link</a></h2>';
        else uniqueToken.innerHTML = uniqueToken.parentNode.parentNode.href = '#' + (Math.random() * new Date().getTime()).toString(36).toUpperCase().replace( /\./g , '-');
})();



           </script>		
        </article>
       

       
        
       
    
        
    </body>
</html>