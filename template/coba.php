<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>


<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
</head>

<body>

<div class="container">
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
    <?php if ($_POST['submit'] == 'SAVE') {?>
    	BERHASIL SAVE
    <h2><?php// if(isset($_POST['title'])) echo $_POST['title']; ?></h2>
        <p><?php //if(isset($_POST['content'])) echo $_POST['content'];
		} else if($_POST['submit'] == 'SAVE & PUBLISH') {?></p>
        BERHASIL SAVE dan PUBLISH
    	<h2><?php //if(isset($_POST['title'])) echo $_POST['title']; ?></h2>
        <p><?php //if(isset($_POST['content'])) echo $_POST['content'];
		}?>
    <?php $response = "ini coba $_POST[title]"; echo $response; ?>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>


</body>
</html>
