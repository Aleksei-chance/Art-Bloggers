<?php
$mysql = new mysqli('localhost', 'root', '********', '********'); 
$result = $mysql->query("SELECT * FROM `advantages`". 'ORDER BY id ASC ');

$i = 1;
while ($row = $result->fetch_assoc()) {
	$advantages[$i]['id'] = $row['id'];
	$advantages[$i]['name'] = ($row['name']);
	$advantages[$i]['value'] = ($row['value']);
	$i++;
};

?>


<div class="ZoneLeft Zone80">
	<div class="" id="OurAdvantages"></div>
	<p class="TitleLeft" id="">Our advantages</p>
	<div class="SubZoneCenter">
		<div class="SubZoneCenterS">
			<div class="AdvantBlock">
				<img src="/artbloggers/img/new_design/oa1.svg" class="demo2">
				<p class="numbers"><?php echo($advantages[1]['value']) ?></p>
				<p class="text4"><?php echo($advantages[1]['name']) ?></p>
			</div>
			<div class="AdvantBlock">
				<img src="/artbloggers/img/new_design/oa2.svg" class="demo2">
				<p class="numbers"><?php echo($advantages[2]['value']) ?></p>
				<p class="text4"><?php echo($advantages[2]['name']) ?></p>
			</div>
		</div>
		<div class="SubZoneCenterS">
			<div class="AdvantBlock">
				<img src="/artbloggers/img/new_design/oa3.svg" class="demo2">
				<p class="numbers"><?php echo($advantages[3]['value']) ?></p>
				<p class="text4"><?php echo($advantages[3]['name']) ?></p>
			</div>
			<div class="AdvantBlock">
				<img src="/artbloggers/img/new_design/oa4.svg" class="demo2">
				<p class="numbers"><?php echo($advantages[4]['value']) ?></p>
				<p class="text4"><?php echo($advantages[4]['name']) ?></p>
			</div>
		</div>

	</div>
</div>