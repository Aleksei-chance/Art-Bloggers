<?php
$mysql = new mysqli('localhost', 'root', '', ''); 
$result = $mysql->query("SELECT * FROM `bloggers`". 'ORDER BY id ASC ');
	
	
$bloggersCount = 0;
$i = 1;
while ($row = $result->fetch_assoc()) {
	$bloggers[$i]['id'] = $row['id'];
	$bloggers[$i]['name'] = ($row['name']);
	$bloggersCount++;
	$i++;
};

function loadPageFull($one, $two, $three) {
	
	$x = '<div class="swiper-slide">
			<div class="talentsSlide">';
	
	$x = $x.talentBlock($one);
	$x = $x.talentBlock($two);
	$x = $x.talentBlock($three);
	
	$x = $x.'
		</div>
	</div>
	';
	
	return $x;
};
function loadPageTwo($one, $two) {
	
	$x = '<div class="swiper-slide">
			<div class="talentsSlide">';
	
	$x = $x.talentBlock($one);
	$x = $x.talentBlock($two);
	
	$x = $x.'
		</div>
	</div>
	';
	
	return $x;
};
function loadPageOne($one) {
	
	$x = '<div class="swiper-slide">
			<div class="talentsSlide">';
	
	$x = $x.talentBlock($one);
	
	$x = $x.'
		</div>
	</div>
	';
	
	return $x;
};

function talentBlock($id) {
	
	$mysql = new mysqli('localhost', 'root', '', ''); 
	$result = $mysql->query("SELECT * FROM `bloggers` WHERE `bloggers`.`id` = $id");
	$blogger = $result->fetch_assoc();
	
	$x = '
		<div class="talentBlock">
			<img src="/'.$blogger["img"].'" class="talentIMG">
			<div class="talentTitles">
				<p class="talentTitle">'.$blogger["name"].'</p>
				<p class="talentCount">'.$blogger["count"].'</p>
			</div>
			<p class="talentText">'.$blogger["text"].'</p>
			<div class="talantBtnsZone">
				<img src="/artbloggers/img/new_design/insta_new_color.svg" class="talantBTN" onclick="location.href='."'".$blogger["link"]."'".'">
			</div>
		</div>
	';
	
	return $x;
};

function loadPageMob($id) {
	
	$mysql = new mysqli('localhost', 'root', '', ''); 
	$result = $mysql->query("SELECT * FROM `bloggers` WHERE `bloggers`.`id` = $id");
	$blogger = $result->fetch_assoc();
	
	$x = '
	
		<div class="swiper-slide">
			<div class="talentsSlide">
				<div class="talentBlock">
					<img src="/'.$blogger["img"].'" class="talentIMG">
					<div class="talentTitles">
						<p class="talentTitle">'.$blogger["name"].'</p>
						<p class="talentCount">'.$blogger["count"].'</p>
					</div>
					<p class="talentText">'.$blogger["text"].'</p>
					<div class="talantBtnsZone">
						<img src="/artbloggers/img/new_design/insta_new_color.svg" class="talantBTN" onclick="location.href='."'".$blogger["link"]."'".'">
					</div>
				</div>
			</div>
		</div>
	';
	
	return $x;
};

if($bloggersCount != 0):?>

<?php

$pages = intdiv($bloggersCount , 3);

$dop = $bloggersCount % 3;

$input = '';

$a = 1;
$b = 1;
while($a <= $pages) {
	
	$input = $input.loadPageFull($bloggers[$b]['id'], $bloggers[$b + 1]['id'], $bloggers[$b + 2]['id']);
	
	
	$a++;
	$b = $b + 3;
};


if($dop == 1) {
	$input = $input.loadPageOne($bloggers[$b]['id']);
};
if($dop == 2) {
	$input = $input.loadPageTwo($bloggers[$b]['id'], $bloggers[$b + 1]['id']);
};

$inputMob = '';

$a = 1;
while($a <= $bloggersCount) {
	
	$inputMob = $inputMob.loadPageMob($bloggers[$a]['id']);
	
	
	$a++;
};


?>


<div class="ZoneLeft MobLeft">
	<div class="" id="Talents"></div>
	<p class="TitleLeft" id="">Talents</p>
	<p class="TextLeft">Our portfolio of talents includes 88 well-known artists, photographers, videographers, NFT creators, illustrators, calligraphers, stylists, creative makeup artists and ect</p>

	<div class="swiper swiper2 none">
		<!-- Additional required wrapper -->
	  <div class="swiper-wrapper">
		<!-- Slides -->
		<?php echo($input); ?>
	  </div>

	  <!-- If we need navigation buttons -->
	  <div class="swiper-button-prev" id="sbPrew"></div>
	  <div class="swiper-button-next" id="sbNext"></div> 

	  <!-- If we need scrollbar -->
	  <div class="swiper-scrollbar scrollbar1" id="" style="width: 131px; left: 50%; transform: translate(-50%, 0);"></div>
	</div>

	<div class="swiper swiper5 n">
		<!-- Additional required wrapper -->
	  <div class="swiper-wrapper">
		<!-- Slides -->
		<?php echo($inputMob); ?>
	  </div>

	  <!-- If we need navigation buttons -->
	  <img src="/template/img/prev.svg" id="sbPrew5" class="bloggersPrev">
	  <img src="/template/img/next.svg" id="sbNext5" class="bloggersNext">

	  <!-- If we need scrollbar -->
	  <div class="swiper-scrollbar scrollbar5" id="scrollbar5" style="width: 131px; left: 50%; transform: translate(-50%, 0); bottom: 67px;"></div>
	</div>
</div>
	
<?php endif;?>