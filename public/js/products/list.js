window.addEventListener("load", () => search());

function search(page = 1) {
    if (!page) return;

    const formData = new FormData();
    formData.append("page", page);

    axios.post("/products/list", formData)
        .then(({data : {data}}) => {
            renderProductsList(data.data);
            renderPagination(data.links);
        })
        .catch(error => {
            console.error(error);
        });
}

function renderProductsList(list) {
    document.querySelectorAll(".card").forEach(e => e.remove());

    list.map(item => {
        const card = document.createElement("card");
        card.classList.add("card");

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

function renderPagination(links) {
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
