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
    document.getElementById("menu").setAttribute('style', 'display: flex;');
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
    document.getElementById("burger").setAttribute('style', ''); 
    document.getElementById("close_burger").setAttribute('style', '');
    document.getElementById("page").setAttribute('style', '');
};
            
function open_t1() {
    document.getElementById("o_t_1").setAttribute('style', 'height: auto; display: block;');
    document.getElementById("b_o_t").setAttribute('style', 'display: none;');
};

function open_img(n) {
    
}

function close_img() {
    document.getElementById("img_page").setAttribute('style', '');
    document.getElementById("sub_img_page").setAttribute('style', '');
}

var page = 0;



function open_o(n) {


    document.getElementById("worksPage").setAttribute('style', 'display: block;');
    document.getElementById("page").setAttribute('style', 'overflow: hidden');
	
	swiper3.slideTo(n, 500, false);

    
}

function close_o() {
    document.getElementById("worksPage").setAttribute('style', '');
    document.getElementById("page").setAttribute('style', '');
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