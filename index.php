<!DOCTYPE html>
<html>
<head>
<title>NASA | Berachem.dev </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="css/bootstrap.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />    
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="images/nasa.png" />
  <style>
    .full-screen-image {
      background-size: cover;
      background-position: center;
      height: 100vh;
    }
    .description {
      background-color: #0B132B;
      color: white;
      padding: 20px;
      position: absolute;
      bottom: 10px;
      left: 10px;
      right: 10px;
      border-radius: 10px;
    }

    .navbar{
      background-color: #0B132B76;
    }

  </style>
</head>
<body>
<nav class="navbar navbar-transparent navbar-fixed-top" role="navigation" data-aos="fade-down" data-aos-duration="500">
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
                    <img src="images/github.png" alt="Github" width="25" height="25">
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
            <li>
                <a onclick="toggleDescription()"> 
                    Afficher/ Masquer la description
                </a>
            </li>
       </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
</nav>

<audio controls autoplay style="display: none">
              <source src="music/music1.mp3" type="audio/mpeg">
            </audio>
  <div class="full-screen-image">
    <div class="container">
      
      <div class="description" data-aos="fade-up" data-aos-duration="500">
      <div class="eye-icon" onclick="toggleDescription()">
        <img id="eye-image" src="images/eye-opened.png" alt="eye-icon" width="50" height="50">
      </div>

          <h5 class="title-image-day"></h5>
          <p>
            <span class="date"></span> - 
            <span id="countdown" style="color: #F64C72"></span>
          </p>
          <p class="description-image-day" id="description-to-translate"></p>
          <br>
          <i id="bottom-text"> Made by <a href="https://berachem.dev/">
            Berachem MARKRIA</a>
            <br>
            Music by <a href="https://pixabay.com/fr/users/amurich-23822000/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=music&amp;utm_content=9362">Amurich</a>
          </i>
          <br>
          <br>
          <div style="display: flex; justify-content: center;">
            <button id="music-button" class="btn btn-primary">
              <img src="images/music-icon.gif" alt="music-icon" width="25" height="25"
              style="margin-right: 10px; background-color: #F64C72; border-radius: 50%">
              Activer la musique
            </button>

          </div>
      </div>

    </div>
  </div>
</body>

<style>

/* make description a little bit smaller in height for phone */

@media only screen and (max-width: 1200px) {

  .title-image-day {
    font-size: 20px;
  }

  .description-image-day, 
  #music-button, audio , .volume-control{
    display: none;
  }

  .date {
    font-size: 15px;
  }
  .navbar {
    display: none;
  }


}



</style>

  <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

<script>
  function toggleDescription() {
    const description = document.querySelector('.description');
    const eyeImage = document.querySelector('#eye-image');
    if (description.style.display === "none") {
      description.style.display = "block";
      eyeImage.src = "images/eye-opened.png";
      // remove img at the bottom left corner of the screen
      document.getElementById("closedEye").remove();

    } else {
      description.style.display = "none";
      // keep music playing
      var audio = document.querySelector('audio');
      audio.autoplay = true;

      // create new img at the bottom left corner of the screen
      document.body.innerHTML += '<img src="images/eye-closed.png" id="closedEye" alt="eye-icon" width="80" height="80" style="position: absolute; bottom: 0; left: 0; z-index: 1000" onclick="toggleDescription()">';
      
    }
  }
</script>
  <?php
      // get API key from NASA in .env.txt file
      $key = file_get_contents(".env.txt");
      // get 2nd line of .env.txt file
      $key = explode("\n", $key)[1];

  ?>  
<script>
  // La musique se joue automatiquement à l'arrivée sur le site
  var audio = document.querySelector('audio');
  audio.autoplay = true;

  // Le bouton permet de couper et relancer la musique
  var button = document.querySelector('#music-button');
  button.addEventListener('click', function () {
    if (audio.paused) {
      audio.play();
      this.innerHTML = "Couper la musique";
      // music-button change btn primary to danger
      this.classList.remove("btn-primary");
      this.classList.add("btn-danger");
    } else {
      audio.pause();
      this.innerHTML = "Activer la musique";
      this.classList.add("btn-primary");
      this.classList.remove("btn-danger");
    }
  });

  // Contrôle du volume
  audio.volume = 0.5;
  var volumeControl = document.createElement('input');
  volumeControl.classList.add('volume-control');
  volumeControl.type = 'range';
  volumeControl.min = 0;
  volumeControl.max = 1;
  volumeControl.step = 0.01;
  volumeControl.value = 0.5;
  volumeControl.style.display = 'block';
  volumeControl.addEventListener('input', function () {
    audio.volume = this.value;
  });
  document.querySelector('.description').appendChild(volumeControl);
</script>
<script>
  // get image of the day from NASA
  const key = "<?php echo $key; ?>";
  // put in variable url random from listApiImages
  const url = `https://api.nasa.gov/planetary/apod?api_key=${key}`;
  

  fetch(url)
    .then(response => response.json())
    .then(data => {
      document.querySelector(".full-screen-image").style.backgroundImage = `url(${data.url})`;
      document.querySelector(".description-image-day").innerHTML = data.explanation;
      document.querySelector(".title-image-day").innerHTML = data.title;
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
    countdown.innerHTML = `${hours % 24} heures, ${minutes % 60} minutes, ${seconds % 60} secondes avant la prochaine image du jour`;
    // update countdown every second
    setInterval(() => {
      const date = new Date();
      const nextDay = new Date(date.getFullYear(), date.getMonth(), date.getDate() + 1);
      const timeLeft = nextDay - date;
      const seconds = Math.floor(timeLeft / 1000);
      const minutes = Math.floor(seconds / 60);
      const hours = Math.floor(minutes / 60);
      countdown.innerHTML = `${hours % 24} heures, ${minutes % 60} minutes, ${seconds % 60} secondes avant la prochaine image du jour`;
    }, 1000);

    if (timeLeft < 0) {
      countdown.innerHTML = "0 secondes avant la prochaine image du jour";
      // refresh page
      setTimeout(() => {
        location.reload();
      }, 1000);
    }
  
</script>
</html>