
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">

  <!-- Chrome for Android theme color -->
  <meta name="theme-color" content="#00BCD4">

    <!-- Tile color for Win8 -->
  <meta name="msapplication-TileColor" content="#00BCD4">

  <!-- Add to homescreen for Chrome on Android -->
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="application-name" content="PSK">

  <!-- Add to homescreen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Polymer Starter Kit">


  <!-- Polyfill Web Components support for older browsers -->
  <script src="chatx/bower_components/webcomponentsjs/webcomponents-lite.min.js"></script>
     <link rel="import" href="chatx/bower_components/paper-icon-button/paper-icon-button.html">

  <!-- Polymer Elelments: will be replaced with elements/elements.vulcanized.html -->
  <link rel="import" href="chatx/elements/elements.html">

  <!-- CSS -->
  <link rel="stylesheet" href="chatx/css/style.css">

   <script src="chatx/offline/offline.js"></script>
        <link rel="stylesheet" href="chatx/offline/themes/offline-theme-default.css" />
        <link rel="stylesheet" href="chatx/offline/themes/offline-language-english.css" />
        <script type="text/javascript">
          $('paper-drawer-panel').removeAttr('style');
            $('body').css('overflow-x','hidden');
        </script>
        <style is="custom-style">
        <?php 
        if(isset($_SESSION['c_id']) and $agent==1)
        {
        ?>
           paper-drawer-panel {
             left: 300px !important;
    width: 1127px !important;
    height: 667px !important;
    display: block;
    position: absolute;
    top:auto;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}
<?php
}
else
{
?>
  paper-drawer-panel {
      height: 600px !important;
            
    display: block;
    position: absolute;
    top:auto;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

<?php

}
?>
  paper-drawer-panel {
    border-top: 2px solid #2190a5;
    }

   #navheader .uuid {
    margin-left: auto;
  }
    #navheader .avatar {
    
    width: 50;
    height: 50;
  }
  #navheader{
    background-color: #00BCD4;
  }

    paper-input {
      padding-right: 10px;
      --paper-input-container-focus-color: #F44336; /* red */
    }
    paper-toolbar {
      --paper-toolbar-background: #00BCD4; /* cyan */
      --paper-toolbar: {
        font-size: 1.2em; 
      };
    }

    .online,.offline{

    }


      .online1{
      padding-left: 22px;
    margin: 10px;
    background-color: #AFFF35;
    border: 1px solid #66EC66;
    border-radius: 22px;
    box-shadow: 0px 0px 5px #fff;
    }
    .offline1{
       padding-left: 22px;
    margin: 10px;
    background-color: rgb(180, 180, 180);
    border: 1px solid rgba(193, 185, 185, 0.83);
    border-radius: 22px;
    box-shadow: 0px 0px 5px rgba(155, 155, 155, 0.74);
    }
    
     .online{
     
   background-color: #37CB25;
    border: 1px solid #5AE058;
          padding: 1px 4px;
    color: white;

  
    border-radius: 22px;
    box-shadow: 0px 0px 5px #fff;
    
    }
    .offline{
        
  
     background-color:#b4b4b4;
    border: 1px solid rgba(222, 207, 207, 0.83);
          padding: 1px 4px;
    color: white;
 
  
    border-radius: 22px;
    box-shadow: 0px 0px 5px #fff;
 
    }
    #u_status{
      margin-left: 10px;
    }
    #m_status{
      margin-left: 10px;
    }
  </style>
        <script type="text/javascript">
        Offline.options = {checkOnLoad: true}

         // alert(Offline.check());

        </script>

  
  
</head>
<script type="text/javascript">


</script>
<body unresolved class="fullbleed layout vertical">

  <template is="dom-bind" id="app">

    
   <!-- <core-pubnub publish_key="pub-c-156a6d5f-22bd-4a13-848d-b5b4d4b36695" subscribe_key="sub-c-f762fb78-2724-11e4-a4df-02ee2ddab7fe" ssl="true" uuid="{{uuid}}"> -->
       <core-pubnub publish_key="pub-c-143a86dc-4e11-49fb-b48b-2c4f8485d8ec" subscribe_key="sub-c-9a0e6398-ee08-11e5-ab43-02ee2ddab7fe" ssl="true" uuid="{{uuid}}">
      <core-pubnub-subscribe channel="{{channel}}" id="sub" on-callback="subscribeCallback" on-presence="presenceChanged" on-error="{{error}}">
        <core-pubnub-publish channel="{{channel}}" message="" id="pub" on-error="{{error}}"></core-pubnub-publish>
        <core-pubnub-history channel="{{channel}}" count="30" on-success="historyRetrieved" on-error="{{error}}"></core-pubnub-history>
      </core-pubnub-subscribe>
    </core-pubnub>

  <!-- Drawer Panel (Left Column) -->
  <paper-drawer-panel id="drawerPanel">

    <!-- Drawer Header/Toolbar -->
    <paper-header-panel drawer>
      <paper-toolbar id="navheader" class="medium">
        <div class$="{{_colorClass(color)}} middle"  style$="{{_backgroundImage(avatar)}}"></div>
        <div class="bottom uuid">{{name}}</div>
      </paper-toolbar>

      <!-- Drawer Content -->
      <section id="onlineList">
        <paper-item class="subdue layout horizontal center">Online Now</paper-item>
        <div style="display: none;">
        <template is="dom-repeat" items="{{cats}}" as="cat">
          <paper-item>{{cat}}</paper-item>
        </template>
        </div>

          <template is="dom-repeat" items="{{mens}}" as="men">
          <paper-item>{{men}}</paper-item>
        </template>
      </section>
    </paper-header-panel>

    <!-- Main Area -->
    <paper-header-panel main>

      <!-- Main Header/Toolbar -->
      <paper-toolbar>
                        <paper-icon-button icon="menu" on-tap="menuAction" paper-drawer-toggle></paper-icon-button>

        <div class="flex"><strong>Chat</strong></div>
      <!-- <span>{{occupancy}}</span> <iron-icon icon="account-circle"></iron-icon>-->
         <div id="u_status"><i>You:</i><span class="online"></span></div>
        <div id="m_status"></div>
      </paper-toolbar>

      <!-- Main Content -->
      <div class="layout vertical fit" id="chat">
        <div class="chat-list flex">
          <template is="dom-repeat" items="{{messageList}}" as="message">
            <x-chat-list color="{{message.color}}" avatar="{{message.avatar}}" username="{{message.name}}" text="{{message.text}}" status="{{message.status}}" timestamp="{{message.timestamp}}"></x-chat-list>
          </template>
        </div>
       <!-- <div class="shim"></div> -->

        <div class="send-message layout horizontal">
          <paper-input class="flex" label="Type message..." id="input" value="{{input}}" on-keyup="checkKey"></paper-input>
          <paper-fab icon="send" id="sendButton" on-tap="sendMyMessage"></paper-fab>
        </div>
      </div>
    </paper-header-panel>
  </paper-drawer-panel>

</template>
<script src="chatx/sound.js"></script>
<script src="chatx/js/app.js"></script>
</body>
</html>

<script type="text/javascript">


Offline.check();
  Offline.on('up', function() {
            $('#u_status').html('<i>You:&nbsp;</i><span class="online1"></span>');
            $('#u_status1').html('<span class="online">Online</span>');
        


});
Offline.on('down', function() {
           $('#u_status').html('<i>You:&nbsp;</i><span class="offline1"></span>');
           $('#u_status1').html('<span class="offline">Offline</span>');
          

});

</script>