<?php

// 1. Общие настройки
ini_set('display_errors',1);
error_reporting(E_ALL);

function addBloggerBtn() {
	$x = '<button onclick="openAddBlogger()" class="btnBig">Add blogger</button><br>';
	
	return $x;
};

function addHeaderBtn() {
	$x = '<button onclick="openAddHeader()" class="btnBig">Add header</button><br>';
	
	return $x;
};

function addCaseBtn() {
	$x = '<button onclick="openAddCase()" class="btnBig">Add case</button><br>';
	
	return $x;
};

function addBloggerPage() {
	$x = '
		<input type="file" id="img"><br>
		<input type="text" class="input" placeholder="name" id="name"><br>
		<input type="text" class="input" placeholder="count" id="count"><br>
		<textarea name="" cols="30" rows="10" id="text"></textarea><br>
		<input type="text" class="input" placeholder="link" id="link"><br>
		<button onclick="addBloger()" class="btnBig">Add</button> 
	';
	
	return $x;
};

function addBloggerPageValue() {
	
	$mysql = new mysqli('localhost', 'root', '', ''); 
	
	$id = filter_var(trim($_POST['id']), FILTER_SANITIZE_STRING);
	
	$result = $mysql->query("SELECT * FROM `bloggers` WHERE `bloggers`.`id` = $id");
	$blogger = $result->fetch_assoc();
	
	$img = $blogger["img"];
	$name = $blogger["name"];
	$count = $blogger["count"];
	$text = $blogger["text"];
	$link = $blogger["link"];
	
	$x = '
		<p>If need to be changed:</p><br>
		<input type="file" id="img"><br>
		<input type="text" class="input" placeholder="name" id="name" value="'.$name.'"><br>
		<input type="text" class="input" placeholder="count" id="count" value="'.$count.'"><br>
		<textarea name="" id="text">'.$text.'</textarea value="'.$text.'"><br>
		<input type="text" class="input" placeholder="link" id="link" value="'.$link.'"><br>
		<button onclick="changeBloger('."'".$id."'".')" class="btnBig">Save</button> 
	';
	
	return $x;
};

function addCasePageValue() {
	
	$mysql = new mysqli('localhost', 'root', '', ''); 
	
	$id = filter_var(trim($_POST['id']), FILTER_SANITIZE_STRING);
	
	$result = $mysql->query("SELECT * FROM `cases` WHERE `cases`.`id` = $id");
	$Header = $result->fetch_assoc();
	
	$img = $Header["prewIMG"];
	$img2 = $Header["mainIMG"];
	$name = $Header["name"];
	$text = $Header["text"];
	
	$x = '
		<p>Pre. If need to be changed:</p><br>
		<input type="file" class="" id="imgPrew"><br>
		<p>Main. If need to be changed:</p><br>
		<input type="file" class="" id="img"><br>
		<input type="text" class="input" placeholder="name" id="name" value="'.$name.'"><br>
		<textarea name="" cols="30" rows="10" id="text">'.$text.'</textarea><br>
		<button onclick="changeCase('."'".$id."'".')" class="btnBig">Save</button> 
	';
	
	return $x;
};

function addCasePage() {
	$x = '
		<p>Pre</p><br>
		<input type="file" class="" id="imgPrew"><br>
		<p>Main</p><br>
		<input type="file" class="" id="img"><br>
		<input type="text" class="input" placeholder="name" id="name"><br>
		<textarea name="" cols="30" rows="10" id="text"></textarea><br>
		<button onclick="addCase()" class="btnBig">Add</button> 
	';
	
	return $x;
};

function addHeaderPageValue() {
	
	$mysql = new mysqli('localhost', 'root', '', ''); 
	
	$result = $mysql->query("SELECT * FROM `cases`". 'ORDER BY id ASC ');
	$caseCount = 0;
	
	$i = 1;
	while ($row = $result->fetch_assoc()) {
		$case[$i]['id'] = $row['id'];
		$case[$i]['name'] = ($row['name']);
		$caseCount++;
		$i++;
	};
	
	$input = '';
	$x = '';
	
	if($caseCount != 0) {
		
		$i = 1;
		while($i <= $caseCount) {
			
			$input = $input.'<option value="'.$case[$i]['id'].'">'.$case[$i]['name'].'</option>';
			
			$i++;
		};
		
		$id = filter_var(trim($_POST['id']), FILTER_SANITIZE_STRING);
		
	
		$x = '
			<input type="file" id="img"><br>
			<select name="cases" id="cases">
				<option value="">Select case</option>
				'.$input.'
			</select><br>
			<button onclick="changeHeadder('."'".$id."'".')" class="btnBig">Save</button> 
		';
	} else {
		$x = "<p>Error</p>";
	};
	
	
	
	return $x;
};

function addHeaderPage() {
	
	$mysql = new mysqli('localhost', 'root', '', ''); 
	
	$result = $mysql->query("SELECT * FROM `cases`". 'ORDER BY id ASC ');
	$caseCount = 0;
	
	$i = 1;
	while ($row = $result->fetch_assoc()) {
		$case[$i]['id'] = $row['id'];
		$case[$i]['name'] = ($row['name']);
		$caseCount++;
		$i++;
	};
	
	$input = '';
	$x = '';
	
	if($caseCount != 0) {
		
		$i = 1;
		while($i <= $caseCount) {
			
			$input = $input.'<option value="'.$case[$i]['id'].'">'.$case[$i]['name'].'</option>';
			
			$i++;
		};
		
	
		$x = '
			<input type="file" id="img"><br>
			<select name="cases" id="cases">
				<option value="">Select case</option>
				'.$input.'
			</select><br>
			<button onclick="addHeadder()" class="btnBig">Add</button> 
		';
	} else {
		$x = "<p>Error</p>";
	};
	
	
	
	return $x;
};

function blogger($id, $name) {
	$x = '<button class="btnBig" onclick="openBlogger('."'$id'".', '."'$name'".')">'.$name.'</button><br> ';
	
	return $x;
};

function Headerr($id, $text) {
	$x = '<button class="btnBig" onclick="openheader('."'$id'".', '."'$text'".')">'.$text.'</button><br> ';
	
	return $x;
};

function Cases($id, $name) {
	$x = '<button class="btnBig" onclick="openCase('."'$id'".', '."'$name'".')">'.$name.'</button><br> ';
	
	return $x;
};

$type = filter_var(trim($_POST['type']), FILTER_SANITIZE_STRING);

$mysql = new mysqli('localhost', 'root', '', ''); 

$arr = [];

if($type == 'bloggers') {
	$arr["status"] = "succes";
	$arr["input"] = "";
	
	$result = $mysql->query("SELECT * FROM `bloggers`". 'ORDER BY id ASC ');
	
	
	$bloggersCount = 0;
	$i = 1;
	while ($row = $result->fetch_assoc()) {
		$bloggers[$i]['id'] = $row['id'];
		$bloggers[$i]['name'] = ($row['name']);
		$bloggersCount++;
		$i++;
	};
	
	if($bloggersCount != 0) {
		
		$arr["count"] = $bloggersCount;
		
		$i = 1;
		while($i <= $bloggersCount) {
			$id = $bloggers[$i]['id'];
			$name = $bloggers[$i]['name'];
			
			$in = blogger($id, $name);
			
			$a = $arr["input"].$in;
			
			$arr["input"] = $a;
			
			$i++;
		};
		
		$in = addBloggerBtn();
		$a = $arr["input"].$in;
			
		$arr["input"] = $a;
		
	} else {
		$arr["count"] = 0;
		
		$in = addBloggerBtn();
		
		$arr["input"] = $in;
	};
} 
elseif($type == 'header') {
	$arr["status"] = "succes";
	$arr["input"] = "";
	
	$result = $mysql->query("SELECT * FROM `header`". 'ORDER BY id ASC ');
	
	
	$headerCount = 0;
	$i = 1;
	while ($row = $result->fetch_assoc()) {
		$header[$i]['id'] = $row['id'];
		$header[$i]['text'] = ($row['text']);
		$headerCount++;
		$i++;
	};
	
	if($headerCount != 0) {
		
		$arr["count"] = $headerCount;
		
		$i = 1;
		while($i <= $headerCount) {
			$id = $header[$i]['id'];
			$text = $header[$i]['text'];
			
			$in = Headerr($id, $text);
			
			$a = $arr["input"].$in;
			
			$arr["input"] = $a;
			
			$i++;
		};
		
		$in = addHeaderBtn();
		$a = $arr["input"].$in;
			
		$arr["input"] = $a;
		
	} else {
		$arr["count"] = 0;
		
		$in = addHeaderBtn();
		
		$arr["input"] = $in;
	};
} 
elseif($type == 'cases') {
	$arr["status"] = "succes";
	$arr["input"] = "";
	
	$result = $mysql->query("SELECT * FROM `cases`". 'ORDER BY id ASC ');
	
	
	$CaseCount = 0;
	$i = 1;
	while ($row = $result->fetch_assoc()) {
		$cases[$i]['id'] = $row['id'];
		$cases[$i]['name'] = ($row['name']);
		$CaseCount++;
		$i++;
	};
	
	if($CaseCount != 0) {
		
		$arr["count"] = $CaseCount;
		
		$i = 1;
		while($i <= $CaseCount) {
			$id = $cases[$i]['id'];
			$name = $cases[$i]['name'];
			
			$in = Cases($id, $name);
			
			$a = $arr["input"].$in;
			
			$arr["input"] = $a;
			
			$i++;
		};
		
		$in = addCaseBtn();
		$a = $arr["input"].$in;
			
		$arr["input"] = $a;
		
	} else {
		$arr["count"] = 0;
		
		$in = addCaseBtn();
		
		$arr["input"] = $in;
	};
} 
elseif($type == 'advantages') {
	$arr["status"] = "succes";
	$arr["input"] = "";
	
	$result = $mysql->query("SELECT * FROM `advantages`". 'ORDER BY id ASC ');
	
	
	$valueCount = 0;
	$i = 1;
	while ($row = $result->fetch_assoc()) {
		$advantages[$i]['id'] = $row['id'];
		$advantages[$i]['name'] = ($row['name']);
		$advantages[$i]['value'] = ($row['value']);
		$valueCount++;
		$i++;
	};
		
	$arr["count"] = $valueCount;


	$arr["input"] = '
		<p>'.$advantages[1]['name'].': '.$advantages[1]['value'].'</p><br>
		<p>'.$advantages[2]['name'].': '.$advantages[2]['value'].'</p><br>
		<p>'.$advantages[3]['name'].': '.$advantages[3]['value'].'</p><br>
		<p>'.$advantages[4]['name'].': '.$advantages[4]['value'].'</p><br>
		<button onclick="editAdvantages()" class="btn">Edit</button><br>
	';
} 
elseif($type == 'editAdvantages') {
	$arr["status"] = "succes";
	$arr["input"] = "";
	
	$result = $mysql->query("SELECT * FROM `advantages`". 'ORDER BY id ASC ');
	
	
	$valueCount = 0;
	$i = 1;
	while ($row = $result->fetch_assoc()) {
		$advantages[$i]['id'] = $row['id'];
		$advantages[$i]['name'] = ($row['name']);
		$advantages[$i]['value'] = ($row['value']);
		$valueCount++;
		$i++;
	};
		
	$arr["count"] = $valueCount;


	$arr["input"] = '
		<p>'.$advantages[1]['name'].': </p><br>
		<input type="text" class="input" placeholder="value" id="1" value="'.$advantages[1]['value'].'"><br>
		<p>'.$advantages[2]['name'].':</p><br>
		<input type="text" class="input" placeholder="value" id="2" value="'.$advantages[2]['value'].'"><br>
		<p>'.$advantages[3]['name'].':</p><br>
		<input type="text" class="input" placeholder="value" id="3" value="'.$advantages[3]['value'].'"><br>
		<p>'.$advantages[4]['name'].': </p><br>
		<input type="text" class="input" placeholder="value" id="4" value="'.$advantages[4]['value'].'"><br>
		<button onclick="saveAdvantages()" class="btn">Save</button><br>
	';
} 
elseif ($type == 'editCase') {
	$arr["status"] = "succes";
	$arr["input"] = "";
	
	$in = addCasePageValue();
		
	$arr["input"] = $in;
} 
elseif ($type == 'editHeader') {
	$arr["status"] = "succes";
	$arr["input"] = "";
	
	$in = addHeaderPageValue();
		
	$arr["input"] = $in;
} 
elseif ($type == 'EditBlogger') {
	$arr["status"] = "succes";
	$arr["input"] = "";
	
	$in = addBloggerPageValue();
		
	$arr["input"] = $in;
} 
elseif ($type == "addBlogger") {
	$arr["status"] = "succes";
	$arr["input"] = "";
	
	$in = addBloggerPage();
		
	$arr["input"] = $in;
} 
elseif ($type == "addHeader") {
	$arr["status"] = "succes";
	$arr["input"] = "";
	
	$in = addHeaderPage();
		
	$arr["input"] = $in;
}
elseif ($type == "addCase") {
	$arr["status"] = "succes";
	$arr["input"] = "";
	
	$in = addCasePage();
		
	$arr["input"] = $in;
}
elseif ($type == "addBloggerSave") {
	
	$arr["status"] = "succes";
	
	$img = filter_var(trim($_POST['img']), FILTER_SANITIZE_STRING);
	$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
	$count = filter_var(trim($_POST['count']), FILTER_SANITIZE_STRING);
	$text = filter_var(trim($_POST['text']), FILTER_SANITIZE_STRING);
	$link = filter_var(trim($_POST['link']), FILTER_SANITIZE_STRING);
	
	$mysql->query("INSERT INTO `bloggers` (`img`, `name`, `count`, `link`, `text`) VALUES('$img', '$name', '$count', '$link', '$text')");  
}
elseif ($type == "addCaseSave") {
	
	$arr["status"] = "succes";
	
	$img = filter_var(trim($_POST['img']), FILTER_SANITIZE_STRING);
	$img2 = filter_var(trim($_POST['img2']), FILTER_SANITIZE_STRING);
	$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
	$text = filter_var(trim($_POST['text']), FILTER_SANITIZE_STRING);
	
	$text = str_replace(array("\r\n", "\r", "\n"), '<br>', $text);
	
	$json = array();
	$json = json_encode($json);
	
	$mysql->query("INSERT INTO `cases` ( `name`, `text`, `mainIMG`, `prewIMG`, `dopIMG`) VALUES('$name', '$text', '$img', '$img2', '$json')");  
}
elseif ($type == "changeCaseSave") {
	
	$arr["status"] = "succes";
	
	$id = filter_var(trim($_POST['id']), FILTER_SANITIZE_STRING);
	$img = filter_var(trim($_POST['img']), FILTER_SANITIZE_STRING);
	$img2 = filter_var(trim($_POST['img2']), FILTER_SANITIZE_STRING);
	$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
	$text = filter_var(trim($_POST['text']), FILTER_SANITIZE_STRING);
	
	
	$mysql->query("UPDATE `cases` SET `name` = '$name' WHERE `cases`.`id` = $id;");
	$mysql->query("UPDATE `cases` SET `text` = '$text' WHERE `cases`.`id` = $id;");
	
	if($img != '') {
		$mysql->query("UPDATE `cases` SET `mainIMG` = '$img' WHERE `cases`.`id` = $id;");
	};
	if($img2 != '') {
		$mysql->query("UPDATE `cases` SET `prewIMG` = '$img2' WHERE `cases`.`id` = $id;");
	};
}
elseif ($type == "changeBloggerSaveIMG") {
	
	$arr["status"] = "succes";
	
	$id = filter_var(trim($_POST['id']), FILTER_SANITIZE_STRING);
	$img = filter_var(trim($_POST['img']), FILTER_SANITIZE_STRING);
	$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
	$count = filter_var(trim($_POST['count']), FILTER_SANITIZE_STRING);
	$text = filter_var(trim($_POST['text']), FILTER_SANITIZE_STRING);
	$link = filter_var(trim($_POST['link']), FILTER_SANITIZE_STRING);
	
	$mysql->query("UPDATE `bloggers` SET `img` = '$img' WHERE `bloggers`.`id` = $id;");
	$mysql->query("UPDATE `bloggers` SET `name` = '$name' WHERE `bloggers`.`id` = $id;");
	$mysql->query("UPDATE `bloggers` SET `count` = '$count' WHERE `bloggers`.`id` = $id;");
	$mysql->query("UPDATE `bloggers` SET `link` = '$link' WHERE `bloggers`.`id` = $id;");
	$mysql->query("UPDATE `bloggers` SET `text` = '$text' WHERE `bloggers`.`id` = $id;");
}
elseif ($type == "changeBloggerSave") {
	
	$arr["status"] = "succes";
	
	$id = filter_var(trim($_POST['id']), FILTER_SANITIZE_STRING);
	$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
	$count = filter_var(trim($_POST['count']), FILTER_SANITIZE_STRING);
	$text = filter_var(trim($_POST['text']), FILTER_SANITIZE_STRING);
	$link = filter_var(trim($_POST['link']), FILTER_SANITIZE_STRING);
	
	$mysql->query("UPDATE `bloggers` SET `name` = '$name' WHERE `bloggers`.`id` = $id;");
	$mysql->query("UPDATE `bloggers` SET `count` = '$count' WHERE `bloggers`.`id` = $id;");
	$mysql->query("UPDATE `bloggers` SET `link` = '$link' WHERE `bloggers`.`id` = $id;");
	$mysql->query("UPDATE `bloggers` SET `text` = '$text' WHERE `bloggers`.`id` = $id;");
}
elseif ($type == "saveAdvantages") {
	
	$arr["status"] = "succes";
	
	$v1 = filter_var(trim($_POST['v1']), FILTER_SANITIZE_STRING);
	$v2 = filter_var(trim($_POST['v2']), FILTER_SANITIZE_STRING);
	$v3 = filter_var(trim($_POST['v3']), FILTER_SANITIZE_STRING);
	$v4 = filter_var(trim($_POST['v4']), FILTER_SANITIZE_STRING);
	
	$mysql->query("UPDATE `advantages` SET `value` = '$v1' WHERE `advantages`.`id` = '1';");
	$mysql->query("UPDATE `advantages` SET `value` = '$v2' WHERE `advantages`.`id` = '2';");
	$mysql->query("UPDATE `advantages` SET `value` = '$v3' WHERE `advantages`.`id` = '3';");
	$mysql->query("UPDATE `advantages` SET `value` = '$v4' WHERE `advantages`.`id` = '4';");
}
elseif ($type == "changeHeadderSave") {
	
	$arr["status"] = "succes";
	
	$id = filter_var(trim($_POST['id']), FILTER_SANITIZE_STRING);
	$img = filter_var(trim($_POST['img']), FILTER_SANITIZE_STRING);
	$caseV = filter_var(trim($_POST['caseV']), FILTER_SANITIZE_STRING);
	
	$result = $mysql->query("SELECT * FROM `cases`". 'ORDER BY id ASC ');
	$caseCount = -1;
	
	$i = 0;
	while ($row = $result->fetch_assoc()) {
		$case[$i]['id'] = $row['id'];
		$case[$i]['name'] = ($row['name']);
		$caseCount++;
		$i++;
	};
	
	$n = 0;
	$i = 0;
	while($i <= $caseCount) {
		if($case[$i]['id'] == $caseV) {
			$n = $i;
		};
		$i++;
	};
	
	$name = $case[$n]['name'];
	
	$mysql->query("UPDATE `header` SET `img` = '$img' WHERE `header`.`id` = $id;");
	$mysql->query("UPDATE `header` SET `path` = '$n' WHERE `header`.`id` = $id;");
	$mysql->query("UPDATE `header` SET `text` = '$name' WHERE `header`.`id` = $id;");
}
elseif ($type == "addHeaderSave") {
	
	$arr["status"] = "succes";
	
	$img = filter_var(trim($_POST['img']), FILTER_SANITIZE_STRING);
	$caseV = filter_var(trim($_POST['caseV']), FILTER_SANITIZE_STRING);
	
	$result = $mysql->query("SELECT * FROM `cases`". 'ORDER BY id ASC ');
	$caseCount = -1;
	
	$i = 0;
	while ($row = $result->fetch_assoc()) {
		$case[$i]['id'] = $row['id'];
		$case[$i]['name'] = ($row['name']);
		$caseCount++;
		$i++;
	};
	
	$n = 0;
	$i = 0;
	while($i <= $caseCount) {
		if($case[$i]['id'] == $caseV) {
			$n = $i;
		};
		$i++;
	};
	
	$name = $case[$n]['name'];
	
	$mysql->query("INSERT INTO `header` (`img`, `path`, `text`) VALUES('$img', '$n', '$name')");  
}
elseif ($type == "openBlogger") {
	
	$arr["status"] = "succes";
	
	$id = filter_var(trim($_POST['id']), FILTER_SANITIZE_STRING);
	
	$result = $mysql->query("SELECT * FROM `bloggers` WHERE `bloggers`.`id` = $id");
	$blogger = $result->fetch_assoc();
	
	$img = $blogger["img"];
	$name = $blogger["name"];
	$count = $blogger["count"];
	$text = $blogger["text"];
	$link = $blogger["link"];
	
	$arr["input"] = '
		<p>'.$name.'</p><br>
		<img src="/'.$img.'" class="img"><br>
		<p>'.$count.'</p><br>
		<p>'.$text.'</p><br>
		<a href="'.$link.'">'.$link.'</a><br>
		<button class="btnBig" onclick="EditBlogger('."'$id'".')">Edit</button><br>
		<button class="btnBig" onclick="dellBlogger('."'$id'".')">Delete</button>
	';
	
	
	
}
elseif ($type == "openHeader") {
	
	$arr["status"] = "succes";
	
	$id = filter_var(trim($_POST['id']), FILTER_SANITIZE_STRING);
	
	$result = $mysql->query("SELECT * FROM `header` WHERE `header`.`id` = $id");
	$Header = $result->fetch_assoc();
	
	$img = $Header["img"];
	$text = $Header["text"];
	$link = $Header["path"];
	
	$arr["input"] = '
		<p>'.$text.'</p><br>
		<img src="/'.$img.'" class="img"><br>
		<p>'.$link.'</p><br>
		<button class="btnBig" onclick="editHeader('."'$id'".')">Edit</button><br>
		<button class="btnBig" onclick="dellHeader('."'$id'".')">Delete</button><br>
	';
	
	
	
}
elseif ($type == "openCase") {
	
	$arr["status"] = "succes";
	
	$id = filter_var(trim($_POST['id']), FILTER_SANITIZE_STRING);
	
	$result = $mysql->query("SELECT * FROM `cases` WHERE `cases`.`id` = $id");
	$Header = $result->fetch_assoc();
	
	$img = $Header["prewIMG"];
	$img2 = $Header["mainIMG"];
	$name = $Header["name"];
	$text = $Header["text"];
	
	$arr["input"] = '
		<p>'.$name.'</p><br>
		<p>Prew</p><br>
		<img src="/'.$img.'" class="img"><br>
		<p>Main</p><br>
		<img src="/'.$img2.'" class="img"><br>
		<p>'.$text.'</p><br>
		<button class="btnBig" onclick="editCase('."'$id'".')">Edit</button><br>
		<button class="btnBig" onclick="dellCase('."'$id'".')">Delete</button><br>
	';
	
	
	
}
elseif ($type == "dellBlogger") {
	
	$arr["status"] = "succes";
	
	$id = filter_var(trim($_POST['id']), FILTER_SANITIZE_STRING);
	
	 $mysql->query("DELETE FROM `bloggers` WHERE `bloggers`.`id` = $id");  
}
elseif ($type == "dellHeader") {
	
	$arr["status"] = "succes";
	
	$id = filter_var(trim($_POST['id']), FILTER_SANITIZE_STRING);
	
	 $mysql->query("DELETE FROM `header` WHERE `header`.`id` = $id");  
}
elseif ($type == "dellCase") {
	
	$arr["status"] = "succes";
	
	$id = filter_var(trim($_POST['id']), FILTER_SANITIZE_STRING);
	
	 $mysql->query("DELETE FROM `cases` WHERE `cases`.`id` = $id");  
};

header('Content-type: application/json');
echo json_encode($arr);
exit();