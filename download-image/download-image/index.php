<?php 
  if(isset($_POST["downloadBtn"])) {
    // Getting the user img url from input field
    $imgURL = $_POST["file"];
    $regPattern = "/\.(jpe?g|png|gif|bmp)$/i";
    if(preg_match($regPattern , $imgURL)) {
      $initCURL = curl_init($imgURL);
      curl_setopt($initCURL , CURLOPT_RETURNTRANSFER , true);
      $download = curl_exec($initCURL);
      curl_close($initCURL);
      // convert the base  64 format to jpg to download
      header("Content-type: image/jpg");
      header("Content-Disposition: attachment;filename=image.jpg");
      echo $download;
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Download Image with URL</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="wrapper">
      <div class="preview-box">
        <div class="cancle-img">
          <i class="fa fa-times"></i>
        </div>
        <div class="img-preview"></div>
        <div class="content">
          <div class="img-icon">
            <i class="fa fa-image"></i>
          </div>
          <div class="text">
            Paste the image url below , <br />
            To see a preview or download !
          </div>
        </div>
      </div>
      <form action="#" method="POST" class="input-data">
        <input
          type="text"
          id="field"
          name="file"
          placeholder="Paste the url to download image"
        />
        <input type="submit" name="downloadBtn" id="button" value="download" />
      </form>
    </div>
    <script src="./script.js"></script>
  </body>
</html>
