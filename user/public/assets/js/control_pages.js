const urlParams = new URLSearchParams(window.location.search);
const page_id = urlParams.get('p');
if (page_id == null) {
    showPage("home");
} else {
    showPage(page_id);
}

<<<<<<< HEAD
const news_id = urlParams.get('news_id');
if(news_id){
=======
if (localStorage.getItem("sub_parent")) {
    document.getElementById(localStorage.getItem("sub_parent")).classList.add("bg-black");
    document.getElementById(localStorage.getItem("sub_parent")).classList.add("text-white");
}

const news_id = urlParams.get('news_id');
if (news_id) {
>>>>>>> d9eecb5 ([add] date filter in vehicle and table showing in dashboard)
    document.getElementById("news-details").classList.remove("hidden");
    document.getElementById("news").classList.add("hidden");
}

function showPage(display_id) {
    const displays = [
        "home",
        "news",
        "vehicle_license_requirement",
        "check_vehicle",
        "check_driving",
        "driving_change_cost",
        "driving_register",
        "reviews",
        "profile",
        "contact",
        "qa",
        "page1",
        "page2",
        "page3",
        // "page4",
        "p1",
        "p2",
        "p3",
        "p4",
        "history"
    ];
<<<<<<< HEAD

    if(display_id === "profile"){
        if(document.getElementById("profile-tab").innerText === "Login"){
=======
    const main_tabs = [
        "home",
        "news",
        "reviews",
        "profile",
        "history"
    ];
    main_tabs.forEach(tab => {
        if (tab === display_id) {
            if (localStorage.getItem("sub_parent")) {
                document.getElementById(localStorage.getItem("sub_parent")).classList.remove("bg-black");
                document.getElementById(localStorage.getItem("sub_parent")).classList.remove("text-white");
                localStorage.removeItem("sub_parent");
            }
        }
    })

    if (display_id === "profile") {
        if (document.getElementById("profile-tab").innerText === "Login") {
>>>>>>> d9eecb5 ([add] date filter in vehicle and table showing in dashboard)
            window.location.href = "/login";
        }
    }

    // Ensure only the selected page is visible
    displays.forEach(display => {
        const element = document.getElementById(display);
        const tab = document.getElementById(display + "-tab");
        const sub = document.querySelector("#" + display + "-tab a");
        // console.log(document.querySelector("#" + display + "-tab a"));
        if (display === display_id) {
            element.classList.remove("hidden");
            tab.classList.add("bg-black");
            console.log(tab.childNodes[0].nodeType)
<<<<<<< HEAD
            const sub_tab= document.querySelector(`#${tab.id} a`);
            if(sub_tab){
=======
            const sub_tab = document.querySelector(`#${tab.id} a`);
            if (sub_tab) {
>>>>>>> d9eecb5 ([add] date filter in vehicle and table showing in dashboard)
                console.log(sub_tab);
                !sub_tab.classList.contains("text-white") && sub_tab.classList.add("text-white");
            }
            !tab.classList.contains("text-white") && tab.classList.add("text-white");
        } else {
            element.classList.add("hidden");
            tab.classList.remove("bg-black");
<<<<<<< HEAD
            
=======
>>>>>>> d9eecb5 ([add] date filter in vehicle and table showing in dashboard)
            tab.classList.contains("text-white") && tab.classList.remove("text-white");
        }
    });

    // Update the URL without reloading the page
    window.history.pushState({}, '', '/home?p=' + display_id);
    const vehicle_sub = document.getElementById('vehicle_license_sub');
    const driving = document.getElementById('driving_sub');
    !vehicle_sub.classList.contains("hidden") && vehicle_sub.classList.add("hidden");
    !driving.classList.contains("hidden") && driving.classList.add("hidden");
}

