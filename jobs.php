<?php  

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>The Job Hub</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/job.css" rel="stylesheet">

    <!-- UIkit CSS -->
	<link rel="stylesheet" href="vendor/uikit/css/uikit.min.css" />
  </head>

  <body>

    <header>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <strong>The Job Hub</strong>
          </a>

        </div>

      </div>
    </header>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Available Jobs</h1>
          <p class="lead text-muted">We offer a wide variety of jobs that are tailored to fit your skill set in the comfort of your bed.</p>
          <!-- <p>
            <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
          </p> -->
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="images/android.jpg" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Android Developer</p>
                  <p class="card-text">
                  	<ul>
                  		<li>BS CS, EE, CE or equivalent</li>
                  		<li>4-10+ years in developing application software for consumer or industrial devices</li>
                  		<li>2-7 years of Android development: have 1 or more apps in use / on Google Play</li>
                  		<li>Strong CS fundamentals and Android frameworks</li>
                  	</ul>
                    
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                       <div class="js-upload uk-placeholder uk-text-center">
                        <span uk-icon="icon: cloud-upload"></span>
                        <span class="uk-text-middle">Attach your C.V as a pdf document saves as your firstname_lastname_jobapplyingfor.pdf</span>
                        <br>
                         <?php
                        if(isset($_GET['success']))
                        {
                          ?>
                              <label id="label">File Uploaded Successfully... </a></label>
                              <?php
                        }
                        else if(isset($_GET['fail']))
                        {
                          ?>
                              <label>Problem While File Uploading !</label>
                              <?php
                        }
                        else
                        {
                          ?>
                              <label>Please upload a pdf document</label>
                              <?php
                        }
                        ?>
                      </div>
                       <input class="input" type="file" name="file" />
                       <button class="btn btn-dark input-button" type="submit" name="btn-upload">Upload</button>
                    </form>
                    <br /><br />
                   
				        </p>
                 
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="images/reactjs.png" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">React JS Developer</p>
                  <form action="upload.php" method="post" enctype="multipart/form-data">
                       <div class="js-upload uk-placeholder uk-text-center">
                        <span uk-icon="icon: cloud-upload"></span>
                        <span class="uk-text-middle">Attach your C.V as a pdf document saves as your firstname_lastname_jobapplyingfor.pdf</span>
                        <br>
                         <?php
                        if(isset($_GET['success']))
                        {
                          ?>
                              <label id="label">File Uploaded Successfully... </a></label>
                              <?php
                        }
                        else if(isset($_GET['fail']))
                        {
                          ?>
                              <label>Problem While File Uploading !</label>
                              <?php
                        }
                        else
                        {
                          ?>
                              <label>Please upload a pdf document</label>
                              <?php
                        }
                        ?>
                      </div>
                       <input class="input" type="file" name="file" />
                       <button class="btn btn-dark input-button" type="submit" name="btn-upload">Upload</button>
                    </form>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                   <!--  <small class="text-muted">9 mins</small> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="images/php.png" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">PHP Developer.</p>
                  <form action="upload.php" method="post" enctype="multipart/form-data">
                       <div class="js-upload uk-placeholder uk-text-center">
                        <span uk-icon="icon: cloud-upload"></span>
                        <span class="uk-text-middle">Attach your C.V as a pdf document saves as your firstname_lastname_jobapplyingfor.pdf</span>
                        <br>
                         <?php
                        if(isset($_GET['success']))
                        {
                          ?>
                              <label id="label">File Uploaded Successfully... </a></label>
                              <?php
                        }
                        else if(isset($_GET['fail']))
                        {
                          ?>
                              <label>Problem While File Uploading !</label>
                              <?php
                        }
                        else
                        {
                          ?>
                              <label>Please upload a pdf document</label>
                              <?php
                        }
                        ?>
                      </div>
                       <input class="input" type="file" name="file" />
                       <button class="btn btn-dark input-button" type="submit" name="btn-upload">Upload</button>
                
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="images/angulajsdev.jpg" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Angular JS Developer</p>
                  <form action="upload.php" method="post" enctype="multipart/form-data">
                       <div class="js-upload uk-placeholder uk-text-center">
                        <span uk-icon="icon: cloud-upload"></span>
                        <span class="uk-text-middle">Attach your C.V as a pdf document saves as your firstname_lastname_jobapplyingfor.pdf</span>
                        <br>
                         <?php
                        if(isset($_GET['success']))
                        {
                          ?>
                              <label id="label">File Uploaded Successfully... </a></label>
                              <?php
                        }
                        else if(isset($_GET['fail']))
                        {
                          ?>
                              <label>Problem While File Uploading !</label>
                              <?php
                        }
                        else
                        {
                          ?>
                              <label>Please upload a pdf document</label>
                              <?php
                        }
                        ?>
                      </div>
                       <input class="input" type="file" name="file" />
                       <button class="btn btn-dark input-button" type="submit" name="btn-upload">Upload</button>
                    </form>
                  <div class="d-flex justify-content-between align-items-center">
                   
                   <!--  <small class="text-muted">9 mins</small> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="images/laravel.jpg" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Laravel Developer.</p>
                  <form action="upload.php" method="post" enctype="multipart/form-data">
                       <div class="js-upload uk-placeholder uk-text-center">
                        <span uk-icon="icon: cloud-upload"></span>
                        <span class="uk-text-middle">Attach your C.V as a pdf document saves as your firstname_lastname_jobapplyingfor.pdf</span>
                        <br>
                         <?php
                        if(isset($_GET['success']))
                        {
                          ?>
                              <label id="label">File Uploaded Successfully... </a></label>
                              <?php
                        }
                        else if(isset($_GET['fail']))
                        {
                          ?>
                              <label>Problem While File Uploading !</label>
                              <?php
                        }
                        else
                        {
                          ?>
                              <label>Please upload a pdf document</label>
                              <?php
                        }
                        ?>
                      </div>
                       <input class="input" type="file" name="file" />
                       <button class="btn btn-dark input-button" type="submit" name="btn-upload">Upload</button>
                    </form>
                  <div class="d-flex justify-content-between align-items-center">
                   
                   <!--  <small class="text-muted">9 mins</small> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="images/ui.jpg" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">UI/UX Developer</p>
                  <form action="upload.php" method="post" enctype="multipart/form-data">
                       <div class="js-upload uk-placeholder uk-text-center">
                        <span uk-icon="icon: cloud-upload"></span>
                        <span class="uk-text-middle">Attach your C.V as a pdf document saves as your firstname_lastname_jobapplyingfor.pdf</span>
                        <br>
                         <?php
                        if(isset($_GET['success']))
                        {
                          ?>
                              <label id="label">File Uploaded Successfully... </a></label>
                              <?php
                        }
                        else if(isset($_GET['fail']))
                        {
                          ?>
                              <label>Problem While File Uploading !</label>
                              <?php
                        }
                        else
                        {
                          ?>
                              <label>Please upload a pdf document</label>
                              <?php
                        }
                        ?>
                      </div>
                       <input class="input" type="file" name="file" />
                       <button class="btn btn-dark input-button" type="submit" name="btn-upload">Upload</button>
                    </form>

                  
                </div>
              </div>
            </div>
        </div>
      </div>

    </main>

    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Back to top</a>
        </p>
        <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/vendor/holder.min.js"></script>
    <!-- UIkit JS -->
	<script src="vendor/uikit/js/uikit.min.js"></script>
	<script src="vendor/uikit/js/uikit-icons.min.js"></script>
  </body>
</html>
