<?php  if (count($errors) > 0) : ?>

    <?php foreach ($errors as $error) : ?>
		<div style="color: #D63301;
			font-size: 1em;
			margin: 5px;
			border: 1px solid;
			border-radius: 6px;
			padding-left: 5px;
			background-repeat: no-repeat;
			background-position: 10px center;
			background-color: #FFCCBA;"><?php echo $error ?></div>
  	<?php endforeach ?>
<?php  endif ?>