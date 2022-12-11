<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name="description" content="Image du jour de la NASA">
    <meta name="author" content="Berachem MARKRIA">
    <!-- icon -->
    <link rel="icon" href="images/nasa.png">

    
    <title>NASA | Berachem.dev </title>
    
    <link href="css/bootstrap.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />    
    
    <!--     Fonts     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
  
</head>

<?php
      // get API key from NASA in .env.txt file
      $key = file_get_contents(".env.txt");
      // get 2nd line of .env.txt file
      $key = explode("\n", $key)[1];

  ?>  

<body>
<nav class="navbar navbar-transparent navbar-fixed-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="https://github.com/Berachem"> 
                    <i class="fa fa-github"></i>
                    Github
                </a>
            </li>
             <li>
                <a href="https://www.nasa.gov/"> 
                    <img src="images/nasa.png" alt="Nasa" width="30" height="25">
                    Nasa
                </a>
            </li>
            <li>
                <a href="https://berachem.dev/"> 
                  <img src="https://berachem.dev/assets/img/B.ico" alt="Nasa" width="25" height="25">
                    Berachem.dev
                </a>
            </li>

       </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
</nav>
<div class="main">

<!--    Change the image source '/images/restaurant.jpg')" with your favourite image.     -->
    
    <div class="cover black" data-color="black"></div>
     
<!--   You can change the black color for the filter with those colors: blue, green, red, orange       -->

    <div class="container">
        <h1 class="logo cursive">
            Image du jour 
        </h1>
<!--  H1 can have 2 designs: "logo" and "logo cursive"           -->
        
        <div class="content">
        <h2 class="date" style="color: peru;"></h2>
            <h4 class="motto">
              L'univers est d'une richesse qui nous est inconnue.
            </h4>
            <div class="subscribe">
                <h5 class="info-text">
                    Image transmisse par l'agence spatiale américaine. Revenez dans 
                    <span id="countdown" style="color:brown"> </span> pour voir une nouvelle image.

                     

                    
                </h5>
                <center>
                    <div class="row">
                        <a href="https://apod.nasa.gov/apod/astropix.html" target="_blank">
                          <button class="btn btn-danger btn-fill" id="downloadButton">
                            Voir sur le site de la NASA <img src="images/nasa.png" alt="Nasa" width="30" height="25">
                          </button>
                        </a>
                        <a href="https://data.nasa.gov/browse" target="_blank">
                          <button class="btn btn-primary btn-fill" id="downloadButton">
                            Accéder aux données de la NASA <img src="images/nasa.png" alt="Nasa" width="30" height="25">
                          </button>
                        </a>
                        <br>
                        <br>
                        
                    </div>
                </center>
            </div>
        </div>
    </div>
    <div class="footer">
      <div class="container">
             Réalisé par <a href="https://berachem.dev/" target="_blank">Berachem MARKRIA </a>
      </div>
    </div>
 </div>

</body>
    <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>


<script>
  
      

    
  // get image of the day from NASA
  const key = "<?php echo $key; ?>";
  // put in variable url random from listApiImages
  const url = `https://api.nasa.gov/planetary/apod?api_key=${key}`;
  




  fetch(url)
    .then(response => response.json())
    .then(data => {
      document.querySelector(".main").style.backgroundImage = `url(${data.url})`;
      document.querySelector(".motto").innerHTML = data.explanation;
      // date
      const date = new Date(data.date);
      const options = { year: 'numeric', month: 'long', day: 'numeric' };
      data.date = date.toLocaleDateString('fr-FR', options);
      document.querySelector(".date").innerHTML = data.date;


    });

    // set countdown to time left in the day
    const countdown = document.getElementById("countdown");
    const date = new Date();
    const nextDay = new Date(date.getFullYear(), date.getMonth(), date.getDate() + 1);
    const timeLeft = nextDay - date;
    const seconds = Math.floor(timeLeft / 1000);
    const minutes = Math.floor(seconds / 60);
    const hours = Math.floor(minutes / 60);
    countdown.innerHTML = `${hours % 24} heures, ${minutes % 60} minutes, ${seconds % 60} secondes`;
    // update countdown every second
    setInterval(() => {
      const date = new Date();
      const nextDay = new Date(date.getFullYear(), date.getMonth(), date.getDate() + 1);
      const timeLeft = nextDay - date;
      const seconds = Math.floor(timeLeft / 1000);
      const minutes = Math.floor(seconds / 60);
      const hours = Math.floor(minutes / 60);
      countdown.innerHTML = `${hours % 24} heures, ${minutes % 60} minutes, ${seconds % 60} secondes`;
    }, 1000);

    if (timeLeft < 0) {
      countdown.innerHTML = "0 secondes";
      // refresh page
      setTimeout(() => {
        location.reload();
      }, 1000);
    }
    

    
    


  


</script>
</html>