
<style>

body {
    background: #f6f5f7;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    font-family: 'Montserrat', sans-serif;
    height: 100vh;
    margin: -20px 0 50px;
}

h1 {
    font-weight: bold;
    margin: 0;
    padding:1;
}

span {
    font-size: 12px;
}

a {
    color: #333;
    font-size: 14px;
    text-decoration: none;
    margin: 15px 0;
}


button {
    border-radius: 20px;
    border: 1px solid #FF4B2B;
    background-color: #FF4B2B;
    color: #FFFFFF;
    font-size: 12px;
    font-weight: bold;
    padding: 12px 45px;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: transform 80ms ease-in;
}

button:active {
    transform: scale(0.95);
}

button:focus {
    outline: none;
}

form {
    background-color: #FFFFFF;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 50px;
    height: 100%;
    text-align: center;
}

button.ghost {
    background-color: transparent;
    border-color: #FFFFFF;
}

input {
    background-color: #eee;
    border: none;
    padding: 12px 15px;
    margin: 8px 0;
    width: 100%;
}

.container {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
        0 10px 10px rgba(0,0,0,0.22);
    position: relative;
    overflow: hidden;
    width: 368px;
    max-width: 100%;
    min-height: 180px;
}

.form-container {
    position: absolute;
    top: 0;
    height: 100%;
    transition: all 0.6s ease-in-out;
}
</style>


<div class="container" id="container">
<div class="form-container sign-in-container">
    <form id="forgotform">
        <h1>Forget Password</h1>
        <span>To Recover Your Password, Please Write Your Email Address Below</span>

        <input id="email" type="email" placeholder="Email" />

        <button>RESET PASSWORD</button>
    </form>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/common.js"  type="text/javascript"></script>
<script>
$(document).on('submit', '#forgotform', function (e) {
    e.preventDefault();
    let email = $('#email').val();
    if (email == '') {
        alert('Please enter valid email');
        return false;
    } else {
        let data_array = {};
        data_array['email'] = email;
        let params = {
            'url': "<?php echo base_url(); ?>" + 'login/forgotPassword',
            'requestType': "POST",
            'data': data_array
        }
        let response = doAjax(params, function (err, res) {
            if (res.success === true) {
                window.location.href = "<?php echo base_url(); ?>" + 'Home/otp/' + res.userId;
            } else {
                alert(res.message);
            }
        })
    }

});
</script>