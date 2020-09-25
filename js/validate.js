/* ======================================= LOGIN FORM VALIDATION AND DATA PASSING B AJAX ======================================= */

window.onload = function () {
    const form = document.getElementById("login_form");
    const user = document.getElementById("log_mail");
    const key = document.getElementById("log_pass");

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        login_val();
    });

    const login_val = () => {
        const mail = log_mail.value.trim();
        const pass = log_pass.value.trim();


        /* ============= EMAIL VALIDATION STARTS ================ */

        if (mail === '') {
            setError(log_mail, "Please input registered mail");
        }
        else if (!mail.match(/^[A-Za-z0-9._]+@[a-zA-Z0-9._]+\.[A-Za-z]{2,3}$/)) {
            setError(log_mail, "Invalid mail type");
        }
        else {
            setSuccess(log_mail, '');
        }

        /* ============= EMAIL VALIDATION ENDS ================ */

        /* ============= PASSWORD VALIDATION STARTS ================ */

        if (pass === '') {
            setError(log_pass, "Please input password");
        }
        else if (!pass.match(/^[A-Za-z0-9._@.$#]{5,20}$/)) {
            setError(log_pass, "Invalid password");
        }
        else {
            setSuccess(log_pass, '');
        }

        /* ============= PASSWORD VALIDATION ENDS ================ */

        /* ============= IF EVERYTHING OKAY CALL THIS OK() FUNCTION FOR CHECKING ================ */

        ok(mail, pass);
    }

    const ok = (mail, pass) => {
        let formGroup = document.getElementsByClassName("form-group");
        var count = formGroup.length - 1;
        for (var i = 0; i < formGroup.length; i++) {
            if (formGroup[i].className === "form-group success") {
                sRate = 0 + i;
                sendData(mail, pass, sRate, count);
            }
            else {
                return false;
            }
        }
    }

    const sendData = (mail, pass, sRate, count) => {
        if (sRate === count) {
            /* ============= DATA PASSING STARTS ================ */
            $.ajax({
                url: "action.php",
                method: "POST",
                data: { user: mail, key: pass },
                success: function (response) {
                    $("#response").html(response);
                    $("#login-form").trigger("reset");
                },
                error: function (response) {
                    $("#response").html(response);
                    $("#login-form").trigger("reset");
                }
            });
        }

    }

    /* ============= THESE TWO FUNCTIONS ARE TO DYNAMICALLY CHANGE CLASSES FOR SUCCESS AND ERROR ================ */
    function setError(input, errorMsg) {
        const formGroup = input.parentElement;
        const small = formGroup.querySelector("small");
        formGroup.className = "form-group error";
        small.innerText = errorMsg;
    }

    function setSuccess(input, successMsg) {
        const formGroup = input.parentElement;
        const small = formGroup.querySelector("small");
        formGroup.className = "form-group success";
        small.innerText = successMsg;
    }
};


/* ============================== REGISTRATION FORM VALIDATION AND PASSING DATA BY AJAX ================================= */
$(document).ready(function () {
    const form = document.getElementById("register");
    const username = document.getElementById("fullname");
    const r_mail = document.getElementById("reg_email");
    const contact = document.getElementById("contactno");
    const pass_1 = document.getElementById("reg_password");
    const pass_2 = document.getElementById("confirmpassword");

    form.addEventListener("submit", (e) => {
        e.preventDefault();
        reg_val();
    });

    const success = (u_name, u_email, mobile, pass, con_pass) => {
        let formGroup = document.getElementsByClassName("form-group");
        var count = formGroup.length - 1;
        console.log(count);
        for (var i = 0; i < formGroup.length; i++) {
            if (formGroup[i].className === "form-group success") {
                sRate = 0 + i;
                console.log(sRate);
                sData(u_name, u_email, mobile, pass, con_pass, sRate, count);
            }
            else {
                return false;
            }
        }
    }

    const sData = (u_name, u_email, mobile, pass, con_pass, sRate, count) => {
        if (sRate === count) {
            $.ajax({
                url: 'action.php',
                method: 'post',
                data: {
                    name: u_name,
                    mail: u_email,
                    phone: mobile,
                    u_pass: pass,
                    c_pass: con_pass
                },
                success: function (response) {
                    $("#res").html(response);
                    $("#register").trigger("reset");
                },
                error: function (response) {
                    $("#res").html(response);
                    $("#register").trigger("reset");
                }
            });
        } else {
            return false;
        }
    }

    const reg_val = () => {

        /* ===== ACCESSING THE VALUE OF EACH FIELD WITH TRIM() FUNCTION ===== */
        const u_name = fullname.value.trim();
        const u_email = reg_email.value.trim();
        const mobile = contactno.value.trim();
        const pass = reg_password.value.trim();
        const con_pass = confirmpassword.value.trim();

        console.log(u_name, u_email, mobile, pass, con_pass);


        /* ===== NAME VALIDATION ===== */
        if (u_name === '') {
            f_error(fullname, "User name is required");
        } else if (!u_name.match(/^[A-Za-z ]{2,30}$/)) {
            f_error(fullname, "User name is invalid");
        } else {
            f_success(fullname, "");
        }

        /* ===== EMAIL VALIDATION ===== */
        if (u_email === '') {
            f_error(reg_email, "email is required");
        } else if (!u_email.match(/^[A-Za-z0-9._]+@[a-zA-Z0-9._]+\.[A-Za-z]{2,3}$/)) {
            f_error(reg_email, "email is invalid");
        } else {
            f_success(reg_email, "");
        }

        /* ===== CONTACT NUMBER VALIDATION ===== */
        if (mobile === '') {
            f_error(contactno, "contact number is required");
        } else if (!mobile.match(/^[0-9]{10}$/)) {
            f_error(contactno, "contact number is invalid");
        } else if (mobile.charAt(0) < 6) {
            f_error(contactno, "contact number is invalid");
        } else {
            f_success(contactno, "");
        }

        /* ===== PASSWORD VALIDATION ===== */
        if (pass === '') {
            f_error(reg_password, "password is required");
        } else if (!pass.match(/^[A-Za-z0-9!@#$&*_+./]{5,30}$/)) {
            f_error(reg_password, "password is invalid");
        } else {
            f_success(reg_password, "");
        }

        /* ===== CONFIRM PASSWORD VALIDATION ===== */
        if (con_pass === '') {
            f_error(confirmpassword, "password is required");
        } else if (!con_pass.match(/^[A-Za-z0-9!@#$&*_+./]{2,30}$/)) {
            f_error(confirmpassword, "password is invalid");
        } else if (!con_pass.match(pass)) {
            f_error(confirmpassword, "password did not match");
        } else {
            f_success(confirmpassword, "");
        }

        success(u_name, u_email, mobile, pass, con_pass);
    }

    function f_error(input, error) {
        const f_group = input.parentElement;
        const small = f_group.querySelector("small");
        f_group.className = "form-group error";
        console.log(f_group.className);
        small.innerText = error;
    }

    function f_success(input, s_msg) {
        const f_group = input.parentElement;
        const small = f_group.querySelector("small");
        f_group.className = "form-group success";
        console.log(f_group.className);
        small.innerText = s_msg;
    }

});


/* ============================== PASSWORD UPDATION VALIDATION AND PASSING DATA BY AJAX ================================= */
function upd_pass()
{
    const form = document.getElementById("reset_form");
    const otp = document.getElementById("valid_otp");
    const pass1 = document.getElementById("new_pass");
    const pass2 = document.getElementById("con_new_pass");

    
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        rec_pass();
    });

    const rec_pass = () => {
        const r_otp = valid_otp.value.trim();
        const n_pass = new_pass.value.trim();
        const cn_pass = con_new_pass.value.trim();

        if (r_otp === '') {
            error(valid_otp, 'otp required');
        }
        else if (!r_otp.match(/^[0-9]{5}$/)) {
            error(valid_otp, 'invalid OTP');
        }
        else {
            success(valid_otp, '');
        }

        if (n_pass === '') {
            error(new_pass, 'otp required');
        }
        else if (!n_pass.match(/^[A-Za-z0-9!@#$&*_+./]{5,30}$/)) {
            error(new_pass, 'invalid OTP');
        }
        else {
            success(new_pass, '');
        }

        
        if (cn_pass === '') {
            error(con_new_pass, 'password confirmation required');
        }
        else if (!cn_pass.match(/^[A-Za-z0-9!@#$&*_+./]{5,30}$/)) {
            error(con_new_pass, 'Invalid Password');
        }
        else if (!cn_pass.match(new_pass)) {
            error(con_new_pass, 'Password did not match');
        }
        else {
            success(con_new_pass, '');
        }
        proceed(r_otp , n_pass , cn_pass);
    }


    function error(input , errorMsg)
    {
        const fg = input.parentElement;
        const small = fg.querySelector("small");
        fg.className = "form-group error";
        small.innerText = errorMsg; 
    }
    function success(input , successMsg)
    {
        const fg = input.parentElement;
        const small = fg.querySelector("small");
        fg.className = "form-group success";
        small.innerText = successMsg; 
    }

    const proceed = (r_otp , n_pass , cn_pass) =>{
       let fg = document.getElementsByClassName("form-group");
       var count = fg.length - 1;
       for(var i=0; i<fg.length ; i++)
       {
           if(fg[i].className === "form-group success")
           {
               sRate = 0+i;
               sendData(r_otp , n_pass , cn_pass, count , sRate);
           }
           else
           {
               return false;
           }
       }
    }

    const sendData = (r_otp , n_pass , cn_pass, count , sRate) =>{
        if(sRate === count)
        {
            $.ajax({
              url : "action.php",
              method : "POST",
              data : { otp : r_otp , pass : n_pass , c_pass : cn_pass},
              success : function(response)
              {
                 $("#response").html(response);
              },
              error : function(response)
              {
                $("#response").html(response);
              }
            });
        }
    }
}

/* ======================================================= PAYMENT METHOD VALIDAYION AND DATA PASSING ====================================================== */

