setTimeout(() => {
    document.getElementById("message").style.display = "none";
}, 2000);
//redirect to
function newPage(url) {
    window.location.href = url;
}

// vehicle type tabs
function vehicle_tab() {
    const v_row = Array.from(document.querySelectorAll("#vehicle-table-body tr"));
    const v_body = document.getElementById("vehicle-table-body");
    const v_tabs = Array.from(document.querySelectorAll("#vehicle-tabs button"));
    v_tabs.forEach(tab => {
        tab.addEventListener("click", () => {
            const other_tabs = v_tabs.filter(o_tab => o_tab !== tab);
            other_tabs.forEach(o_tab => {
                o_tab.classList.remove("bg-sky-800");
                o_tab.classList.add("bg-sky-600");
            });
            tab.classList.remove("bg-sky-600");
            tab.classList.add("bg-sky-800");
            const data_to_show = v_row.filter(row => row.id === tab.id);
            if (tab.innerText === "All") {
                v_row.forEach(row => v_body.appendChild(row));
            } else {
                v_body.innerHTML = "";
                document.querySelector("#total-vehicles span").innerText = data_to_show.length;
                data_to_show.forEach(data => {
                    v_body.appendChild(data);
                })
            }

        });
    });
    v_tabs[0].click();
}

vehicle_tab();


// function for opening tabs
function showPage(display_id, tab_id) {
    const displays = ['dashboard', 'vehicles', 'driving', 'news', 'user', 'pending_driving', 'manual', 'contact', 'user-contact', 'expired_vehicles'];
    const tabs = ['dashboard-tab', 'vehicles-tab', 'driving-tab', 'news-tab', 'user-tab', 'pending_driving-tab', 'manual-tab', 'contact-tab', 'user-contact-tab', 'expired_vehicles-tab'];
    const tabs_to_close = tabs.filter(tab => tab != tab_id);
    const displays_to_close = displays.filter(display => display != display_id);
    tabs_to_close.forEach(tab => {
        document.getElementById(tab).classList.remove('bg-gray-600');
        document.getElementById(tab).classList.add('text-gray-600');
        document.getElementById(tab).classList.remove('text-white');
    });
    displays_to_close.forEach(display => document.getElementById(display).classList.add('hidden'));
    document.getElementById(tab_id).classList.add('bg-gray-600');
    document.getElementById(tab_id).classList.add('text-white');
    document.getElementById(display_id).classList.remove('hidden');
    window.history.pushState({}, '', '/home?p=' + display_id);
}

// default open page
const urlParams = new URLSearchParams(window.location.search);
const page_id = urlParams.get('p');
if (page_id == null) {
    showPage("dashboard", 'dashboard-tab');
} else {
    showPage(page_id, page_id + '-tab');
}

// pie datas
// Data for the pie chart
// calculate percentage 
function get_rate(type_count, all_count) {
    return (Number(type_count) / Number(all_count)) * 100;
}
let rate = [];
let count_s = [];
async function get_vehicle_count() {
    try {
        const response = await fetch("/get_count");
        if (response.ok) {
            const counts = await response.json();
            let labels = [];
            let datas = [];
            let all_count = 0;
            Object.values(counts).forEach((count) => all_count += count);
            Object.keys(counts).forEach(type => {
                labels.push(`${type} - ${get_rate(counts[type], all_count)}%`);
                rate.push(get_rate(counts[type], all_count))
                count_s.push(counts[type]);
                datas.push(counts[type]);
            })
            const data = {
                "labels": labels,
                "datas": datas
            }
            return data;
        } else {
            throw new Error('Failed to fetch data');
        }
    } catch (err) {
        console.error(err);
        return {
            "labels": [
                'ဆိုင်ကယ် - 0',
                'သုံးဘီး - 0',
                'ထော်လာဂျီ - 0',
                'ကား - 0'
            ],
            "datas": [0, 0, 0, 0]
        };
    }
}

async function get_datas() {
    const datas = await get_vehicle_count();
    let index = 0;
    document.querySelectorAll("#percentage").forEach(percentage => {
        percentage.innerText = rate[index] + "%";
        index++;
    });
    index = 0;
    document.querySelectorAll("#count").forEach( count => {
        count.innerText = count_s[index];
        index++;
    });
    index = 1;
    document.querySelectorAll("#v-count").forEach( v_count => {
        v_count.innerText = index;
        index++;
    })
    const data = {
        labels: datas.labels,
        datasets: [{
            data: datas.datas,
            backgroundColor: ['#ff6384', '#36a2eb', '#ffcd56', '#4bc0c0']
        }]
    };

    // Get the context of the canvas element
    const ctx = document.getElementById('pieChart').getContext('2d');

    // Create a new pie chart
    const pieChart = new Chart(ctx, {
        type: 'pie',
        data: data,
    });
};
get_datas();

// news fetch
document.addEventListener("DOMContentLoaded", function () {
    const dateInput = document.getElementById("news-date");
    const tableBody = document.querySelector("#news-tbody");
    const totalNews = document.getElementById("total-news");

    dateInput.addEventListener("change", function () {
        const selectedDate = dateInput.value;
        fetchNews(selectedDate);
    });

    function fetchNews(date) {
        let url = '/search/search_news_by_date?date=';
        if (date) {
            url += `${date}`;
        }

        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data.status === "found") {
                    updateTable(data.datas);
                    totalNews.textContent = `Total News - ${data.datas.length}`;
                } else {
                    tableBody.innerHTML = '<tr><td colspan="4" class="text-center font-bold text-gray-800 p-5">No News Found</td></tr>';
                    totalNews.textContent = 'Total News - 0';
                }
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    function updateTable(news) {
        tableBody.innerHTML = '';
        news.forEach((item, index) => {
            const row = document.createElement("tr");
            row.classList.add("bg-gray-300");

            row.innerHTML = `
                <td class="text-center font-bold text-white p-5 bg-slate-500">${index + 1}</td>
                <td class="text-center font-bold text-white p-5 bg-slate-500">${item.title}</td>
                <td class="text-center font-bold text-white p-5 bg-slate-500">${item.date}</td>
                <td class="text-center font-bold text-white p-5 bg-slate-500 flex justify-center">
                    <button class="bg-blue-500 m-5 hover:bg-blue-600 text-white px-4 py-2 rounded-md flex items-center" onclick="newPage('/view_news?id=' + ${item.news_id})">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L8 9.172 7.293 8.464 2 14.828 1.172 16 4 16l6-6 .707-.707L14.828 5a2 2 0 000-2.828l-1.414-1.414z" />
                        </svg>
                    </button>
                    <button class="bg-red-500 m-5 hover:bg-red-600 text-white px-4 py-2 rounded-md flex items-center" onclick="newPage('/action/delete_news?id=' + ${item.news_id})">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 4a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2H5zm3.293 4.293a1 1 0 011.414 0L10 8.586l1.293-1.293a1 1 0 111.414 1.414L11.414 10l1.293 1.293a1 1 01-1.414 1.414L10 11.414l-1.293 1.293a1 1 01-1.414-1.414L8.586 10 7.293 8.707a1 1 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </td>
            `;

            tableBody.appendChild(row);
        });
    }

    // Initial fetch for all news
    fetchNews('');
});

