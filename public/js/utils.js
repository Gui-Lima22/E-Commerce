let products = [];

window.addEventListener("load", () => {
    setCount();
    axios.get("/all").then(({data: {data}}) => products = data);
});

const setCount = () => {
    const items = localStorage.getItem("cart-list");

    if (items) {
        document.getElementById("count-list")?.remove();

        const cartBtb = document.getElementById("cart-btn");

        const span = document.createElement("span");
        span.id = "count-list";
        span.classList.add("badge", "rounded-pill", "badge-notification", "bg-danger");
        span.innerText = JSON.parse(items).length;

        cartBtb.append(span);
    }
}

const searchProducts = (e) => {
    const value = cleanString(e.value);

    document.getElementById("searchPainel")?.remove();

    const ul = document.createElement("ul");
    ul.id = "searchPainel";

    if (value.length >= 3) {
        products.map(product => {
            if (cleanString(product.team).includes(value)) {
                const li = document.createElement("li");

                const a = document.createElement("a");
                a.classList.add("d-flex", "flex-wrap", "align-items-center");
                a.href = `/product/${product.id}`;

                const img = document.createElement("div");
                img.style.backgroundImage = `url(img/${product.directory}/1.jpg)`;
                img.style.backgroundPosition = "left";
                img.style.backgroundSize = "contain";
                img.style.backgroundRepeat = "no-repeat";
                img.style.height = "40px";
                img.style.width = "40px";

                const span = document.createElement("span");
                span.classList.add("ms-2");
                span.innerText = product.team;

                a.append(img, span);

                li.append(a);
                ul.append(li);
            }
        });

        document.getElementById("searchToggle").append(ul);
    } else {
        document.getElementById("searchPainel")?.remove();
    }
}

const cleanString = (string) => string.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '');
