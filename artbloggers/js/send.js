

function chek_name() {
    if(document.getElementById("chek_name").value !== '') {
        document.getElementById("chek_name").setAttribute('style', 'border-bottom: 2px solid #334FFF;');
    } else {
        document.getElementById("chek_name").setAttribute('style', 'border-bottom: 2px solid #FF0000;');
    };
};

function chek_email() {
    if(document.getElementById("chek_email").value !== '') {
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        var email = document.getElementById("chek_email").value;
        if(reg.test(email) == false) {
            document.getElementById("chek_email").setAttribute('style', 'border-bottom: 2px solid #FF0000;');
        } else {
            document.getElementById("chek_email").setAttribute('style', 'border-bottom: 2px solid #334FFF;');
        }
    } else {
        document.getElementById("chek_email").setAttribute('style', 'border-bottom: 2px solid #FF0000;');
    };
};

function chek_request() {
    
};

function send() {
    var name = document.getElementById("chek_name").value;
    var email = document.getElementById("chek_email").value;
    var request = document.getElementById("chek_request").value;
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    
    if(name !== '' && email !== '') {
        if(reg.test(email) == false) {
            document.getElementById("chek_email").setAttribute('style', 'border-bottom: 2px solid #FF0000;');
        } else {
            document.getElementById("text_send_b").innerHTML = 'Sending...';
            
            $.ajax({
                
                type: "POST",
                url: "/artbloggers/php/send.php",
                data: {name: name, email: email, request: request} ,
                success: function(result) {
                    if(result !== '') {
                        if(result === 'Email sent successfully') {
                            document.getElementById("text_send_b").innerHTML = 'Sent';
                            document.getElementById("text_send_b").setAttribute('style', 'color: black');
                            document.getElementById("gradient-canvas5").setAttribute('style', 'display: none');
                            document.getElementById("btn_send").setAttribute('style', 'background: #EDEDED');
                            document.getElementById("btn_send").setAttribute('onclick', '');
                            document.getElementById("chek_name").setAttribute('style', '');
                            document.getElementById("chek_email").setAttribute('style', '');
                            document.getElementById("chek_request").setAttribute('style', '');
                            document.getElementById("chek_name").value = '';
                            document.getElementById("chek_email").value = '';
                            document.getElementById("chek_request").value = '';
                        } else {
                            alert('Error');
                        }
                        

                    } else {

                        alert('Error');

                    }


                }, 
            });
        }
    } else {
        if(name === '') {
            document.getElementById("chek_name").setAttribute('style', 'border-bottom: 2px solid #FF0000;');
        };
        if(email === '') {
            document.getElementById("chek_email").setAttribute('style', 'border-bottom: 2px solid #FF0000;');
        };
    }
}