
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Rheostat - <?php if(isset($title)){echo($title);}?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'> -->
    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">



    <script src="<?php echo base_url(); ?>js/jquery.js"></script>

    
    <style type="text/css">
      body {
        padding-top: 20px;        
        background-position: bottom;
        background-repeat: no-repeat;
      }
      .jumbotron input[type="search"]{
        height: 30px;
      }
      #OL_login,#forgotPasswordForm{

      border-left: 1px solid #C2C2C2;
      padding-left: 20px;
      min-height: 150px;
      }


      /* Custom container */ 
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
        min-width: 700px;
        min-height: 500px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 60px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }
      .navigate{
      /*background-color: #3690c1;*/
      color: #3690c1;
      text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
      margin-right: 5px;
      padding: 10px 20px;
      /*border-right: 1px dashed #DADADA;*/
      border-left: 1px dashed #DADADA;
      display: inline-block;
    }
    .navigateContainer{
      margin-bottom: 60px;
      border-bottom: 1px #3690C1 solid;
    }
    .navigate:hover{
      text-decoration: none;
      background-color: #EFEFEF;
    }

    .navigateContainer .tabTopActive{
       
      background-color: #EFEFEF;
      border-bottom: 3px #3690C1 solid;
    }
    .navigateContainer p{
      text-align: center;
    }
    .buyerLogo{
      border-left: 1px solid #ccc;
      padding-left: 20px;
    }
    .wellcom{
      margin-right: 10px;
      line-height: 55px;
    }
    #inputPassword,#inputEmail,#findUserSearchBox{
    height: 30px;
    }
    #findany{
      /*margin-top: 40px;*/
    }
    .blue{
      border-top: #3690c1 1px solid;
      margin-top: 4px;
    }
/*    .resent-Items .well h4{
      text-align: center;
      padding-bottom: 10px;
      border-bottom: #3690c1 1px solid;
    }*/
    .resent-Items .well li{
      line-height: 32px;
    }
    .well{
      background-color: rgba(245, 245, 245, 0.4);
      border: 1px solid rgba(227, 227, 227, 0.41);
    }
    .error{
      color: #CC6767;
      font-size: 14px;
    }

    //date picker selected days
    .datepicker-days table tbody tr td{
      text-align: center;
    }
    .datepicker-days td:hover{
      background-color: #efefef;
      cursor: pointer;
    }
    .datepicker-days .active{
      background-color: #1374A8;
      color: #FFF;
    }
    .datepicker-days .active:hover{
      background-color: #1374A8;
    }

    input[disabled], select[disabled], textarea[disabled], input[readonly], select[readonly], textarea[readonly]{
      border: 0;
      background-color: rgba(255, 255, 255, 0);
      cursor: text;
      webkit-box-shadow: 0 0 0;
      -moz-box-shadow: 0 0 0;
      box-shadow: 0 0 0;

    }

    #dataSearch{
      position: absolute; 
      background: #FFF;
      box-shadow: 0px 3px 10px rgba(189, 189, 189, 0.56);
      border: 1px solid #CCC;
      padding: 6px;
      margin-top: -3px;
      border-top: 1px solid #fff;
    }

    #dataSearch li{
      padding-bottom: 0;
      padding: 5px;
      margin: 0;
    }
    .selected{
      background-color: #ccc;
    }

    .typeahead {
    z-index: 1051;
    margin-top: -2px;
    padding: 0 6px 6px 6px;
    }


    /*to align the checkbox on catagary*/
    #categoriesFilter input[type="checkbox"]
    {
      margin: 0 0 0 0;
      margin-bottom: 2px;
    }

    #categoriesFilter .btn-group
    {
      padding-top: 5px;
    }

    /*to align the checkbox on catagary*/
    #selectCatagary input[type="checkbox"]
    {
      margin: 0 0 0 0;
      margin-bottom: 2px;
    }

    #selectCatagary .btn-group
    {
      padding-top: 5px;
    }

    /* search resalt for a spasicic search */

 
  .UserSearchImage{
    padding: 10px;
    border-right: 1px solid rgba(204, 204, 204, 0.31);
  }
  .userDiscriptionDetails{
    padding: 10px 10px 10px 0;
  }

  textarea:focus,
  input[type="text"]:focus,
  input[type="password"]:focus,
  input[type="datetime"]:focus,
  input[type="datetime-local"]:focus,
  input[type="date"]:focus,
  input[type="month"]:focus,
  input[type="time"]:focus,
  input[type="week"]:focus,
  input[type="number"]:focus,
  input[type="email"]:focus,
  input[type="url"]:focus,
  input[type="search"]:focus,
  input[type="tel"]:focus,
  input[type="color"]:focus,
  .uneditable-input:focus {
    border-color: #3690C1;
    outline: 0;
    outline: thin dotted \9;
    /* IE6-9 */

    -webkit-box-shadow: 0;
    -moz-box-shadow: 0;
    box-shadow: inset 0;
  }

  #filtersForSearch{
    margin-bottom: 0;
  }

    #findContents input[type="search"]{
    height: 30px;
    /*padding: 4px 6px;*/
  }
  .searchanyThing{
    height: 40px;
  }

.tableLongDiscription{
        display: table;width: 300px;
          }



.nav-list li{
  text-align: right;
  line-height: 30px;
  margin-top: 5px;
}

.activeNav{
background-image: url(<?php echo base_url()?>img/pointer.png);
background-repeat: no-repeat;
background-position: right;
background-color: #efefef;
border-bottom: 1px dashed rgb(218, 218, 218);
border-right: 3px rgb(54, 144, 193) solid;
}

#wraper{
width: 85%; float: left;
}
#wraperInner{
  padding-left: 20px; border-left: thin #3690C1 solid;
}

      #contentPreviewContainer .table th, #contentPreviewContainer .table td,#contentPreviewContainer .input-block-level{
        border: 0;
        padding: 0;
      }
      #contentPreviewContainer .table td:nth-child(1){
        width: 100px;
        text-align: right;
        padding-top: 4px;
        padding-right: 10px;
        font-size: 12px;
      }
      
      #contentPreviewContainer textarea, #contentPreviewContainer input[type="text"]{
        
        margin: 0;
        padding: 0;
      }

.wordlimitExsed{
  display: none;
}
.wordlimit{

}

.accordion-toggle{
background-color: #EFEFEF;
      border-bottom: 3px #3690C1 solid;
}
.accordion-heading a{
        text-decoration: none;

}

/*add mandatary mark*/
/*content: ' ✓';*/
/*.required{
border-left: 1px solid #CF2727;
}*/

.r-label::after{
  content: " *";
  color: red;
  font-size: 13px;

/*background: #444;*/
}



    </style>
 <!--    <link href="css/bootstrap-responsive.css" rel="stylesheet"> -->

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>
  

    
    

  
