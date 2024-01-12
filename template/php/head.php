<?php
$mysql = new mysqli('localhost', 'root', '', ''); 
$result = $mysql->query("SELECT * FROM `header`". 'ORDER BY id ASC ');


$headCount = 0;
$i = 1;
while ($row = $result->fetch_assoc()) {
	$header[$i]['id'] = $row['id'];
	$header[$i]['text'] = ($row['text']);
	$headCount++;
	$i++;
};

function headIMG($id) {
	
	$mysql = new mysqli('localhost', 'root', '', ''); 
	$result = $mysql->query("SELECT * FROM `header` WHERE `header`.`id` = $id");
	$head = $result->fetch_assoc();
	
	$x = '
		<div class="swiper-slide"><img src="/'.$head["img"].'" class="sliderIMG" onclick="open_o('.$head["path"].')"><p class="headText" onclick="open_o('.$head["path"].')">'.$head["text"].'</p> </div>
	';
	
	return $x;
	
};


if($headCount != 0):?>

<?php

$input = '';

$a = 1;
while($a <= $headCount) {
	
	$input = $input.headIMG($header[$a]['id']);
	
	$a++;
};

?>
	

		
<div class="img_content">
	<div class="swiper swiper1">
	  <div class="swiper-wrapper">
		<?php echo($input) ?>
	  </div>
	</div>
</div>


<?php endif; ?>