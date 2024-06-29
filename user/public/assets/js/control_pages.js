const urlParams = new URLSearchParams(window.location.search);
const page_id = urlParams.get('p');
if (page_id == null) {
    showPage("home");
} else {
    showPage(page_id);
}

if (localStorage.getItem("sub_parent")) {
    document.getElementById(localStorage.getItem("sub_parent")).classList.add("bg-black");
    document.getElementById(localStorage.getItem("sub_parent")).classList.add("text-white");
}

const news_id = urlParams.get('news_id');
if (news_id) {
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
    const main_tabs = [
        "home",
        "news",
        "reviews",
        "profile",
        "history"
    ];
    main_tabs.forEach(tab => {
        if(display_id === tab ){
            const sub_parents = [
                "sub_parent1",
                "driving-tab"
            ];
            sub_parents.forEach( tab => {
                document.getElementById(tab).classList.contains("bg-black") && document.getElementById(tab).classList.remove("bg-black");
                document.getElementById(tab).classList.contains("text-white") && document.getElementById(tab).classList.remove("text-white");
                localStorage.removeItem("sub_parent");
            });
        }
    })

    if (display_id === "profile") {
        if (document.getElementById("profile-tab").innerText === "Login") {
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
            const sub_tab = document.querySelector(`#${tab.id} a`);
            if (sub_tab) {
                console.log(sub_tab);
                !sub_tab.classList.contains("text-white") && sub_tab.classList.add("text-white");
            }
            !tab.classList.contains("text-white") && tab.classList.add("text-white");
        } else {
            element.classList.add("hidden");
            tab.classList.remove("bg-black");
            tab.classList.contains("text-white") && tab.classList.remove("text-white");
            !tab.classList.contains("text-black") && tab.classList.add("text-black");
        }
    });

    // Update the URL without reloading the page
    window.history.pushState({}, '', '/home?p=' + display_id);
    const vehicle_sub = document.getElementById('vehicle_license_sub');
    const driving = document.getElementById('driving_sub');
    !vehicle_sub.classList.contains("hidden") && vehicle_sub.classList.add("hidden");
    !driving.classList.contains("hidden") && driving.classList.add("hidden");
}

