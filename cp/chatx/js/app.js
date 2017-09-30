(function() {
  'use strict';

  var uuid, avatar, color, cat,chan, name;

  // Assign a uuid made of a random cat and a random color
  /*var randomColor = function() {
    var colors = ['navy', 'slate', 'olive', 'moss', 'chocolate', 'buttercup', 'maroon', 'cerise', 'plum', 'orchid'];
    return colors[(Math.random() * colors.length) >>> 0];
  };

  var randomCat = function() {
    var cats = ['tabby', 'bengal', 'persian', 'mainecoon', 'ragdoll', 'sphynx', 'siamese', 'korat', 'japanesebobtail', 'abyssinian', 'scottishfold'];
    return cats[(Math.random() * cats.length) >>> 0];
  };*/

  /* color = randomColor();
 cat = randomCat();
  uuid = color + '-' + cat;
  avatar = 'images/' + cat + '.jpg';*/
  color= 'whitesmoke';
  avatar = data.ava;
  name= data.name;
  uuid = data.id;
  chan = data.chan;
  //alert(avatar);
  

  function showNewest() {
    //document.querySelector('core-scaffold').$.headerPanel.scroller.scrollTop = document.querySelector('.chat-list').scrollHeight;
//sounds.play('mess_in');
    var chatDiv = document.querySelector('.chat-list');
    chatDiv.scrollTop = chatDiv.scrollHeight; //TODO: Need to fix so that we can find the .chat-list class object
  }

  /* Polymer UI and UX */

  var template = document.querySelector('template[is=dom-bind]');

  template.name= name;
  template.channel = chan;
  template.uuid = uuid;
  template.avatar = avatar;
  template.color = color;
  template.cats = [];
   template.mens = [];

  // Sending a chat message by pressing a keyboard return key
  template.checkKey = function(e) {
    if(e.keyCode === 13 || e.charCode === 13) {
      template.publish();
     //sounds.play( 'mess_in' );
    }
  };
  // Sending a chat message by clicking a "Send" button
  template.sendMyMessage = function(e) {
    template.publish();
   sounds.play( 'mess_in' );
  };

  template.messageList = [];


  /* PubNub Realtime Chat */

  var pastMsgs = [];
  var onlineUuids = [];

  template.getListWithOnlineStatus = function(list) {
    [].forEach.call(list, function(l) {
      // sanitize avatars
       //sounds.play('mess_in');
      var catName = (l.name + '').split('-')[1];
      //l.avatar = 'images/' + catName + '.jpg';
     // alert("my UUID:"+uuid+"L uuid:"+l.uuid);
      l.avatar = "'"+l.avatar+"'";
     /* if(l.uuid==uuid)
      {
        sounds.play('mess_in');
      }*/

     /* if (catName === undefined || /\s/.test(l.uuid)) {
        l.uuid = 'fail-cat';
        console.log('Oh you, I made this demo open so nice devs can play with, but you are not nice. Please use your keys, and do not mess with this chat room.');
      }*/

      // Check status
      if(template.cats.indexOf(l.uuid) > -1) {
        l.status = 'online';
        //sounds.play('men_in');
                  if(l.uuid!=uuid)
                  {
                    if(usr_set=="y")
                    {
                        $('#m_status').html('<i>Mentor:</i><span class="online1"></span>');
                        $('#m_status1').html('<span class="online">Online</span>');
                    }
                     else
                     {
                        $('#m_status').html('<i>User:</i><span class="online1"></span>');
                        $('#m_status1').html('<span class="online">Online</span>');
                     }
                  
                  console.log("1");
                  }

      } else {
        l.status = 'offline';
       // sounds.play('men_out');
             if(l.uuid!=uuid){
                  if(usr_set=="y")
                  {
                       $('#m_status').html('<i>Mentor:</i><span class="offline1"></span>');
                       $('#m_status1').html('<span class="offline">Offline</span>');
                  }
                     else
                     {
                         $('#m_status').html('<i>User:</i><span class="offline1"></span>');
                        $('#m_status1').html('<span class="offline">Offline</span>');
                     }
                  console.log("3");
                }

      }
    });
    return list;
  };

  template.displayChatList = function(list) {
    template.messageList = list;
    // scroll to bottom when all list items are displayed
    template.async(showNewest);
  };

  template.subscribeCallback = function(e) {

    
    if(template.$.sub.messages.length > 0) { console.log(template.$.sub.messages);
      //alert(template.$.sub.messages[0].uuid);
        this.displayChatList(pastMsgs.concat(this.getListWithOnlineStatus(template.$.sub.messages)));
        //alert("my UUID:"+uuid+"L uuid:"+template.$.sub.messages);
    }
    //console.log("e det:"+e.detail);
  if(e.detail.uuid!=uuid && e.detail.uuid!==undefined) //play sound when msg recieved from other side.
  {
    //alert("sound");
    sounds.play('mess_in');

     $.amaran({
                
                'content'   :{
                   title:'you have a new message!',
                         bgcolor:'#AFFF35',
                         color:'#AFFF35',
                           icon:'fa fa-smile-o',
                           info:'',
                         message:'You have a new message!'
                       

                    
                     },
                     'theme'     :'default',
                     'delay':10000,

                     'sticky'    :false,
                     'closeOnClick':true,
                     'outEffect':'slideRight',
                      'closeButton'   :true,
                       'afterEnd' :function()
                        {
                            $('html,body').animate({
                           scrollTop: $("#chatio").offset().top},
                                 'slow');
                        }
                   
                });
   // console.log("My uuid:"+uuid+" Other:"+e.detail.uuid);
  }  

  };

  template.presenceChanged = function(e) {
    var i = 0;
    var l = template.$.sub.presence.length;
    var d = template.$.sub.presence[l - 1];
   // alert(d.name);
      var who_online;
      /*alert(d.uuid);
      alert("data id:"+data.id);
       alert("data2 id:"+data2.id);*/

      if(d.uuid==data.id)
      {
        who_online=data.name;
        //alert("data name:"+data.name);
      }
      if(d.uuid==data2.id)
      {
        who_online=data2.name;
        //alert("data2 name:"+data2.name);
      }
      
      //alert(who_online);
   // console.log(d.uuid);
     //console.log(d.occupancy);

    // how many users
    template.occupancy = d.occupancy;
    if(template.occupancy==1)
    {
      var occupan=1;
    }

    // who are online
    if(d.action === 'join') {
      //alert(d.uuid+" joined the conversation.");
      if(d.uuid==uuid)
      {
        //sounds.play( 'men_in' );
        document.getElementById('u_status').innerHTML='<i>You:</i><span class="online1"></span>'
        if(occupan==1)
        {
                     if(usr_set=="y")
                     {
                        $('#m_status').html('<i>Mentor:</i><span class="offline1"></span>');
                        $('#m_status1').html('<span class="offline">Offline</span>');
                     }
                     else
                     {
                         $('#m_status').html('<i>User:</i><span class="offline1"></span>');
                        $('#m_status1').html('<span class="offline">Offline</span>');
                     }

        }
      }
      else
      {
                     if(usr_set=="y")
                     {
                        $('#m_status').html('<i>Mentor:</i><span class="online1"></span>');
                        $('#m_status1').html('<span class="online">Online</span>');
                     }
                     else
                     {
                         $('#m_status').html('<i>User:</i><span class="online1"></span>');
                        $('#m_status1').html('<span class="online">Online</span>');
                     }
         sounds.play( 'men_in' );
         console.log("2");

      }
      /*if(d.uuid.length > 35) { // pubnub admin console
        d.uuid = 'the-mighty-big-cat';
      }*/
      this.push('cats', d.uuid);
       this.push('mens', who_online);
        
    } else {
      var idx = template.cats.indexOf(d.uuid);
      if(idx > -1) {
        this.splice('cats', idx, 1);
      }
      var idx2 = template.mens.indexOf(who_online);
      if(idx2 > -1) {
        this.splice('mens', idx2, 1);
      }
    }

    if(d.action === 'leave' || d.action ==='timeout')
    {
      // alert(d.uuid+" left the conversation.");
      if(d.uuid==uuid)
      {
        //document.getElementById('u_status').innerHTML='<i>You:</i><span class="offline"></span>'
        // sounds.play( 'men_out' );
        
      }
      else
      {
                    if(usr_set=="y")
                    {
                      $('#m_status').html('<i>Mentor:</i><span class="offline1"></span>');
                        $('#m_status1').html('<span class="offline">Offline</span>');
                    }
                     else
                     {
                       $('#m_status').html('<i>User:</i><span class="offline1"></span>');
                        $('#m_status1').html('<span class="offline">Offline</span>');
                     }
         sounds.play( 'men_out' );

      }
    }

    i++;

    // update the status at the main column
    if(template.messageList.length > 0) {

      template.messageList = this.getListWithOnlineStatus(template.messageList);
    }
  };

  template.historyRetrieved = function(e) {
  if(e.detail[0].length > 0) {
      pastMsgs = this.getListWithOnlineStatus(e.detail[0]);
      this.displayChatList(pastMsgs);
    }
  };

  template.publish = function() {
    if(!template.input) return;

    template.$.pub.message = {
      uuid: uuid,
      name: name,
      avatar: avatar,
      color: color,
      text: template.input,
      timestamp: new Date().toISOString()
    };
    template.$.pub.publish();
    template.input = '';
  };

  template.error = function(e) {
      console.log(e);
  };

  template._colorClass = function(color) {
      return 'middle avatar '+color;
  };

  template._backgroundImage = function(avatar) {
      return 'background-image: url("'+avatar+'");';
  };
})();