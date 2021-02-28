<head>
    <title>The Todo App</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <style type="text/css">
	.brand{
	  	background: #cbb09c !important;
	}
  	.brand-text{
  		color: #cbb09c !important;
  	}
  	form{
  		max-width: 460px;
  		margin: 20px auto;
  		padding: 20px;
  	}
    .error {
        color:red;
    }
    .bottom-card{
        display:flex !important;
        justify-content: space-between;
        align-items:center;
    }
    .brand-containter {
        max-width:30%;
    }
    .created-at {
        margin-top:50px !important;
    }
  </style>
</head>
<body class="grey lighten-4">
	<nav class="white z-depth-0">
    <div class="container">
      <a href="/" class="brand-logo brand-text">The Todo App</a>
      <ul id="nav-mobile" class="right hide-on-small-and-down">
        <li><a href="/add.php" class="btn brand z-depth-0">Add new Task</a></li>
      </ul>
    </div>
  </nav>