let err = $('#err_log')
let password = null
let name = false;
let email = false;
let username = false;
let pass = false;
let confirm = false;

let checked = function() {
    $('#register-btn').attr('disabled', true)
    $('#register-btn').css('background', '#bebebe')
    if(name && pass && email && username && pass && confirm) {
        $('#register-btn').removeAttr('disabled')
        $('#register-btn').css('background', '#1ba085')
    }
    else {
        $('#register-btn').attr('disabled', true)
        $('#register-btn').css('background', '#bebebe')
    }
}

$('input[name="name"]').keyup(function() {
    let text = $(this).val().trim()
    let reg = /^[a-z]{6,}$/gi;
    if(!checkBlank(text)) {
        if(!reg.test(text)) {
            err.text('Tên quá ngắn, phải hơn 6 ký tự, không được có số hoặc ký tự đặc biệt')
            name = false;
            checked();
            return
        }
        else {
            err.text('')
            name = true
            checked();
        }
    }
    else {
        err.text('Vui lòng điền tên')
    }
})

$('input[name="email"]').keyup(function() {
    let text = $(this).val().trim()
    let reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!checkBlank(text)) {
        if(!reg.test(text)) {
            err.text('Email không hợp lệ, email phải có @ và địa chỉ')
            email = false;
            checked();
            return;
        }
        else {
            err.text('')
            email = true;
            checked();
        }
    }
    else {
        err.text('Vui lòng điền email')
        email = true
        checked();
    }
})

$('input[name="username"]').keyup(function() {
    let text = $(this).val().trim();
    let reg = /^[a-z0-9]{6,}$/ig
    if(!checkBlank(text)) {
        if(!reg.test(text)) {
            err.text('Tên đăng nhập không hợp lệ');
            username = false;
            checked();
            return;
        }
        else {
            err.text('');
            username = true
            checked();
        }
    }
    else {
        err.text('Vui lòng điền tên đăng nhập')
    }
})

$('input[name="password"]').keyup(function() {
    let text = $(this).val().trim();
    let reg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,10}$/ig
    if(!checkBlank(text)) {
        if(!reg.test(text)) {
            err.text('Mật khẩu không hợp lệ');
            pass = false;
            checked();
            return;
        }
        else {
            err.text('');
            password = text
            pass = true
            checked();
        }
    }
    else {
        err.text('Vui lòng điền tên đăng nhập')
    }
})

$('input[name="confirm"]').keyup(function() {
    let text = $(this).val().trim();
    if(!checkBlank(text)) {
        if(text !== password) {
            err.text('Xác nhận mật khẩu không trùng');
            confirm = false;
            checked();
            return;
        }
        else {
            confirm = true
            err.text('');
            checked();
        }
    }   
    else {
        err.text('Vui lòng xác nhận mật khẩu');
    }
})

function checkBlank(text) {
    if(text == '')
        return true;
    return false;
}
checked();