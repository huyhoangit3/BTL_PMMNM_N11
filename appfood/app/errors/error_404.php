<!DOCTYPE html>
<html><head>
        <title><?php echo $heading; ?></title>
        <meta charset="utf-8">
        <base href="<?=CMS_URL?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="template/error/assets/css/style.css">

        <!-- JQUERY LIBRARY LINKS -->
        

<script type="text/javascript">
  document.write=function() {};
  document.writeln=function() {};
</script>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="col-md-6 col-sm-6 imgSec">
                <div class="icon">
                    <div class="victor"></div>
                    <div class="animation"></div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 content">
                <h2 class="heading">OOPS!</h2>
                <p>I THINK I AM LOST</p>
                <p><small><?php echo $message; ?></small></p>
                <a href="/" class="button"> Back to home</a>
            </div>
        </div>
    
 </body></html>


