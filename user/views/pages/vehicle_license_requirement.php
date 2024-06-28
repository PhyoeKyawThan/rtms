<!-- <h3 class="text-xl text-center font-bold text-sky-800">Requirements TO GET vehicle-license</h3>
    <div class="requirements">
        <label for="requirements">Requirements</label>
        <select id="requirements" class="p-2 bg-sky-600 text-sky-100 font-bold rounded-xl m-2">
            <option value="">Choose</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select>
        <div class="text-md font-bold p-5" id="requirement-display"></div>
    </div> -->

<style>
    * {


        margin: 4;

        padding: 0;

        /* box-sizing: border-box; */
        font-family: "poppins", sans-serif;

    }

    .product {

        width: 80%;

        /* margin: auto; */

    }

    .product h2 {
        text-align: center;

        font-size: 30px;

        margin-top: 5%;

    }

    .product span {
        /* text-align: center; */
        color: darkblue;


    }

    .col {

        margin-top: 50px;
        flex-basis: 5px;
        padding: 10px;
        width: 200px;
        margin-bottom: 50px;
        text-align: center;
        cursor: pointer;
        transition: 0.5s;
    }

    .col:hover {

        transform: translateY(9px);

    }


    .col img {
        width: 200px;
        box-shadow: 3px 3px 5px rgba(255, 0, 191, 0.502), -3px -3px 5px rgba(0, 217, 255, 0.5);
    }



    .row {

        display: flex;
        align-items: left;
        justify-content: space-between;
        Flex-wrap: wrap;
    }



    .colors {



        display: flex;

        align-items: center;

        justify-content: center;
    }

    .colors span {



        width: 50px;

        height: 25px;

        background: var(--i);

        margin: 5px;

        border-radius: 50%;
    }

    #text1 {
        text-align: left;
        display: none;
    }

    #text2 {
        text-align: left;
        display: none;
    }

    #text3 {
        text-align: left;
        display: none;
    }

    #text4 {
        text-align: left;
        display: none;
    }

    @media screen and (max-width: 600px) {
        .row{
            display: block;
        }
        .col{
            width: 90%;
        }
    }
</style>

<div id="vehicle_license_requirement" class="hidden h-full p-5">
    <!--------produit populaire----->
    <div class="product m-auto">
        <h2><span><b>မော်တော်ယာဉ်လိုင်စင်သက်တမ်းတိုးရန်လိုအပ်သည်များ</b></span></h2>
        <div class="row">
            <div class="col">
                <img src="/assets/images/cnew.jpg" alt="Click me" id="clickableImage1" style="cursor:pointer;">
                <h4>မော်တော်ကား</h4>
                <div class="colors">
                    <span style="--i: #f612ae"></span>
                    <span style="--i: #12f638"></span>
                    <span style="--i: #12bdf6"></span>
                    <span style="--i: #f6ee12"></span>
                    <span style="--i: #f61212"></span>
                </div>
                <p><b><span>ယူဆောင်လာရန်လိုအပ်သည်များ</span></b></p>

                <table id="text1">
                    <tr>
                        <td style="width: 500px;">&#9670;မော်တော်ယာဉ်မှတ်ပုံတင်စာအုပ် <br>
                            &#9670;မော်တော်ယာဉ်မှတ်ပုံတင်သက်သေခံလက်မှတ်<br>&#9670;စည်ပင်<br>&#9670;အာမခံ<br>
                            &#9670;မှတ်ပုံတင် မူရင်း+မိတ္ထူ (ပိုင်ရှင်)<br>
                            &#9670;"ကိုယ်စားလှယ်ဖြင့် သက်တမ်းတိုးလိုလျှင်
                            ကားပိုင်ရှင်နှင့်ကိုယ်စားလှယ်၏ မှတ်ပုံတင် မူရင်း+မိတ္ထူ နှစ်ခုလုံးယူဆောင်လာပါရန်"</td>
                    </tr>
                </table>
                <script>
                    document.getElementById("clickableImage1").addEventListener("click", function () {
                        var text = document.getElementById("text1");
                        if (text.style.display === "none") {
                            text.style.display = "block";
                        } else {
                            text.style.display = "none";
                        }
                    });
                </script>
            </div>


            <div class="col">
                <img src="/assets/images/s10.jpg" alt="Click me" id="clickableImage2" style="cursor:pointer;">
                <h4>မော်တော်ဆိုင်ကယ်</h4>
                <div class="colors">
                    <span style="--i: #f612ae"></span>
                    <span style="--i: #12f638"></span>
                    <span style="--i: #12bdf6"></span>
                    <span style="--i: #f6ee12"></span>
                    <span style="--i: #f61212"></span>
                </div>
                <p><b><span>ယူဆောင်လာရန်လိုအပ်သည်များ</span></b></p>
                <table id="text2">
                    <tr>
                        <td style="width: 500px;">&#9670;မော်တော်ဆိုင်ကယ်မှတ်ပုံတင်စာအုပ်<br>
                            &#9670;မော်တော်ဆိုင်ကယ်မှတ်ပုံတင်သက်သေခံလက်မှတ်<br>
                            &#9670;စည်ပင်<br>
                            &#9670;အာမခံ<br>
                            &#9670;မှတ်ပုံတင် မူရင်း+မိတ္ထူ (ပိုင်ရှင် သို့မဟုတ် ကိုယ်စားလှယ် တစ်ဦးသာ)</td>
                    </tr>
                </table>
                <script>
                    document.getElementById("clickableImage2").addEventListener("click", function () {
                        var text = document.getElementById("text2");
                        if (text.style.display === "none") {
                            text.style.display = "block";
                        } else {
                            text.style.display = "none";
                        }
                    });
                </script>
            </div>



            <div class="col">
                <img src="/assets/images/tnew.jpg" alt="Click me" id="clickableImage3" style="cursor:pointer;">
                <h4>သုံးဘီးမော်တော်ဆိုင်ကယ်</h4>
                <div class="colors">
                    <span style="--i: #f612ae"></span>
                    <span style="--i: #12f638"></span>
                    <span style="--i: #12bdf6"></span>
                    <span style="--i: #f6ee12"></span>
                    <span style="--i: #f61212"></span>
                </div>
                <p><b><span>ယူဆောင်လာရန်လိုအပ်သည်များ</span></b></p>
                <table id="text3">
                    <tr>
                        <td style="width: 500px;">&#9670;သုံးဘီးမော်တော်ဆိုင်ကယ်မှတ်ပုံတင်စာအုပ်<br>
                            &#9670;သုံးဘီးမော်တော်ဆိုင်ကယ်မှတ်ပုံတင်သက်သေခံလက်မှတ်<br>
                            &#9670;စည်ပင်<br>
                            &#9670;အာမခံ<br>
                            &#9670;မှတ်ပုံတင် မူရင်း+မိတ္ထူ (ပိုင်ရှင် သို့မဟုတ် ကိုယ်စားလှယ် တစ်ဦးသာ)</td>
                    </tr>
                </table>
            </div>




            <div class="col">
                <img src="/assets/images/gnew.jpg" alt="Click me" id="clickableImage4" style="cursor:pointer;">
                <h4>ထရော်လာဂျီယာဉ်</h4>
                <div class="colors">
                    <span style="--i: #f612ae"></span>
                    <span style="--i: #12f638"></span>
                    <span style="--i: #12bdf6"></span>
                    <span style="--i: #f6ee12"></span>
                    <span style="--i: #f61212"></span>
                </div>
                <p><b><span>ယူဆောင်လာရန်လိုအပ်သည်များ</span></b></p>
                <table id="text4">
                    <tr>
                        <td style="width: 500px;">&#9670;ထရော်လာဂျီယာဉ်မှတ်ပုံတင်စာအုပ်<br>
                            &#9670;ထရော်လာဂျီယာဉ်မှတ်ပုံတင်သက်သေခံလက်မှတ်<br>&#9670;စည်ပင်<br>&#9670;အာမခံ<br>
                            &#9670;မှတ်ပုံတင် မူရင်း+မိတ္ထူ (ပိုင်ရှင် သို့မဟုတ် ကိုယ်စားလှယ် တစ်ဦးသာ)</td>
                    </tr>
                </table>
                <script>
                    document.getElementById("clickableImage4").addEventListener("click", function () {
                        var text = document.getElementById("text4");
                        if (text.style.display === "none") {
                            text.style.display = "block";
                        } else {
                            text.style.display = "none";
                        }
                    });
                </script>
            </div>

        </div>

    </div>

</div>
<script>
    document.getElementById("clickableImage3").addEventListener("click", function () {

        var text = document.getElementById("text3");
        if (text.style.display === "block") {
            text.style.display = "none";
        } else {
            text.style.display = "block";
        }
    });
    document.getElementById("clickableImage1").addEventListener("click", function () {

        var text = document.getElementById("text1");
        if (text.style.display === "block") {
            text.style.display = "none";
        } else {
            text.style.display = "block";
        }
    });

    document.getElementById("clickableImage2").addEventListener("click", function () {

        var text = document.getElementById("text2");
        if (text.style.display === "block") {
            text.style.display = "none";
        } else {
            text.style.display = "block";
        }
    });

    document.getElementById("clickableImage4").addEventListener("click", function () {

        var text = document.getElementById("text4");
        if (text.style.display === "block") {
            text.style.display = "none";
        } else {
            text.style.display = "block";
        }
    });
</script>