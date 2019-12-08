<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Architects+Daughter|Roboto&subset=latin,devanagari">

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>


	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>

	<style type="text/css">
		body {
  display: flex;
  min-height: 100vh;
  flex-direction: column;
} 

main {
  flex: 1 0 auto;
}

h1.title,
.footer-copyright a {
  font-family: 'Architects Daughter', cursive;
  text-transform: uppercase;
  font-weight: 900;
}

/* start welcome animation */

body.welcome {
  background: #512da8;
  overflow: hidden;
  -webkit-font-smoothing: antialiased;
}

.welcome .splash {
  height: 0px;
  padding: 0px;
  border: 130em solid #039be5;
  position: fixed;
  left: 50%;
  top: 100%;
  display: block;
  box-sizing: initial;
  overflow: hidden;

  border-radius: 50%;
  transform: translate(-50%, -50%);
  animation: puff 0.5s 1.8s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards, borderRadius 0.2s 2.3s linear forwards;
}

.welcome #welcome {
  background: #311b92 ;
  width: 56px;
  height: 56px;
  position: absolute;
  left: 50%;
  top: 50%;
  overflow: hidden;
  opacity: 0;
  transform: translate(-50%, -50%);
  border-radius: 50%;
  animation: init 0.5s 0.2s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards, moveDown 1s 0.8s cubic-bezier(0.6, -0.28, 0.735, 0.045) forwards, moveUp 1s 1.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards, materia 0.5s 2.7s cubic-bezier(0.86, 0, 0.07, 1) forwards, hide 2s 2.9s ease forwards;
}
   
/* moveIn */
.welcome header,
.welcome a.btn {
  opacity: 0;
  animation: moveIn 2s 3.1s ease forwards;
}

@keyframes init {
  0% {
    width: 0px;
    height: 0px;
  }
  100% {
    width: 56px;
    height: 56px;
    margin-top: 0px;
    opacity: 1;
  }
}

@keyframes puff {
  0% {
    top: 100%;
    height: 0px;
    padding: 0px;
  }
  100% {
    top: 50%;
    height: 100%;
    padding: 0px 100%;
  }
}

@keyframes borderRadius {
  0% {
    border-radius: 50%;
  }
  100% {
    border-radius: 0px;
  }
}

@keyframes moveDown {
  0% {
    top: 50%;
  }
  50% {
    top: 40%;
  }
  100% {
    top: 100%;
  }
}

@keyframes moveUp {
  0% {
    background: #311b92;
    top: 100%;
  }
  50% {
    top: 40%;
  }
  100% {
    top: 50%;
    background: #039be5;
  }
}

@keyframes materia {
  0% {
    background: #039be5;
  }
  50% {
    background: #039be5;
    top: 26px;
  }
  100% {
    background: #311b92;
    width: 100%;
    height: 64px;
    border-radius: 0px;
    top: 26px;
  }
}

@keyframes moveIn {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

@keyframes hide {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
} 
	</style>
</head>
<body class="welcome">
  <span id="splash-overlay" class="splash"></span>
  <span id="welcome" class="z-depth-4"></span>
 
  <header class="navbar-fixed"> 
    <nav class="row deep-purple darken-3">
      <div class="col s12">
        <ul class="center-align">
          <li class="center-align">
            <a href="" target="_blank" class="fa fa-facebook-square fa-2x waves-effect waves-light"><span class="icon-text"></span></a>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>

  <main class="valign-wrapper">
    <span class="container grey-text text-lighten-1 ">

      <p class="flow-text">Welcome to</p>
      <h1 class="title grey-text text-lighten-3">jason's classroom</h1>

      <blockquote class="flow-text">A place to study for your High School Equivalency Diploma</blockquote>

      <div class="center-align">
        <!-- Dropdown Trigger -->
        <a class="btn dropdown-button" href="" data-activates="exams">hse exams<i class="material-icons right">expand_more</i></a>

        <!-- Dropdown Structure -->
        <ul id="exams" class="dropdown-content">
          <li><a href="#!">GED&trade; Exam</a></li>
          <li><a href="#!">HiSET&trade; Exam</a></li>
          <li><a href="#!">TASC&trade; Exam</a></li>
        </ul>
        <!-- Dropdown Trigger -->
        <a class="btn dropdown-button" href="" data-activates="study">study<i class="material-icons right">expand_more</i></a>

        <!-- Dropdown Structure -->
        <ul id="study" class="dropdown-content">
          <li><a href="#!">mathematics</a></li>
          <li><a href="#!">reading</a></li>
          <li><a href="#!">science</a></li>
          <li><a href="#!">social studies</a></li>
          <li><a href="#!">writing</a></li>
        </ul>
      </div>

    </span>
  </main>

  <div class="fixed-action-btn">
    <a href="#message" class="modal-trigger btn btn-large btn-floating amber waves-effect waves-light">
      <i class="large material-icons">message</i>
    </a>
  </div>

  <div id="message" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Contact</h4>
      <p>coming soon...</p>
    </div>
    <div class="modal-footer">
      <a href="" class="modal-action modal-close waves-effect btn-flat">close</a>
    </div> 
  </div> 

  <footer class="page-footer deep-purple darken-3">
    <div class="footer-copyright deep-purple darken-4">
      <div class="container">
        <time datetime="{{ site.time | date: '%Y' }}">&copy; 2016 Jason</time>
      </div>
    </div>
  </footer>
</body>
</html>