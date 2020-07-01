<!DOCTYPE html>
<head>
  <title>Adressverwaltung</title>
  <style>
    body {
      width: 85%;
      height: 100%;
      margin: 0 auto;
      padding: 50px;
      background-color: #F5FFF0;
    }
    fieldset {
      background: #eee;
      padding: 10px;
      width: 60%;
      margin-left: auto;
      margin-right: auto;
    }
    legend {
      margin-top: 19px; 
      font-weight: bold; 
      background: yellow;
      border-left: 2px solid #999;
      border-bottom: 2px solid #999;
    }
    input {
      text-align: left; 
      #padding: 1% 0% 1% 0%;
      margin: 2% 0% 0% 30%;
    }
    label { 
      display:inline-block;
      width: 5em;
    }
    nav {
      background-color: #fff;
      border: 1px solid #dedede;
      border-radius: 4px;
      box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.055);
      color: #888;
      display: block;
      margin: 8px 22px 8px 22px;
      overflow: hidden;
      width: 100%; 
    }
    nav ul {
      margin: 0;
      padding: 0;
    }
    nav ul li {
      display: inline-block;
      list-style-type: none;
      
      -webkit-transition: all 0.2s;
      -moz-transition: all 0.2s;
      -ms-transition: all 0.2s;
      -o-transition: all 0.2s;
      transition: all 0.2s; 
    }
    nav > ul > li > a {
      color: #aaa;
      display: block;
      line-height: 56px;
      padding: 0 24px;
      text-decoration: none;
    }
    nav > ul > li > a > .caret {
      border-top: 4px solid #aaa;
      border-right: 4px solid transparent;
      border-left: 4px solid transparent;
      content: "";
      display: inline-block;
      height: 0;
      width: 0;
      vertical-align: middle;
      
      -webkit-transition: color 0.1s linear;
      -moz-transition: color 0.1s linear;
      -o-transition: color 0.1s linear;
        transition: color 0.1s linear; 
    }
    nav > ul > li:hover {
      background-color: rgb( 40, 44, 47 );
    }
    nav > ul > li:hover > a {
      color: rgb( 255, 255, 255 );
    }
    nav > ul > li:hover > a > .caret {
      border-top-color: rgb( 255, 255, 255 );
    }
    
    .alert-box {
      color:#555;
      border-radius:10px;
      font-family:Tahoma,Geneva,Arial,sans-serif;font-size:11px;
      padding:10px 36px;
      margin:10px;
    }
    .alert-box span {
      font-weight:bold;
      text-transform:uppercase;
    }
    .error {
      background:#ffecec url('/images/error.png') no-repeat 10px 50%;
      border:1px solid #f5aca6;
    }
    .success {
      background:#e9ffd9 url('/images/success.png') no-repeat 10px 50%;
      border:1px solid #a6ca8a;
    }
  </style>
</head>
<body>
<nav><h1><center>Willkommen in der Adressverwaltung</center></h1><hr>
	<ul>
		<li><a href="index.php">Home/Overview</a></li>
		<li><a href="register.php">Register an Address</a></li>
		<li><a href="edit.php">Edit an Address</a></li>
    <li><a href="delete.php">Delete an Address</a></li>
	</ul>
</nav>