function bloggers() {
	$.ajax({
        type: "POST",
        url: "/template/php/load.php",
        data: {type: 'bloggers'},
        success: function(html) {
			if(html.status === "succes") {
				document.getElementById("input").innerHTML = html.input;
				document.getElementById("input2").innerHTML = '<p></p>';
			} else {
				alert(html.status);
			};
		},
		
	});
};

function header() {
	$.ajax({
        type: "POST",
        url: "/template/php/load.php",
        data: {type: 'header'},
        success: function(html) {
			if(html.status === "succes") {
				document.getElementById("input").innerHTML = html.input;
				document.getElementById("input2").innerHTML = '<p></p>';
			} else { 
				alert(html);
			};
		},
		
	});
};

function advantages() {
	$.ajax({
        type: "POST",
        url: "/template/php/load.php",
        data: {type: 'advantages'},
        success: function(html) {
			if(html.status === "succes") {
				document.getElementById("input").innerHTML = html.input;
				document.getElementById("input2").innerHTML = '<p></p>';
			} else { 
				alert(html);
			};
		},
		
	});
};

function cases() {
	$.ajax({
        type: "POST",
        url: "/template/php/load.php",
        data: {type: 'cases'},
        success: function(html) {
			if(html.status === "succes") {
				document.getElementById("input").innerHTML = html.input;
				document.getElementById("input2").innerHTML = '<p></p>';
			} else { 
				alert(html);
			};
		},
		
	});
};

function editAdvantages() {
	$.ajax({
        type: "POST",
        url: "/template/php/load.php",
        data: {type: 'editAdvantages'},
        success: function(html) {
			if(html.status === "succes") {
				document.getElementById("input2").innerHTML = html.input;
			} else { 
				alert(html);
			};
		},
		
	});
};

function openAddBlogger() {
	$.ajax({
        type: "POST",
        url: "/template/php/load.php",
        data: {type: 'addBlogger'},
        success: function(html) {
			if(html.status === "succes") {
				document.getElementById("input2").innerHTML = html.input;
			} else {
				alert(html.status);
			};
		},
	});
};

function openAddHeader() {
	$.ajax({
        type: "POST",
        url: "/template/php/load.php",
        data: {type: 'addHeader'},
        success: function(html) {
			if(html.status === "succes") {
				document.getElementById("input2").innerHTML = html.input;
			} else {
				alert(html);
			};
		},
	});
};

function openAddCase() {
	$.ajax({
        type: "POST",
        url: "/template/php/load.php",
        data: {type: 'addCase'},
        success: function(html) {
			if(html.status === "succes") {
				document.getElementById("input2").innerHTML = html.input;
			} else {
				alert(html);
			};
		},
	});
};

function addBloger() {
	
	
	const img = document.getElementById("img").value;
	const name = document.getElementById("name").value;
	const count = document.getElementById("count").value;
	const text = document.getElementById("text").value;
	const link = document.getElementById("link").value;
	
	if(img !== '' && name !== '' && count !== '' && text !== '' && link !== '') {
		
		var formData = new FormData();
        formData.append('file',document.getElementById("img").files[0]);
        $.ajaxSetup({
            headers: {
                //headers
            }
        });
        $.ajax({
            url:'save_img.php',
            type:"POST",
            data:formData,
            processData: false,
            contentType: false,
            dataType:"json"
        })
        .done(function(html) {
            if(html.status == "success") {
				
				const path = html.path_min;
				
				$.ajax({
					type: "POST",
					url: "/template/php/load.php",
					data: {type: 'addBloggerSave', img: path, name: name, count: count, text: text, link: link},
					success: function(html) {
						if(html.status === "succes") {
							bloggers();
						} else {
							alert(html.status);
						};
					},
				});
				
				
            } else {
				alert(html.status);
			}
        })
	} else {
		alert('error');  
	}
	
	
};

function addCase() {
	
	
	const img = document.getElementById("img").value;
	const imgPrew = document.getElementById("imgPrew").value;
	const name = document.getElementById("name").value;
	var text = document.getElementById("text").value;
	
	text = text.replace(/\\n/g, '<br>');
	
	if(img !== '' && name !== '' && imgPrew !== '' && text !== '') {
		
		var formData = new FormData();
        formData.append('file',document.getElementById("img").files[0]);
        formData.append('file2',document.getElementById("imgPrew").files[0]);
        $.ajaxSetup({
            headers: {
                //headers
            }
        });
        $.ajax({
            url:'save_img2.php',
            type:"POST",
            data:formData,
            processData: false,
            contentType: false,
            dataType:"json"
        })
        .done(function(html) {
            if(html.status == "success") {
				
				const path = html.path_min;
				const path2 = html.path_min2;
				
				$.ajax({
					type: "POST",
					url: "/template/php/load.php",
					data: {type: 'addCaseSave', img: path, img2: path2, name: name, text: text},
					success: function(html) {
						if(html.status === "succes") {
							cases();
						} else {
							alert(html);
						};
					},
				});
				
				
            } else {
				alert(html.status);
			}
        })
	} else {
		alert('error');  
	}
	
	
};

function changeCase(id) {
	
	
	const img = document.getElementById("img").value;
	const imgPrew = document.getElementById("imgPrew").value;
	const name = document.getElementById("name").value;
	var text = document.getElementById("text").value;
	
	text = text.replace(/\\n/g, '<br>');
	
	if(img !== '' && name !== '' && imgPrew !== '' && text !== '') {
		
		var formData = new FormData();
        formData.append('file',document.getElementById("img").files[0]);
        formData.append('file2',document.getElementById("imgPrew").files[0]);
        $.ajaxSetup({
            headers: {
                //headers
            }
        });
        $.ajax({
            url:'save_img2.php',
            type:"POST",
            data:formData,
            processData: false,
            contentType: false,
            dataType:"json"
        })
        .done(function(html) {
            if(html.status == "success") {
				
				const path = html.path_min;
				const path2 = html.path_min2;
				
				$.ajax({
					type: "POST",
					url: "/template/php/load.php",
					data: {type: 'changeCaseSave', img: path, img2: path2, name: name, text: text},
					success: function(html) {
						if(html.status === "succes") {
							cases();
						} else {
							alert(html);
						};
					},
				});
				
				
            } else {
				alert(html.status);
			}
        })
	} else if(img !== '' && name !== '' && text !== '') {
		
		var formData = new FormData();
        formData.append('file',document.getElementById("img").files[0]);
        $.ajaxSetup({
            headers: {
                //headers
            }
        });
        $.ajax({
            url:'save_img.php',
            type:"POST",
            data:formData,
            processData: false,
            contentType: false,
            dataType:"json"
        })
        .done(function(html) {
            if(html.status == "success") {
				
				const path = html.path_min;
				
				$.ajax({
					type: "POST",
					url: "/template/php/load.php",
					data: {type: 'changeCaseSave', img: path, img2: '', name: name, text: text, id: id},
					success: function(html) {
						if(html.status === "succes") {
							cases();
						} else {
							alert(html);
						};
					},
				});
				
				
            } else {
				alert(html);
			}
        })
	} else if(imgPrew !== '' && name !== '' && text !== '') {
		
		var formData = new FormData();
        formData.append('file',document.getElementById("imgPrew").files[0]);
        $.ajaxSetup({
            headers: {
                //headers
            }
        });
        $.ajax({
            url:'save_img.php',
            type:"POST",
            data:formData,
            processData: false,
            contentType: false,
            dataType:"json"
        })
        .done(function(html) {
            if(html.status == "success") {
				
				const path = html.path_min;
				
				$.ajax({
					type: "POST",
					url: "/template/php/load.php",
					data: {type: 'changeCaseSave', img: '', img2: path, name: name, text: text, id: id},
					success: function(html) {
						if(html.status === "succes") {
							cases();
						} else {
							alert(html);
						};
					},
				});
				
				
            } else {
				alert(html);
			}
        })
	} else if(name !== '' && text !== '') {
		
		$.ajax({
			type: "POST",
			url: "/template/php/load.php",
			data: {type: 'changeCaseSave', img: '', img2: '', name: name, text: text, id: id},
			success: function(html) {
				if(html.status === "succes") {
					cases();
				} else {
					alert(html);
				};
			},
		});
	} else {
		alert('error');  
	}
	
	
};

function changeBloger(id) {
	
	
	const img = document.getElementById("img").value;
	const name = document.getElementById("name").value;
	const count = document.getElementById("count").value;
	const text = document.getElementById("text").value;
	const link = document.getElementById("link").value;
	
	if(img !== '' && name !== '' && count !== '' && text !== '' && link !== '') {
		
		var formData = new FormData();
        formData.append('file',document.getElementById("img").files[0]);
        $.ajaxSetup({
            headers: {
                //headers
            }
        });
        $.ajax({
            url:'save_img.php',
            type:"POST",
            data:formData,
            processData: false,
            contentType: false,
            dataType:"json"
        })
        .done(function(html) {
            if(html.status == "success") {
				
				const path = html.path_min;
				
				$.ajax({
					type: "POST",
					url: "/template/php/load.php",
					data: {type: 'changeBloggerSaveIMG', img: path, name: name, count: count, text: text, link: link, id: id},
					success: function(html) {
						if(html.status === "succes") {
							bloggers();
						} else {
							alert(html);
						};
					},
				});
				
				
            } else {
				alert(html);
			}
        })
	} else if(name !== '' && count !== '' && text !== '' && link !== '') {
		
		$.ajax({
			type: "POST",
			url: "/template/php/load.php",
			data: {type: 'changeBloggerSave', name: name, count: count, text: text, link: link, id: id},
			success: function(html) {
				if(html.status === "succes") {
					bloggers();
				} else {
					alert(html);
				};
			},
		});
	} else {
		alert('error');  
	}
	
	
};

function saveAdvantages() {
	
	
	const v1 = document.getElementById("1").value;
	const v2 = document.getElementById("2").value;
	const v3 = document.getElementById("3").value;
	const v4 = document.getElementById("4").value;
	
	if(v1 !== '' && v2 !== '' && v3 !== '' && v4 !== '') {
		
		$.ajax({
			type: "POST",
			url: "/template/php/load.php",
			data: {type: 'saveAdvantages', v1: v1, v2: v2, v3: v3, v4: v4},
			success: function(html) {
				if(html.status === "succes") {
					advantages();
				} else {
					alert(html);
				};
			},
		});
	} else {
		alert('error');  
	}
	
	
};

function changeHeadder(id) {
	
	
	const img = document.getElementById("img").value;
	const caseV = document.getElementById("cases").value;
	
	
	if(img !== '' && caseV !== '') {
		
		var formData = new FormData();
        formData.append('file',document.getElementById("img").files[0]);
        $.ajaxSetup({
            headers: {
                //headers
            }
        });
        $.ajax({
            url:'save_img.php',
            type:"POST",
            data:formData,
            processData: false,
            contentType: false,
            dataType:"json"
        })
        .done(function(html) {
            if(html.status == "success") {
				
				const path = html.path_min;
				
				$.ajax({
					type: "POST",
					url: "/template/php/load.php",
					data: {type: 'changeHeadderSave', img: path, caseV: caseV, id: id},
					success: function(html) {
						if(html.status === "succes") {
							header();
						} else {
							alert(html);
						};
					},
				});
				
				
            } else {
				alert(html.status);
			}
        })
	} else {
		alert('error');  
	}
	
	
};

function addHeadder() {
	
	
	const img = document.getElementById("img").value;
	const caseV = document.getElementById("cases").value;
	
	
	if(img !== '' && caseV !== '') {
		
		var formData = new FormData();
        formData.append('file',document.getElementById("img").files[0]);
        $.ajaxSetup({
            headers: {
                //headers
            }
        });
        $.ajax({
            url:'save_img.php',
            type:"POST",
            data:formData,
            processData: false,
            contentType: false,
            dataType:"json"
        })
        .done(function(html) {
            if(html.status == "success") {
				
				const path = html.path_min;
				
				$.ajax({
					type: "POST",
					url: "/template/php/load.php",
					data: {type: 'addHeaderSave', img: path, caseV: caseV},
					success: function(html) {
						if(html.status === "succes") {
							header();
						} else {
							alert(html);
						};
					},
				});
				
				
            } else {
				alert(html.status);
			}
        })
	} else {
		alert('error');  
	}
	
	
};

function openBlogger(id, name) {
	$.ajax({
        type: "POST",
        url: "/template/php/load.php",
        data: {type: 'openBlogger', id: id},
        success: function(html) {
			if(html.status === "succes") { 
				document.getElementById("input2").innerHTML = html.input;
			} else {
				alert(html.status);
			};
		},
		
	});
};

function openheader(id, name) {
	$.ajax({
        type: "POST",
        url: "/template/php/load.php",
        data: {type: 'openHeader', id: id},
        success: function(html) {
			if(html.status === "succes") { 
				document.getElementById("input2").innerHTML = html.input;
			} else {
				alert(html);
			};
		},
		
	});
};

function openCase(id, name) {
	$.ajax({
        type: "POST",
        url: "/template/php/load.php",
        data: {type: 'openCase', id: id},
        success: function(html) {
			if(html.status === "succes") { 
				document.getElementById("input2").innerHTML = html.input;
			} else {
				alert(html);
			};
		},
		
	});
};

function dellBlogger(id) {
	$.ajax({
        type: "POST",
        url: "/template/php/load.php",
        data: {type: 'dellBlogger', id: id},
        success: function(html) {
			if(html.status === "succes") {
				bloggers();
			} else {
				alert(html.status);
			};
		},
		
	});
};

function editHeader(id) {
	$.ajax({
        type: "POST",
        url: "/template/php/load.php",
        data: {type: 'editHeader', id: id},
        success: function(html) {
			if(html.status === "succes") {
				document.getElementById("input2").innerHTML = html.input;
			} else {
				alert(html);
			};
		},
		
	});
};

function EditBlogger(id) {
	$.ajax({
        type: "POST",
        url: "/template/php/load.php",
        data: {type: 'EditBlogger', id: id},
        success: function(html) {
			if(html.status === "succes") {
				document.getElementById("input2").innerHTML = html.input;
			} else {
				alert(html);
			};
		},
		
	});
};

function editCase(id) {
	$.ajax({
        type: "POST",
        url: "/template/php/load.php",
        data: {type: 'editCase', id: id},
        success: function(html) {
			if(html.status === "succes") {
				document.getElementById("input2").innerHTML = html.input;
			} else {
				alert(html);
			};
		},
		
	});
};

function dellHeader(id) {
	$.ajax({
        type: "POST",
        url: "/template/php/load.php",
        data: {type: 'dellHeader', id: id},
        success: function(html) {
			if(html.status === "succes") {
				header();
			} else {
				alert(html.status);
			};
		},
		
	});
};

function dellCase(id) {
	$.ajax({
        type: "POST",
        url: "/template/php/load.php",
        data: {type: 'dellCase', id: id},
        success: function(html) {
			if(html.status === "succes") {
				cases();
			} else {
				alert(html);
			};
		},
		
	});
};