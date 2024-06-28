<html>

<body>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .losecontainer {
            width: 80vmin;
            position: absolute;
            transform: translate(-50%, -50%);
            top: 70%;
            left: 27%;
            overflow: hidden;
            border: 15px solid yellowgreen;
            border-radius: 8px;
            box-shadow: 10px 25px 30px rgba(30, 30, 200, 0.3);
            border-style: double;

        }

        .wrapper {
            width: 100%;
            display: flex;
            animation: slide 10s infinite;
        }

        @media screen and (max-width: 600px) {
            .losecontainer{
                transform: none;
                position: unset;
                margin: 20px auto;
            }
        }

        @keyframes slide {
            0% {
                transform: translate(0);
            }

            25% {
                transform: translate(0);
            }

            30% {
                transform: translate(-100%);
            }

            50% {
                transform: translate(-100%);
            }

            55% {
                transform: translate(-200%);
            }

            75% {
                transform: translate(-200%);
            }

            80% {
                transform: translate(-300%);
            }

            100% {
                transform: translate(-300%);
            }

        }

        img {
            width: 100%;
        }

        /* Text-Box */
        .card {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            align-items: center;
            /* background: #474747; */
            width: 550px;
            background: #232323;
            box-shadow: 0px 2px 21px rgba(0, 0, 0, 0.25);
            border-radius: 26px;
            overflow: hidden;
            margin-top: 5%;
            margin-left: 52%;
        }

        @media screen and (max-width: 600px){
            .card{
                width: 80%;
                margin: 0 auto;
            }
        }

        .description {
            color: blanchedalmond;
            background: transparent;
            box-shadow: 0px 2px 21px rgba(0, 0, 0, 0.25);
            border-radius: 26px;
            padding: 40px;
            z-index: 2;
            transition: all 0.5s ease-in-out;

        }

        .circle-top,
        .circle-bottom {
            position: absolute;
            width: 70px;
            height: 70px;
            background: yellowgreen;
            border-radius: 50%;
            transition: all 0.5s ease-in-out;
        }

        .circle-top {
            top: -10px;
            left: -10px;
        }

        .circle-bottom {
            bottom: -10px;
            right: -10px;
        }

        .card:hover .circle-top,
        .card:hover .circle-bottom {
            transform: scale(12);
        }

        .card:hover .description ul,
        .card:hover .description h1,
        .card:hover .description li {
            color: darkblue;
        }

        /* .description ul,li{
            color: yellow;
        } */
        .li-color {
            color: salmon;

        }

        .description h1 {
            font-size: larger;
        }

        /* .container-flex{
        margin-left: 0;
      } */
    </style>

</body>
<div id="page3" class="hidden">
    <div class="losecontainer">
        <div class="wrapper">
            <img src="/assets/images/c5.jpg">
            <img src="/assets/images/c2.jpg">
            <img src="/assets/images/c7.jpg">
            <img src="/assets/images/s5.jpg">
            <img src="/assets/images/c5.jpg">
            <img src="/assets/images/g1.jpg">
        </div>
    </div>
    <div class="container-flex">
        <div class="card">
            <div class="circle-top">
            </div>
            <div class="circle-bottom">
            </div>
            <div class="description">
                <center>
                    <h1><B>"အ‌ပျောက်လျှောက်ထားရန်"</B></h1>
                </center>
                <br>

                <ul class="li-color">
                    <center>
                        <li><b>မော်တော်ယာဉ်မှတ်ပုံတင်စာအုပ်ပျောက်လျှောက်ထားရန်</b></li>
                    </center>
                    <li>&#9679;မော်တော်ယာဉ်မှတ်ပုံတင်သက်သေခံလက်မှတ်</li>
                    <li>&#9679;လက်ရှိပိုင်ရှင်၏မှတ်ပုံတင် ၊ သန်းခေါင်စာရင်းနှင့်</li>
                    <li>&#9679;ရဲစခန်းထောက်ခံချက်တို့ယူဆောင်လာပြီး</li>
                    <li>&#9679;ယာဉ်စစ်ဆေးရန်လိုအပ်ပါသည်။</li><br>

                    <center>
                        <li><b> မော်တော်ယာဉ်မှတ်ပုံတင်သက်သေခံလက်မှတ်ပျောက်လျှောက်ထားရန်</b> </li>
                    </center>
                    <li>&#9679;မော်တော်ယာဉ်မှတ်ပုံတင်စာအုပ်</li>
                    <li>&#9679;လက်ရှင်ပိုင်ရှင်၏မှတ်ပုံတင် ၊ သန်းခေါင်စာရင်းနှင့်</li>
                    <li>&#9679;ယာဉ်ထိန်းထောက်ခံချက်တို့ယူဆောင်လာပြီး</li>
                    <li>&#9679;ယာဉ်စစ်ဆေးရန်လိုအပ်ပါသည်။</li>
                </ul>

            </div>
        </div>
    </div>
</div>

</html>