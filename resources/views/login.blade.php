<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />                 
    <style type="text/css">  
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: sans-serif;
    }
    
    body {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        background: linear-gradient(#367E18, #86eb5b);

    }
    
    form {
        display: flex;
        flex-direction: column;
        background: #fff;
        text-align: center;
        padding: 20px 25px;
        box-shadow: 0 5px 10px rgba(71, 3, 6, 0.7);
    }
    
    form .title {
        color: #252525;
        font-size: 35px;
        font-weight: 800;
        margin-bottom: 30px;
    }
    
    form label {
        margin-bottom: 35px;
    }
    
    form label .fa-solid {
        font-size: 20px;
        color: #000000;
        margin-right: 10px;
    }
    
    form label input {
        outline: none;
        border: none;
        color: #252525;
        border-bottom: solid 1px #252525;
        padding: 0 5px;
        font-size: 18px;
    }
    
    form label input::placeholder {
        color: rgba(37, 37, 37, 0.5);
    }
    
    
    form .link {
        color: #252525;
        margin-bottom: 15px;
    }
    
    form button {
        color: #fff;
        border: none;
        background-color: black;
        padding: 10px 15px;
        cursor: pointer;
        font-size: 20px;
    }

    </style>

</head>
<body>

    <form action="">
        <img src="logo/logo.png"> 
        <h1 class="title">Login</h1>
        <label>
            <i class="fa-solid fa-user"></i>
            <input placeholder="Correo Electronico" type="text" id="">
        </label>
        <label>
            <i class="fa-solid fa-lock"></i>
            <input placeholder="Contraseña" type="password" id="">
        </label>

        <button id="button">Login</button>
    </form>
    
    <script src="main.js"></script>
</body>
</html>