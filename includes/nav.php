<?php
    // Nav bar code

    $uid= $_SESSION['u_id'];
    $queryu = query("SELECT * FROM u_users WHERE u_id='$uid'");
    $rowu = mysqli_fetch_array($queryu);
    $rowf= array();
    mysqli_data_seek($qfields, 0);


    ?>
    <style type="text/css">
       .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover {
    color: white; 
   background-color: transparent; 
       }
        .navbar-default .navbar-collapse, .navbar-default .navbar-form {
     border-color: transparent; 
            text-align : center;
  
}
        @media (max-width: 767px){
.navbar-nav .open .dropdown-menu {
    position: static;
    float: none;
    width: auto;
    margin-top: 0;
     background-color: white;
               color:#25b1cb   !important;
    border: 0;
    -webkit-box-shadow: none;
    box-shadow: none;
 
}
           .dropdown-menu .divider {
    height: 1px;
    margin: 9px 0;
    overflow: hidden;
    background-color: transparent;
}
          
.navbar-default .navbar-nav .open .dropdown-menu>li>a {
    
}
        }
        
      .navbar-default {
   
    font-family: 'Open Sans','Helvetica Neue',Arial,sans-serif;
    background-color: #25b1cb;
    -webkit-transition: all .35s;
    -moz-transition: all .35s;
    transition: all .35s;
    border:none;
    
}

        nav{
        -webkit-backface-visibility:hidden; 
            -webkit-transform: translateZ(0);
        }
.navbar-default .navbar-header .navbar-brand {
   
    font-family:  'Montserrat', sans-serif;
    font-weight: 700;
    font-size: 18pt;
    color: #ffffff;
}

.navbar-default .navbar-header .navbar-brand:hover,
.navbar-default .navbar-header .navbar-brand:focus {
    color: #ffffff;
}

.navbar-default .nav > li>a,
.navbar-default .nav>li>a:focus {
    text-transform: uppercase;
    font-size: 13px;
    font-weight: 700;
    color: #ebebeb;
    background-color: transparent;
}

.navbar-default .nav > li>a:hover,
.navbar-default .nav>li>a:focus:hover {
    color: #ffffff;
    
    
}

.navbar-default .nav > li.active>a,
.navbar-default .nav>li.active>a:focus {
    color: #ffffff!important;
    background-color: transparent;
}

.navbar-default .nav > li.active>a:hover,
.navbar-default .nav>li.active>a:focus:hover {
    background-color: transparent;
}
@media(min-width:768px) {
    .navbar-default {
        border:none;
        background-color: transparent;
    }

    .navbar-default .navbar-header .navbar-brand {
        color: rgba(255,255,255,.7);
        opacity:0.7;
        
    }

    .navbar-default .navbar-header .navbar-brand:hover,
    .navbar-default .navbar-header .navbar-brand:focus {
        color: #fff;
         opacity:1;
    }

    .navbar-default .nav > li>a,
    .navbar-default .nav>li>a:focus {
        color: rgba(255, 255, 255, 0.7);
        background-color: transparent;
    }

    .navbar-default .nav > li>a:hover,
    .navbar-default .nav>li>a:focus:hover {
        color: #fff;
      
    }

    .navbar-default.affix {
       
        background-color: #25b1cb;
    
    }

    .navbar-default.affix .navbar-header .navbar-brand {
        font-size: 14pt;
        color: #ffffff;
        opacity:1;
    }

    .navbar-default.affix .navbar-header .navbar-brand:hover,
    .navbar-default.affix .navbar-header .navbar-brand:focus {
        color: #ffffff;
        opacity:1;
        
    }


    .navbar-default.affix .nav>li>a:focus {
        color: #eaeaea;
        background-color:#25a0b7;
                

    }

    .navbar-default.affix .nav>li>a:active {
        color: #ffffff;
                background-color: #20a2ba;

    }

    .navbar-default.affix .nav > li>a:hover,
    .navbar-default.affix .nav>li>a:focus:hover {
        color: #ffffff;          background-color: #39b8d0;

    }
    .navbar-default.affix .nav > li .active {
        color: #ffffff;          background-color: #20a2ba;

        
    }
    .navbar-collapse.in{ overflow-y:visible;}
    
}
        .navbar-toggle,.navbar-toggle:visited,.navbar-toggle:focus{
            border:none;
            background:#20a2ba !important;
        }
        .navbar-toggle:hover{
            border:none;
            background:#25b1cb !important;
        }
        .navbar-toggle > button> span{
            background:white;
            color:white;
        }
    


        .navbar-login
{
    width: 305px;
    padding: 10px;
    padding-bottom: 0px;
}

.navbar-login-session
{
    padding: 10px;
    padding-bottom: 0px;
    padding-top: 0px;
}

.icon-size
{
    font-size: 87px;
}
        
.dropdown-menu {
    position: absolute;
    padding: 20px !important;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
  
    padding: 5px 0;
    /* margin: 2px 0 0; */
    font-size: 14px;
    text-align: left;
    list-style: none;
    background-color: #FFFFFF;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #ccc;
    border: 1px solid rgba(0,0,0,.15);
    /* border-radius: 4px; */
    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
}

        footer img{
        width:30px;
            height:30px;
        }


        #bs-example-navbar-collapse-1 ul li:hover a {
        box-shadow:  0px -1px 0px 0px #FFFFFF inset;
}

.navbar-nav>li>.dropdown-menu {

    border-radius: 0px;
    }

    .dropdown-menu>li>a {

        color: #25B1CB;

    }
    </style>
    
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"></span>
                    <span class="icon-bar" style="color:white;background:white;border-color:white;"></span>
                    <span class="icon-bar" style="color:white;background:white;border-color:white;"></span>
                    <span class="icon-bar" style="color:white;background:white;border-color:white;"></span>
                </button>
                <a class="navbar-brand page-scroll" title="ecounsellors.in" href="/"><img src="/img/logov2.png"  width="150px" height="40px" style="position:relative;top:-10px"> </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" title="Home" href="/">Home</a>
                    </li>
                    <li>
                    <?php 
                    if($currentpage=='/index.php')
                        echo '<a class="page-scroll" title="How It Works" href="#howitworks">How It Works</a>';
                    else
                         echo '<a class="page-scroll" title="How It Works" href="/#howitworks">How It Works</a>';
                        ?>
                    </li>
                    <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories                             <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                    <?php
   $cn =0;
                        while($row_fields=mysqli_fetch_array($qfields))
                             {
                                echo '<li><a href="/hub/'.preg_replace('/\s+/', '-', $row_fields['name']).'" title="'.$row_fields['name'].'"><img src="/img/'.strtolower(substr($row_fields['name'], 0,3)).'b.png" style="margin-right:20px;width:40px;">'.$row_fields['name'].'</a></li><li class="divider"></li>';
                            $cn++;
                            if($cn==5){break;};
                             }
         ?>
                            </ul>
                    </li>

                     <li>
      <?php
 if($_SESSION['u_id'])
        {
      echo '<a href="/profile">';
        
         if($rowf['propic']=="")
          {
            if($rowu['status']=="f" or $rowu['status']=="g")
            echo '<img class="img-circle"style="height: 32px;width:32px;  margin: -6px -16px;"src="/u_img/'.$rowu['url_file'].'.png"/>';
                else
            echo '<img class="img-circle" style="height: 32px;width:32px;  margin: -6px -16px;"src="/uploader/userpic.gif"/>';
          }
          else
          {
            
            echo '<img class="img-circle"style="height: 32px;width:32px;  margin: -6px -16px;"src="'.$rowf['propic'].'"/>';

          }     
          echo '</a>';   
       echo '</li>
       <li class="dropdown">';


        echo '  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" style="text-transform: uppercase;" aria-expanded="false">';
         
          echo''.$rowu['name'].'<span class="caret"></span></a>

          <ul class="dropdown-menu" role="menu">
            <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4 text-center">
                                        <p class="text-center">
                                            <img class="img-circle" style="height: 87px;width:87px;  margin: -6px -16px;"src="/u_img/'.$rowu['url_file'].'.png"/>
                                        </p>
                                    </div>
                                    <div class="col-lg-8 text-center">
                                        <p class="text-left"><strong>'.$rowu['name'].'</strong></p>
                                        <p class="text-left small">'.$rowu['emailid'].'</p>
                                     
                                        
                                       
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12 col-xs-12">
                                        
                                            <a href="/appointments" class="btn btn-primary btn-sm btn-new">Appointments</a>
                                           
                                            <a href="/profile" class="btn btn-primary btn-sm btn-new">Profile</a>
                                            &nbsp &nbsp<small><a href="/logout">Logout </a></small>
                                        
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>';
      }
?>
        <!-- <li><a href="/#contact">Support</a></li>
          <li><a target="_blank" href="/blog" title="ecounsellors.in Blog">Blog</a></li>-->
        <li>
        <?php
        if($currentpage=='/index.php')
        echo '<a href="#faq" class="page-scroll" title="FAQs">FAQs</a>';
        else
        echo '<a href="/#faq" class="page-scroll" title="FAQs">FAQs</a>';
        ?>

        </li>

        <?php  if(!$_SESSION['u_id']){
            if($currentpage=='/index.php')
             echo '<li><a href="#" onclick="click_log()" title="LogIn">LogIn</a></li>';
            else
            echo '<li><a href="/?lo" title="LogIn">LogIn</a></li>';
          }?>
  
                    <li>
                        <a class="page-scroll" href="/contact-us" title="Contact Us">contact us</a>
                    </li>
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>