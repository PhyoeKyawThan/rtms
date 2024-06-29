function openNav() {
    const nav_items = document.getElementById("nav-items");
    (nav_items.classList.contains("hidden") ?
        nav_items.classList.remove("hidden") :
        nav_items.classList.add("hidden"));
}

<<<<<<< HEAD
function openSubNav(sub_nav_id) {
=======
function openSubNav(sub_nav_id, sub_parent) {
    localStorage.setItem("sub_parent", sub_parent);
>>>>>>> d9eecb5 ([add] date filter in vehicle and table showing in dashboard)
    const sub_nav = document.getElementById(sub_nav_id);
    const navs = [
        "vehicle_license_sub",
        "driving_sub"
    ];
    // console.log(sub_nav_id === navs[0])
    const close = navs.filter( nav => nav != sub_nav_id);
    // console.log(close)
    document.getElementById(close[0]).classList.add("hidden");
    (sub_nav.classList.contains("hidden") ?
        sub_nav.classList.remove("hidden") :
        sub_nav.classList.add("hidden"));
}

// function closeSubNav(){
//     const sub_navs = ["driving_sub", "vehicle_license_sub"];
//     sub_navs.forEach( sub_id => {
//         let sub = document.getElementById(sub_id);
//         if(!sub.classList.contains("hidden")){
//             sub.classList.add("hidden");
//         }
//     })
    
// }
<<<<<<< HEAD
=======
// function showNews(){
//     document.getElementById(localStorage.getItem("sub_parent")).classList.remove("bg-black");
//     document.getElementById(localStorage.getItem("sub_parent")).classList.remove("text-white");
// }
>>>>>>> d9eecb5 ([add] date filter in vehicle and table showing in dashboard)

function closeResult(result_id) {
    document.getElementById(result_id).classList.add("hidden");
    document.getElementById("news").classList.remove("hidden");
}

function enableTextField(event) {
    event.target.disabled = false;
}

async function getData() {
    const v_number = document.getElementById("vehicle-license").value;
    const return_info = document.getElementById("return-info");
    if (v_number != "") {
        try {
            const response = await fetch(
                "/vehicles/check_vehicle?v_number=" + v_number
            );
            if (response.ok) {
                const data = await response.json();
                if (data.success) {
                    const info = data.data;
                    return_info.innerHTML = `<div class="info "><div class="name"><b>အမည် - </b>${info.name}</div>
        <div class="exp-date"><b>ယာ‌‌ဉ်လိုင်စင်လက်ကျန် သက်တမ်း - </b>${info.exp_date}</div>
        <div class="fee">သက်တမ်းတိုးရန် ကျသင့်ငွေ - ${info.fees_for_renew}</div></div>`;
                } else {
                    return_info.innerHTML = `သင်ထည့်သော ယာဉ်လိုင်စင်နံပါတ် 
          <b>မှားယွန်းနေပါသည် ( သို့ ) ဖျက်သိမ်းခြင်းခံခဲ့ရပါသည် </b> 
          ကျေးဇူးပြု၍ မှန်ကန်သော ယာဉ်လိုင်စင်သာ အသုံးပြုပါရန်`;
                }
            }
        } catch (e) {
            console.error(e);
        }
    }
}

// const requirement_check = document.getElementById("requirements");
// const requirements_datas = {
//     A: "A for A",
//     B: "B for B",
//     C: "C for C",
//     D: "D for D",
// }
// requirement_check.addEventListener("change", ()=>{
//     document.getElementById("requirement-display").innerHTML = requirement_check.value != "" ? requirements_datas[requirement_check.value]: "";
// })

async function getDrivingData() {
    const type = document.getElementById("type").value;
    const card_number = document.getElementById("card-number").value;
    const return_info = document.getElementById("driving-cost");
    if (type != "" || card_number != "") {
        try {
            const response = await fetch(
                `/driving/card_cost?card_no=${card_number}&license_type=${type}`
            );
            if (response.ok) {
                const data = await response.json();
                if (data.success) {
                    const info = data.data;
                    return_info.innerHTML = `<div class="info "><div class="name"><b>အမည် - </b>${info.name}</div>
        <div class="exp-date"><b>ယာ‌‌ဉ်လိုင်စင်လက်ကျန် သက်တမ်း - </b>${info.exp_date}</div>
        <div class="fee">သက်တမ်းတိုးရန် ကျသင့်ငွေ - ${info.fees_for_renew}</div></div>`;
                } else {
                    return_info.innerHTML = `<div>သင်ထည့်သော ကဒ်နံပါတ် 
          <b>မှားယွန်းနေပါသည် ( သို့ ) ဖျက်သိမ်းခြင်းခံခဲ့ရပါသည် </b> 
          ကျေးဇူးပြု၍ မှန်ကန်သော ကဒ်နံပါတ်သာ အသုံးပြုပါရန်</div>`;
                }
            }
        } catch (e) {
            console.error(e);
        }
    }
}