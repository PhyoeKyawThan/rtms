
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meTA name="viewport" content="width=device-width,initial-scale=1.0"/>
    <script src="/assets/js/app.js" defer></script>
</head> -->
<!-- <style>
    *{
        display: border-box;
        /* margin: 0;
        padding: 0; */

    }
    body{
        height: 100px;
        font-family: "Montserrat" , sans-serif;
        display: grid;
        place-items: center;
        /* background-image: linear-gradient(45deg, #000  0% ,  darkcyan 50%); */
        /* background-image: url("/assets/images/c7.jpg"); */
        background-repeat: no-repeat;
    }
    .modal-button{
        padding: 15px 30px ;
        background-color: #c05701;
        color: #fff;
        border: none;
        border-radius:  5px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 18px;
        font-weight: bold;
        margin: 4px 2px;
        cursor: pointer;
        width: 100px;
        margin-top: 20%;
    }
.modal{
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
    padding-top: 60px;
}
.modal-content{
    background-color: #ddd;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 40%;
    font-size: 20px;
    margin-top: 15%;

}
.close{
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}
.close:hover,
.close:focus{
    color: #333;
    text-decoration: none;
    cursor: pointer;
    
}

.modal-button1{
        padding: 15px 30px ;
        background-color: #c05701;
        color: #fff;
        border: none;
        border-radius:  5px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 18px;
        font-weight: bold;
        /* margin: 4px 2px; */
        cursor: pointer;
        width: 100px;
        /* margin-top: 20%; */
    }
.modal1{
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
    padding-top: 60px;
}
.modal-content1{
    background-color: #ddd;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 40%;
    font-size: 20px;
    margin-top: 15%;

}
.close1{
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}
.close1:hover,
.close1:focus{
    color: #333;
    text-decoration: none;
    cursor: pointer;
    
}
.image{
position: absolute;
        z-index: -1;
        right: 0;
        bottom: 0;
      

    }
@media(min-aspect-ratio:16/9){
        .image{
            width: 100%;
            height: auto;
            margin-top: 0%;
        }
    } */


</style> -->
<!DOCTYPE html>
<html lang="en">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins","robotoregular" sans-serif;

        }
        .container .cart{
            position: relative;
            width: 300px;
            height: 420px;
            background-color: #fff;
            margin: 20px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
            transition: .5s ease-in-out;
        }
        .container:hover.cart{
            filter: blur(20px);
            transform: scale(.9);
            opacity: .5;
        }
        .container.cart:hover{
            filter: blur(0);
            transform: scale(1);
            opacity: 1;
        }
        .container .cart:hover .circle{
            clip-path:circle(600px) ;
        }
        .container .cart:hover .content p{
            color: yellow;
        }
        .container .cart:hover .content ul{
            color: yellow;
        }
        /* .container .cart:hover .content a{
            box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2),-1px -1px 2px rgba(255, 255, 255, 0.4);

        } */
        /* .container .cart .content a:active{
            box-shadow: inset 1px 1px 1px rgba(0, 0, 0, 0.1),inset 5px 5px 5px rgba(0, 0, 0,0.04)
            ,inset -5px -5px 5px rgba(255, 255, 255, 0.07),inset -1px -1px 2px rgba(255, 255, 255, 0.4);
        } */
        .container .cart .circle {
            position: relative;
            width: 100%;
            height: 100%;
            background: #000;
            clip-path: circle(150px at center 0);
            text-align: center;
            transition: 1s ease-in-out;
        }
        .container .cart h2{
            color: #fff;
            font-size: 2em;
            padding: 30px 0;
        }
        .container .cart .content{
            position: absolute;
            bottom: 10px;
            padding: 20px;
            text-align: center;

        }
        .container .cart .content p, ul {
            color: darkblue;
            transition: 0.5s ease-in-out;
        }
        /* .container .cart .content a{
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            background: #000;
            color: #fff;
            border-radius: 40px;
            text-decoration: none;
            margin-top: 20px;
            transition: 0.8s ease-in-out;
        } */
        .container .cart:nth-child(1) .circle,.container .cart:nth-child(1) .content a{
            background: #da2268;
        }
        .container .cart:nth-child(2) .circle,.container .cart:nth-child(2) .content a{
            background: darkorchid;
        }
        /* @keyframes colorChange{
            0%{
                color: #fff;
            }
            50%{
                color: #b1b493;
            }
            
        } */


        /* body{
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: linear-gradient(45deg,#ffaf00,#bb02ff);
        } */
        .container{
            position: relative;
            width: 1150px;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }
        .content ul{
            text-align: left;
        }
        .body-color{
            background: linear-gradient(45deg,pink,#b39ddb);
            /* background-image: url(/assets/images/c7.jpg);
            background-repeat: no-repeat;
            width: 300%;
            height: 300%; */

        }
    </style>
<body>
<div id="page2" class=" body-color hidden">      
<div class="container">
    <div class="cart">
        <div class="circle">
            <h2>အမည်ပြောင်း</h2>
        </div>
        <div class="content">
            <p><b>အမည်ပြောင်းလဲလိုလျှင်<br>အောက်ပါအချက်များယူဆောင်လာရန်လိုအပ်ပါသည်။</b>
                <ul>
                <br><li>&#9679;အခွန်စာရွက်</li>
                <li>&#9679;စာချုပ်</li>
                <li>&#9679;သန်းခေါင်စာရင်း(ဟင်္သာတခရိုင်အတွင်းသာ)</li>
                <li>&#9679;မှတ်ပုံတင်မူရင်း(ဟင်္သာတခရိုင်အတွင်းသာ)</li>
                </ul>
            </p>
            <!-- <a href="#">Read More</a> -->
        </div>
    </div>

    <div class="cart">
        <div class="circle">
            <h2>စက်ပြောင်း၊<br>ဆေးပြောင်း</h2>
        </div>
        <div class="content">
            <p><b>အရောင်ပြောင်း/စက်ပြောင်း/ဆေးပြောင်းမည်ဆိုလျှင်<br>အောက်ပါအချက်များယူဆောင်လာရန်လိုအပ်ပါသည်။</b>
                <ul>
                <br><li>&#9679;မော်တော်ယာဉ်မှတ်ပုံတင်စာအုပ်</li>
                <li>&#9679;မော်တော်ယာဉ်မှတ်ပုံတင်သက်သေခံလက်မှတ်နှင့်တကွ</li>
                <li>&#9679;ယာဉ်စစ်ဌာနတွင်ယာဉ်စစ်ဆေးရန်လိုအပ်ပါသည်။</li>
                </ul></p>
            <!-- <a href="#">Read More</a> -->
        </div>
    </div>
</div>
<!-- <img src="/assets/images/c7.jpg" class="image">
       
<button id="modalBtn" 
class="modal-button">open</button>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>ျ်‌ေိ့ျု‌ြေမူနတုမစ</p>
    </div>
</div>

<button id="modalBtn1" 
class="modal-button1">open</button>
<div id="myModal1" class="modal1">
    <div class="modal-content1">
        <span class="close1">&times;</span>
        <p>ျ်‌ေိ့ျု‌ြေမူနတုမစ</p>
    </div>
</div>
         -->
</div>
</body>
</html>