<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loader Test</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

:root {
    --first-color: #12192c;
    --text-color: #8590ad;

    --body-font: 'Roboto', sans-serif;
    --big-font-size: 2rem;
    --normal-font-size: .938rem;
    --smaller-font-size: .875rem;
}

@media screen and (min-width: 768px) {
    :root {
        --big-font-size: 2.5rem;
        --normal-font-size: 1rem;
    }
}

*,::before,::after { box-sizing: border-box; }

body {
    margin: 0;
    padding: 0;
    font-family: var(--body-font);
    color: var(--first-color);
}

h1 { margin: 0; }
a { text-decoration: none; }
img { max-width: 100%; height: auto; }

.l-form {
    position: relative;
    height: 100vh;
    overflow: hidden;
}

.shape1, .shape2 {
    position: absolute;
    width: 200px;
    height: 200px;
    border-radius: 50%;
}

    .shape1 {
        top: -7rem;
        left: -3.5rem;
        background: linear-gradient(180deg, var(--first-color) 0%, rgba(196, 196, 196, 0) 100%);
    }

    .shape2 {
        bottom: -6rem;
        right: -5.5rem;
        background: linear-gradient(180deg, var(--first-color) 0%, rgba(196, 196, 196, 0) 100%);
        transform: rotate(180deg);
    }

.form {
    height: 100vh;
    display: grid;
    justify-content: center;
    align-items: center;
    padding: 0 1rem;
}

.form-content { width: 290px; }
.form-img { display: none; }

.form-title {
    font-size: var(--big-font-size);
    font-weight: 500;
    margin-bottom: 2rem;
}

.form-div {
    position: relative;
    display: grid;
    grid-template-columns: 7% 93%;
    margin-bottom: 1rem;
    padding: 0.25rem 0;
    border-bottom: 1px solid var(--text-color);
}

    .form-div.focus { border-bottom: 1px solid var(--first-color); }

.form-div-one { margin-bottom: 3rem; }
.form-icon {
    font-size: 1.5rem;
    color: var(--text-color);
    transition: .3s;
}

    .form-div.focus .form-icon { color: var(--first-color); }

.form-label {
    display: block;
    position: absolute;
    left: 0.75rem;
    top: 0.25rem;
    font-size: var(--normal-font-size);
    color: var(--text-color);
    transition: .3s;
}

    .form-div.focus .form-label {
        top: -1.5rem;
        font-size: .875rem;
        color: var(--first-color);
    }

.form-div-input { position: relative; }

.form-input {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
    outline: none;
    background: none;
    padding: 0.5rem .75rem;
    font-size: 1.2rem;
    color: var(--first-color);
    transition: .3s;
}

.form-forgot {
    display: block;
    text-align: right;
    margin-bottom: 2rem;
    font-size: var(--normal-font-size);
    color: var(--text-color);
    font-weight: 500;
    transition: .5s;
}

    .form-forgot:hover { color: var(--first-color); }

.form-button {
    width: 100%;
    padding: 1rem;
    font-size: var(--normal-font-size);
    outline: none;
    border: none;
    margin-bottom: 3rem;
    background-color: var(--first-color);
    color: #fff;
    border-radius: .5rem;
    cursor: pointer;
    transition: .3s;
}

    .form-button:hover { box-shadow: 0px 15px 36px rgba(0, 0, 0, .15); }

.form-social { text-align: center; }

.form-social-text {
    display: block;
    font-size: var(--normal-font-size);
    margin-bottom: 1rem;
}

.form-social-icon {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 30px;
    height: 30px;
    margin-right: 1rem;
    padding: 0.5rem;
    background-color: var(--text-color);
    color: #fff;
    font-size: 1.25rem;
    border-radius: 50%;
    transition: .5s;
}

    .form-social-icon:hover { background-color: var(--first-color); }

@media screen and (min-width: 968px) {
    .shape1 {
        width: 400px;
        height: 400px;
        top: -11rem;
        left: -6.5rem;
    }

    .shape2 {
        width: 300px;
        height: 300px;
        right: -6.5rem;
    }

    .form {
        grid-template-columns: 1.5fr 1fr;
        padding: 0 2rem;
    }

    .form-content { width: 320px; }
    .form-img {
        display: block;
        width: 700px;
        justify-self: center;
    }
}

</style>


<body>
    <div class="l-form">
        <div class="shape1"></div>
        <div class="shape2"></div>

        <div class="form">
            <img src="https://i.postimg.cc/WbVD3VTV/authentication.png" alt="image" class="form-img">

            <div action="#" class="form-content">
                <h1 class="form-title">Welcome</h1>

                <div class="form-div form-div-one ">
                    <div class="form-icon">
                        <i class='bx bxs-user-circle'></i>
                    </div>

                    <div class="form-div-input">
                        <label for="Username" class="form-label"></label>
                        <input type="text" name="Username" id="Username" placeholder="Username" class="form-input">
                    </div>
                </div>

                <div class="form-div">
                    <div class="form-icon">
                        <i class='bx bx-lock' ></i>
                    </div>

                    <div class="form-div-input">
                        <label for="Password" class="form-label"></label>
                        <input type="password" id="Password" name="Password" placeholder="Password" class="form-input">
                    </div>


                </div>

                 <div class="form-div-input" id="otp-verify" style ="display:none">
                        <input type="text" id="otp" placeholder="Enter OTP" class="form-input">
                </div>

                <a href="#" class="form-forgot">Forgot Password?</a>


                <input type="submit" value="verify" id="submit" class="form-button">

                <div class="form-social">
                    <span class="form-social-text">Or login with</span>

                    <a href="#" class="form-social-icon"><i class='bx bxl-facebook' ></i></a>
                    <a href="#" class="form-social-icon"><i class='bx bxl-google' ></i></a>
                    <a href="#" class="form-social-icon"><i class='bx bxl-instagram' ></i></a>
                </div>

            </div>

        </div>
    </div>
     <div id="page-loader-overlay" class="loader-overlay">
    <div class="loader-content">
        <p>Loading...</p>
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
</div>

<style>
   /* 1. The Full Screen Overlay (Blocks clicks) */
.loader-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Black with 50% opacity */
    z-index: 9999; /* Sit on top of everything */
    display: none; /* Hidden by default */

    /* Flexbox to Center the content */
    display: none; /* Important: jQuery will change this to flex */
    align-items: center;
    justify-content: center;
}

/* 2. The White Box in the Center */
.loader-content {
    background: white;
    padding: 20px 30px;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    text-align: center;
    min-width: 250px;
}

.loader-content p {
    margin: 0 0 10px 0;
    font-weight: 600;
    color: #333;
    font-family: sans-serif;
}

/* 3. The Horizontal Line Animation */
.loader-track {
    width: 100%;
    height: 4px;
    background: #e0e0e0;
    border-radius: 2px;
    overflow: hidden;
    position: relative;
}

.loader-bar {
    position: absolute;
    height: 100%;
    width: 50%;
    background: #4f46e5; /* Indigo color */
    animation: moveLine 1s infinite linear;
}

@keyframes moveLine {
    0% { left: -50%; }
    100% { left: 100%; }
}
</style>

    <script src="main.js"></script>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {

    $("#submit").click(function(e) {
        e.preventDefault();

        var btn = $("#submit");
        var overlay = $("#page-loader-overlay"); // Select the overlay
        var action = btn.val();

        // 1. SHOW OVERLAY (Blocks screen & shows loader)
        // Note: We use .css('display', 'flex') to keep centering working
        overlay.css("display", "flex");

        // Button disable karne ki zarurat nahi hai kyuki overlay click rok lega,
        // par safety ke liye kar sakte ho.
        btn.prop('disabled', true);

        if (action == "verify") {
            // --- OTP VERIFY LOGIC ---
            $.ajax({
                url: "{{ route('otp.verify') }}",
                type: "GET",
                data: { email: $("#username").val() },
                success: function(response) {
                    if (response.status == 1) {
                        $("#otp-verify").show();
                        btn.val("Submit");
                    } else {
                        alert("OTP not sent");
                    }
                },
                error: function() { alert("Error occurred!"); },
                complete: function() {
                    // 2. HIDE OVERLAY
                    overlay.hide();
                    btn.prop('disabled', false);
                }
            });

        } else {
            // --- LOGIN LOGIC ---

            alert($("#otp").val());
            $.ajax({
                url: "{{ route('submit.login') }}",
                type: "GET",
                data: { email: $("#username").val(), password: $("#password").val(), opt:$("#otp").val() },
                success: function(response) {

                    console.log(response);
                    if (response.status == 1) {
                        window.location.href = "admin/dashboard";
                    } else {
                        alert("Please try after some time");
                    }
                },
                error: function() { alert("Error occurred!"); },
                complete: function() {
                    // 2. HIDE OVERLAY
                    overlay.hide();
                    btn.prop('disabled', false);
                }
            });
        }
    });
});
</script>
