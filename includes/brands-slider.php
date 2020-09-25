<hr>
<div class="news-letter">
    <h3 class="text-center text-dark text-uppercase font-weight-bold" style="font-family:cursive;">subscribe
        for the latest updates</h3>
    <div class="row">
        <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <form id="user_sub">
                    <p id="msg"></p>
                     <div style="text-align:center"> 
					 <div class="form-group" style="font-family:cursive;">
                        <input type="email" class="form-control" id="subs" placeholder="subscribe for the latest news"
                            autocomplete="off" required style="text-align:center;">
                        <small></small>
                    </div>
					 </div>
                    <div style="text-align:center;">
                        <button type="submit" class="btn btn-success btn-rounded">subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<hr>
<script>
const subscriber = document.getElementById("subs");
const form = document.getElementById("user_sub");

form.addEventListener('submit', (e) => {
    e.preventDefault();
    validation();
});

const validation = () => {
    const u_subs = subs.value.trim();

    if (u_subs === "") {
        setError(subs, "An Gmail account is required");
    } else if (!u_subs.match(/^[A-Za-z0-9._]+@[a-zA-Z0-9._]+\.[A-Za-z]{2,3}$/)) {
        setError(subs, "Gmail account is invalid");
    } else {
        setSuccess(subs, '');
    }
    success(u_subs);
}

const success = (u_subs) => {
    let formGroup = document.getElementsByClassName("form-group");
    var count = formGroup.length - 1;
    for (var i = 0; i < formGroup.length; i++) {
        if (formGroup[i].className === "form-group success") {
            sRate = 0 + i;
            sendData(u_subs, sRate, count);
        }
    }
}

const sendData = (u_subs, sRate, count) => {
    if (sRate === count) {
        $.ajax({
            url: 'action.php',
            method: 'POST',
            data: {
                subs: u_subs
            },
            success: function(response) {
                $('#msg').html(response);
            }
        });
    }
}

function setError(input, errormsg) {
    const formGroup = input.parentElement;
    const small = formGroup.querySelector("small");
    formGroup.className = "form-group error";
    small.innerText = errormsg;
}

function setSuccess(input, successmsg) {
    const formGroup = input.parentElement;
    const small = formGroup.querySelector("small");
    formGroup.className = "form-group success";
    small.innerText = successmsg;

}
</script>