var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
    var currentScrollpos = window.pageYOffset;
    if(currentScrollpos <= 124) {
        document.getElementById("m_z").style.top = "0";
    }else if(prevScrollpos >= currentScrollpos) {
        document.getElementById("m_z").style.top = "0";
    } else {
        document.getElementById("m_z").style.top = "-124px";
    }
    prevScrollpos = currentScrollpos;
}

function open_m() {
    document.getElementById("menu").setAttribute('style', 'display: block;');
    document.getElementById("burger").setAttribute('style', 'display: none;'); 
    document.getElementById("close_burger").setAttribute('style', 'display: block;');
    document.getElementById("page").setAttribute('style', 'overflow: hidden;');
    setTimeout(function() {document.getElementById("m_z").style.top = "0";}, 10);
};
            
function hide() {
    setTimeout(function() {document.getElementById("m_z").style.top = "-124px";}, 50);
}
        
function close_m() {
    document.getElementById("menu").setAttribute('style', '');
    document.getElementById("page").setAttribute('style', '');
    document.getElementById("close_burger").setAttribute('style', '');
    document.getElementById("burger").setAttribute('style', '');
    document.getElementById("o").setAttribute('style', '');
};
            
function open_t1() {
    document.getElementById("o_t_1").setAttribute('style', 'height: auto; display: block;');
    document.getElementById("b_o_t").setAttribute('style', 'display: none;');
};

function open_img(n) {
    document.getElementById("img_page").setAttribute('style', 'display: block;');
    document.getElementById("sub_img_page").setAttribute('style', 'display: block;');
    document.getElementById("page").setAttribute('style', 'overflow: hidden;');
                
    if(n === 1) {
        document.getElementById("img_page").innerHTML = '<img src="/artbloggers/img/cases/1.jpg" class="page_img_img">';
    } else if (n === 2) {
    document.getElementById("img_page").innerHTML = '<img src="/artbloggers/img/cases/ba3.jpg" class="page_img_img">';
    } else if (n === 3) {
        document.getElementById("img_page").innerHTML = '<img src="/artbloggers/img/cases/ba4.jpg" class="page_img_img">';
    } else if (n === 4) {
        document.getElementById("img_page").innerHTML = '<img src="/artbloggers/img/cases/ba5.jpg" class="page_img_img">';
    } else if (n === 5) {
        document.getElementById("img_page").innerHTML = '<img src="/artbloggers/img/cases/ba1.jpg" class="page_img_img">';
    } else if (n === 6) {
        document.getElementById("img_page").innerHTML = '<img src="/artbloggers/img/cases/ba2.jpg" class="page_img_img">';
    } else if (n === 7) {
        document.getElementById("img_page").innerHTML = '<img src="/artbloggers/img/cases/2.jpg" class="page_img_img">';
    } else if (n === 8) {
        document.getElementById("img_page").innerHTML = '<img src="/artbloggers/img/cases/3.jpg" class="page_img_img">';
    } else if (n === 9) {
        document.getElementById("img_page").innerHTML = '<img src="/artbloggers/img/cases/sp1.jpg" class="page_img_img">';
    } else if (n === 10) {
        document.getElementById("img_page").innerHTML = '<img src="/artbloggers/img/cases/sp2.jpg" class="page_img_img">';
    } else if (n === 11) {
        document.getElementById("img_page").innerHTML = '<img src="/artbloggers/img/cases/sp3.jpg" class="page_img_img">';
    } else if (n === 12) {
        document.getElementById("img_page").innerHTML = '<img src="/artbloggers/img/cases/4.jpg" class="page_img_img">';
    } else if (n === 13) {
        document.getElementById("img_page").innerHTML = '<img src="/artbloggers/img/cases/5.jpg" class="page_img_img">';
    } else if (n === 14) {
        document.getElementById("img_page").innerHTML = '<img src="/artbloggers/img/cases/ia1.jpg" class="page_img_img">';
    } else if (n === 15) {
        document.getElementById("img_page").innerHTML = '<img src="/artbloggers/img/cases/ia2.jpg" class="page_img_img">';
    } else if (n === 16) {
        document.getElementById("img_page").innerHTML = '<img src="/artbloggers/img/cases/ia3.jpg" class="page_img_img">';
    } else if (n === 17) {
        document.getElementById("img_page").innerHTML = '<img src="/artbloggers/img/cases/ia4.jpg" class="page_img_img">';
    } else if (n === 18) {
        document.getElementById("img_page").innerHTML = '<img src="/artbloggers/img/cases/ia5.jpg" class="page_img_img">';
    } else if (n === 19) {
        document.getElementById("img_page").innerHTML = '<img src="/artbloggers/img/cases/6.jpg" class="page_img_img">';
    }
}

function close_img() {
    document.getElementById("img_page").setAttribute('style', '');
    document.getElementById("sub_img_page").setAttribute('style', '');
}

var page = 0;

function next_page() {
    if(page === 1) {
        document.getElementById("o").setAttribute('class', 'open_page_web ppz1');

    }
    if(page === 2) {
        document.getElementById("o").setAttribute('class', 'open_page_web ppz2');

    }
    if(page === 3) {
        document.getElementById("o").setAttribute('class', 'open_page_web ppz3');

    }
    if(page === 4) {
        document.getElementById("o").setAttribute('class', 'open_page_web ppz4');

    }
    if(page === 5) {
        //document.getElementById("o").setAttribute('class', 'open_page_web ppz5');
        document.getElementById("o").setAttribute('class', 'open_page_web');

    }
    if(page === 6) {
        document.getElementById("o").setAttribute('class', 'open_page_web');

    }
    if(page === 5) {
        page = 1;
    } else {
        page++;
    }

}

function prev_page() {

    if(page === 1) {
        document.getElementById("o").setAttribute('class', 'open_page_web ppz4');
    };
    if(page === 2) {
        document.getElementById("o").setAttribute('class', 'open_page_web');
    };
    if(page === 3) {
        document.getElementById("o").setAttribute('class', 'open_page_web ppz1');
    };
    if(page === 4) {
        document.getElementById("o").setAttribute('class', 'open_page_web ppz2');
    };
    if(page === 5) {
        document.getElementById("o").setAttribute('class', 'open_page_web ppz2');
    };
    if(page === 6) {
        document.getElementById("o").setAttribute('class', 'open_page_web ppz4');
    };
    if(page === 1) {
        page = 5;
    } else {
        page--;
    }



}

function open_o(n) {


    document.getElementById("o1").setAttribute('style', 'display: block;');

    if (n === 1) {
        document.getElementById("o").setAttribute('style', 'display: block;');
        document.getElementById("page").setAttribute('style', 'overflow: hidden;');
        location.href = "#FINLANDIA";
    };
    if (n === 2) {
        document.getElementById("o").setAttribute('style', 'display: block;');
        document.getElementById("page").setAttribute('style', 'overflow: hidden;');
        document.getElementById("o").setAttribute('class', 'open_page_web ppz1');
        location.href = "#Bombay";
    };
    if (n === 3) {
        document.getElementById("o").setAttribute('style', 'display: block;');
        document.getElementById("page").setAttribute('style', 'overflow: hidden;');
        document.getElementById("o").setAttribute('class', 'open_page_web ppz2');
        location.href = "#Influence";
    };
    if (n === 4) {
        document.getElementById("o").setAttribute('style', 'display: block;'); 
        document.getElementById("page").setAttribute('style', 'overflow: hidden;');
        document.getElementById("o").setAttribute('class', 'open_page_web ppz3');
        location.href = "#Swarovski";
    };
    if (n === 5) {
        document.getElementById("o").setAttribute('style', 'display: block;');
        document.getElementById("page").setAttribute('style', 'overflow: hidden;');
        document.getElementById("o").setAttribute('class', 'open_page_web ppz4');
        location.href = "#Adidas";
    };
    if (n === 6) {
        document.getElementById("o").setAttribute('style', 'display: block;');
        document.getElementById("page").setAttribute('style', 'overflow: hidden;');
        document.getElementById("o").setAttribute('class', 'open_page_web ppz5');
        location.href = "#Influence";
    };

    document.getElementById("btn_zone").setAttribute('style', 'display: block');
    document.getElementById("Cases").setAttribute('style', 'display: block');
    document.getElementById("close_mp").setAttribute('style', 'display: block');
    document.getElementById("btn_back_nn").setAttribute('style', 'display: block');
    document.getElementById("i1440").setAttribute('style', 'display: none');
    document.getElementById("m_z").style.top = "0";
    setTimeout(function() {document.getElementById("m_z").style.top = "0";}, 50);

    page = n;

}

function close_o() {
    document.getElementById("o").setAttribute('style', '');
    document.getElementById("page").setAttribute('style', '');
    document.getElementById("btn_zone").setAttribute('style', '');
    document.getElementById("o1").setAttribute('style', '');
    document.getElementById("i1440").setAttribute('style', '');
    document.getElementById("Cases").setAttribute('style', '');
    document.getElementById("close_mp").setAttribute('style', '');
    document.getElementById("btn_back_nn").setAttribute('style', '');
    page = 0;
}


  

function WindowOnload() {
    document.getElementById("img_zone").innerHTML = '<img src="/artbloggers/img/cases/art-bloggers-5.jpg" class="img1" onclick="" id="img1"><img src="/artbloggers/img/cases/art-bloggers-2-3.jpg" class="img2" onclick="open_o(3)" id="img2"><div class="sm1" id="sm1" onclick=""><p class="psmmt">Honor</p></div><div class="sm2" id="sm2" onclick="open_o(5)"><p class="psmmt">Adidas & Aryuna Tardis</p></div>';
    setTimeout(next_slide, 5000);
}

function next_slide() {
    document.getElementById("img1").setAttribute('style', 'left: 0;');
    document.getElementById("img2").setAttribute('style', 'left: 100vw;');
    document.getElementById("sm1").setAttribute('style', 'left: 0;');
    document.getElementById("sm2").setAttribute('style', 'left: 100vw;');
    setTimeout(function() {
        document.getElementById("img_zone").innerHTML = '<img src="/artbloggers/img/cases/art-bloggers-2-3.jpg" class="img1" onclick="open_o(6)" id="img1"><img src="/artbloggers/img/cases/art-bloggers-3.jpg" class="img2" onclick="open_o(3)" id="img2"><div class="sm1" id="sm1" onclick="open_o(5)"><p class="psmmt">Adidas & Aryuna Tardis</p></div><div class="sm2" onclick="open_o(2)" id="sm2"><p class="psmmt">Bombay Sapphire & Aryuna Tardis</p></div>';
    }, 2000);
    setTimeout(next_slide2, 5000);
}

function next_slide2() {
    document.getElementById("img1").setAttribute('style', 'left: 0;');
    document.getElementById("img2").setAttribute('style', 'left: 100vw;');
    document.getElementById("sm1").setAttribute('style', 'left: 0;');
    document.getElementById("sm2").setAttribute('style', 'left: 100vw;');
    setTimeout(function() {
        document.getElementById("img_zone").innerHTML = '<img src="/artbloggers/img/cases/art-bloggers-3.jpg" class="img1" onclick="open_o(6)" id="img1"><img src="/artbloggers/img/cases/art-bloggers-5.jpg" class="img2" onclick="" id="img2"><div class="sm1" id="sm1" onclick="open_o(2)">Honor<p class="psmmt">Bombay Sapphire & Aryuna Tardis</p></div><div class="sm2" id="sm2" onclick=""><p class="psmmt"></p></div>';
    }, 2000);
    setTimeout(next_slide3, 5000);
}

function next_slide3() {
    document.getElementById("img1").setAttribute('style', 'left: 0;');
    document.getElementById("img2").setAttribute('style', 'left: 100vw;');
    document.getElementById("sm1").setAttribute('style', 'left: 0;');
    document.getElementById("sm2").setAttribute('style', 'left: 100vw;');
    setTimeout(function() {
        document.getElementById("img_zone").innerHTML = '<img src="/artbloggers/img/cases/art-bloggers-5.jpg" class="img1" onclick="" id="img1"><img src="/artbloggers/img/cases/art-bloggers-2-3.jpg" class="img2" onclick="open_o(3)" id="img2"><div class="sm1" onclick="" id="sm1"><p class="psmmt">Honor</p></div><div class="sm2" onclick="open_o(5)" id="sm2"><p class="psmmt">Adidas & Aryuna Tardis</p></div>';
    }, 2000);
    setTimeout(next_slide, 5000);
}