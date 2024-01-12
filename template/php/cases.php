<?php
$mysql = new mysqli('localhost', 'root', '', ''); 
$result = $mysql->query("SELECT * FROM `cases`". 'ORDER BY id ASC ');

$casesCount = -1;
$i = 0;
while ($row = $result->fetch_assoc()) {
	$cases[$i]['id'] = $row['id'];
	$cases[$i]['name'] = ($row['name']);
	$casesCount++;
	$i++;
};

function imgPrew($id, $a) {
	
	$mysql = new mysqli('localhost', 'root', '', ''); 
	$result = $mysql->query("SELECT * FROM `cases` WHERE `cases`.`id` = $id");
	$case = $result->fetch_assoc();
	
	$x = '
		<div class="caseBlock">
			<div class="cases_img">
				<img src="/'.$case["prewIMG"].'" class="cases_imgS" onclick="open_o('.$a.')">
			</div>
			<p class="caseText" onclick="open_o('.$a.')">'.$case["name"].'</p>
		</div>
	';
	
	return $x;
};

function caseSlide($id, $a) {
	
	$mysql = new mysqli('localhost', 'root', '', ''); 
	$result = $mysql->query("SELECT * FROM `cases` WHERE `cases`.`id` = $id");
	$case = $result->fetch_assoc();
	
	$x = '
		<div class="swiper-slide">
			<div class="workSlider">
				<div class="workSliderContent">
					<div class="workZone">
						<h1 class="workTitle">'.$case["name"].'</h1>
						<h2 class="workTitleS">About</h2>
						<p class="workText">
							'.$case["text"].'
						</p>
						<div class="workIMGs">

						</div>
					</div>
					<div class="workZone2">
						<img src="/'.$case["mainIMG"].'" class="workIMGmain" onclick="">
					</div>
				</div>
			</div>
		</div>
	';
	
	return $x;
};

function caseBlock($id, $a) {
	
	$mysql = new mysqli('localhost', 'root', 'Alex143325.', 'artbloggers'); 
	$result = $mysql->query("SELECT * FROM `cases` WHERE `cases`.`id` = $id");
	$case = $result->fetch_assoc();
	
	$x = '
		<div class="WorkBlock">
			<h1 class="WorkTitle">'.$case["name"].'</h1>
			<img src="/'.$case["mainIMG"].'" class="workIMGmain" onclick="">
			<h2 class="workTitleS">About</h2>
			<p class="workText">
				'.$case["text"].'
			</p>
		 </div>
	';
	
	return $x;
};

$caseInput1 = '';
$caseInput2 = '';
$caseInput3 = '';
$caseInput4 = '';

if($casesCount != -1):?>

<?php

$a = 0;
while($a <= $casesCount) {
	
	$caseInput1 = $caseInput1.imgPrew($cases[$a]['id'], $a);
	
	$a++;
	$a++;
};

$a = 1;
while($a <= $casesCount) {
	
	$caseInput2 = $caseInput2.imgPrew($cases[$a]['id'], $a);
	
	$a++;
	$a++;
};

$a = 0;
while($a <= $casesCount) {
	
	$caseInput3 = $caseInput3.caseSlide($cases[$a]['id'], $a);
	
	$a++;
};

$a = 0;
while($a <= $casesCount) {
	
	$caseInput4 = $caseInput4.caseBlock($cases[$a]['id'], $a);
	
	$a++;
};

$caseInput4 = $caseInput4.'<div style="height: 50px"></div>'

?>

<div class="ZoneLeft " id="">
	<div class="" id="Case"></div>
	<p class="TitleLeft" >Cases</p>
	<div class="SubZone SZmob">
		<?php if($casesCount >= 0): ?>
		<div class="colum1">
			<?php echo($caseInput1) ?>
		</div>
		<?php if($casesCount >= 1): ?>
		<div class="colum1 mt128">
			<?php echo($caseInput2) ?>
		</div>
		<?php endif; ?>
		<?php endif; ?>
	</div>
	<div class="btn_d" onclick="location.href='/upload/artbloggers.pdf'" style="margin-top: 55px;"><canvas id="gradient-canvas4" data-transition-in></canvas><p class="btn_text_d">See more cases</p></div>
</div>


        
<div class="worksPage" id="worksPage"> 
	<div class="worksContent none">
		<div class="worckHeadder">
			<img src="/template/img/close.svg" class="workBtnBack" onclick="close_o()">
		</div>
		<div class="swiper swiper3">
		  <!-- Additional required wrapper -->
		  <div class="swiper-wrapper">
			<!-- Slides -->
			<?php echo($caseInput3) ?>
		  </div>

		  <!-- If we need navigation buttons -->
		  <img src="/template/img/prev.svg" id="sbPrew1" class="workBtnPrev">
		  <img src="/template/img/next.svg" id="sbNext1" class="workBtnNext">
		</div>
	</div>
	<div class="MobWorkContent n">
		<div class="mobHead">
			<img src="/template/img/close.svg" class="workBtnBack" onclick="close_o()">
		</div>
		<div class="MobWork">
			<?php echo($caseInput4) ?>
		</div>
	</div>
</div>


<?php endif; ?>