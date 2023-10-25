window.addEventListener("load", () => search());

function search(page = 1) {
    if (!page) return;

    const formData = new FormData();
    formData.append("page", page);

    axios.post("/products/allProducts", formData)
        .then(({data : {data}}) => {
            renderPagination(data.links)
        })
        .catch(error => {
            console.log(error);
        });
}

const renderPagination = (links) => {
    document.querySelectorAll(".pagination").forEach(e => e.remove());

    const ul = document.createElement("ul");
    ul.classList.add("pagination");

    links.map(link => {
        const page = link.url && link.url.split("=")[1];

        ul.innerHTML += `
            <li class="page-item ${link.active ? 'active' : ''}" onclick="search(${page})" style="cursor: pointer;">
                <a class="page-link">${link.label}</a>
            </li>
        `;
    });

    document.getElementById("paginate").append(ul);
}
