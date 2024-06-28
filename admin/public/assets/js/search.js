async function search_data(input_id, output_id, search_url){
    const output = document.getElementById(output_id);
    const input = document.getElementById(input_id);
    const response = await fetch(search_url + input.value);
    if(response.ok){
        const response_data = await response.json();
        output.innerHTML = response_data.status === "found" ? `<a class="block bg-white w-60 text-center underline font-bold" href="${response_data.view}">${input.value}</a>`: "<a class='block bg-white w-60 text-center'>Not Found</a>";
    }
}
