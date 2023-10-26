window.addEventListener("load", () => search());

document.getElementById("btn-search").addEventListener("click", e => {
    e.preventDefault();
    search();
});

document.getElementById("btn-clear").addEventListener("click", e => {
    e.preventDefault();

    clearFilterById("teamsCollapse");
    clearFilterById("leaguesCollapse");
    clearFilterById("colorsCollapse");
    clearFilterById("orderByCollapse", true);

    search();
});

const search = (page = 1) => {
    if (!page) return;

    window.scroll(0,0);
    const formData = new FormData();

    formData.append("page", page);
    formData.append("teamsFilters", setFiltersById("teamsCollapse"));
    formData.append("leaguesFilters", setFiltersById("leaguesCollapse"));
    formData.append("colorsFilters", setFiltersById("colorsCollapse"));
    formData.append("orderBy", setFiltersById("orderByCollapse", true));

    axios.post("/products/list", formData)
        .then(({data : {data}}) => {
            renderProductsList(data.data);
            renderPagination(data.links);
        })
        .catch(error => {
            console.error(error);
        });
}

const renderProductsList = (list) => {
    document.querySelectorAll(".product-card").forEach(e => e.remove());

    list.map(item => {
        const card = document.createElement("div");
        card.classList.add("card", "product-card");

        // create div img
        const divOverlay = document.createElement("div");
        divOverlay.classList.add("view", "overlay");

        const img = document.createElement("img");
        img.classList.add("card-img-top");
        img.src = "img/real-madrid/1.jpg";
        img.alt = "";

        divOverlay.append(img);

        // create card body
        const cardBody = document.createElement("div");
        cardBody.classList.add("card-body");

        const h4 = document.createElement("h4");
        h4.classList.add("card-title");
        h4.innerText = item.team;

        const hr = document.createElement("hr");

        const p = document.createElement("p");
        p.classList.add("card-text");
        p.innerText = "R$ " + item.price;

        const a = document.createElement("a");
        a.href = `/product/${item.id}`
        a.classList.add("d-flex", "justify-content-end");

        const h5 = document.createElement("h5");
        h5.innerText = "Mais informações ";

        const i = document.createElement("i");
        i.classList.add("fa-solid", "fa-angle-right");

        h5.append(i);

        a.append(h5);

        cardBody.append(h4, hr, p, a);

        //append to the card
        card.append(divOverlay, cardBody);

        document.getElementById("products").append(card);
    });
}

const renderPagination = (links) => {
    document.querySelectorAll(".pagination").forEach(e => e.remove());

    const ul = document.createElement("ul");
    ul.classList.add("pagination");

    links.map(link => {
        const page = link.url && link.url.split("=")[1];

        const li = document.createElement("li");
        li.classList.add("page-item");
        link.active && li.classList.add("active");
        li.onclick = () => search(page);
        li.style.cursor = "pointer";

        const a = document.createElement("a");
        a.classList.add("page-link");
        a.innerText = link.label;

        li.append(a);

        ul.append(li);
    });

    document.getElementById("paginate").append(ul);
}

const toggleItem = (e) => {

    const icon = e.querySelector("i");
    if (icon.classList.contains("fa-angle-down")) {
        icon.classList.remove("fa-angle-down");
        icon.classList.add("fa-angle-up");
    } else {
        icon.classList.add("fa-angle-down");
        icon.classList.remove("fa-angle-up");
    }
}

const setFiltersById = (id, radio = false) => {
    const filter = [];

    document.getElementById(id).querySelectorAll(".form-check-input").forEach(e => {
        if (e.checked) filter.push(radio ? e.id : e.name)
    });

    return JSON.stringify(filter);
}

const clearFilterById = (id, radio = false) => {
    document.getElementById(id).querySelectorAll(".form-check-input").forEach(e => {
        if (radio) e.checked = e.id === "relevance";
        else e.checked = false
    });
}
