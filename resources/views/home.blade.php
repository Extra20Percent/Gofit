<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous" defer></script>
    <title>GoFit</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        #leftimage {
            height: 89%;
            position: absolute;
            bottom: 0;
            left: -100px;
            filter: grayscale(100%);
            animation: leftHeroImage 1s;
        }

        @keyframes leftHeroImage {
            0% {left: -10000px;}
            100% {left: -100px;}
        }

        @keyframes rightHeroImage {
            0% {right: -10000px;}
            100% {right: -100px;}
        }

        #rightimage {
            height: 90%;
            position: absolute;
            bottom: 0;
            right: -10vw;
            filter: grayscale(100%);
            animation: rightHeroImage 1s;
        }

        #background {
            background-image: url('assets/gymDepan.jpg');
            background-position:center;
            background-size: cover;
        }

        .hoverBrand {
            color: white;
            text-decoration: none;
            font-size: 4rem;
            font-family: "Garamond"
        }

        .hoverBrand:hover {
            color: rgb(183, 183, 183);
        }

    </style>
</head>
<body style="overflow-x: hidden;" id="background">
    <div>
        <section>
            
            <div style="width: 100%; height: 100vh; position: relative; padding-left: 5vw" >
                
                <div style="text-align: center; padding-top: 5vh;">
                    <h1 class="text-white" style="margin-top: 20vh">Selamat Datang Di Website GOFIT</h1> 
                    <a href="/login" class="text-white btn btn-outline-secondary" style="padding: 1vw 3vw; margin-bottom: 4vh; margin-top:4vh; ">Login</a>
                    
                </div>
            </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>