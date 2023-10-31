let cartItems = undefined;

class Colors {
    static get white() {
        return "Branco";
    }

    static get blue() {
        return "Azul";
    }

    static get garnet() {
        return "Garnet";
    }

    static get red() {
        return "Vermelho";
    }

    static get black() {
        return "Preto";
    }

    static get orange() {
        return "Laranja";
    }

    static get yellow() {
        return "Amarelo";
    }

    static get green() {
        return "Verde";
    }
}

window.addEventListener("load", () => {
    cartItems = JSON.parse(localStorage.getItem("cart-list")) ?? [];

    renderCartList();
    renderDetailsList();

});

const renderCartList = () => {
    cartItems.map(item => {
        item.size = "M";
        item.quantity = 1;

        let color = "";
        item.color.map(c => !color ? color = Colors[c] : color += ", " + Colors[c]);

        const card = document.createElement("card");
        card.id = `product-${item.id}`;
        card.classList.add("card", "card-items", "mb-3");

        // remove item
        const span = document.createElement("span");
        span.classList.add("btn", "btn-danger", "remove-item");
        span.onclick = () => removeItem(item.id);

        const icon = document.createElement("i");
        icon.classList.add("fa-solid", "fa-trash");

        span.append(icon);

        // main div
        const mainDiv = document.createElement("div");
        mainDiv.classList.add("d-flex", "flex-wrap");

        // img
        const img = document.createElement("img");
        img.classList.add("img-fluid", "rounded-start");
        img.src = `img/${item.directory}/1.jpg`;
        img.alt = "";

        // card body
        const cardBody = document.createElement("div");
        cardBody.classList.add("card-body");

        const h5 = document.createElement("h5");
        h5.classList.add("font-bold");
        h5.innerText = item.team;

        const table = document.createElement("table");
        const tbody = document.createElement("tbody");

        // color tr
        const tr1 = document.createElement("tr");

        const colorTd = document.createElement("td");
        colorTd.innerText = "Cor:";

        const colorValueTd = document.createElement("td");
        colorValueTd.innerText = color;

        tr1.append(colorTd, colorValueTd);

        // size tr
        const tr2 = document.createElement("tr");

        const sizeTd = document.createElement("td");
        sizeTd.innerText = "Tamanho:";

        const sizeValueTd = document.createElement("td");
        sizeValueTd.classList.add("d-flex");

        sizesAppends(sizeValueTd, item.id);

        tr2.append(sizeTd, sizeValueTd);

        // quantity
        const tr3 = document.createElement("tr");

        const qntTd = document.createElement("td");
        qntTd.innerText = "Quantidade:";

        const qntValueTd = document.createElement("td");

        const input = document.createElement("input");
        input.type = "number";
        input.id = "quantity";
        input.min = "0";
        input.max = item.storage;
        input.value = "1";
        input.autocomplete = "off";
        input.oninput = (e) => changeQnt(e, item.id);

        qntValueTd.append(input);

        tr3.append(qntTd, qntValueTd);

        // total price
        const tr4 = document.createElement("tr");

        const priceTd = document.createElement("td");
        priceTd.innerText = "Preço total:";

        const priceValueTd = document.createElement("td");
        priceValueTd.id = "price-" + item.id;
        priceValueTd.innerText = "R$ " + item.price;

        tr4.append(priceTd, priceValueTd);

        // tbody appends
        tbody.append(tr1, tr2, tr3, tr4);

        // table appends
        table.append(tbody);

        // card body appends
        cardBody.append(h5, table);

        // appends to main div
        mainDiv.append(img, cardBody);

        // appends to card
        card.append(span, mainDiv);

        document.getElementById("cart-list").append(card);
    });
}

const renderDetailsList = () => {
    document.getElementById("details-list")?.remove();

    let total = 0;

    cartItems.map(item => total += item.price * item.quantity);

    const itens = (element, title, body, classStyle = null) => {
        const div = document.createElement("div");
        div.classList.add("d-flex", "justify-content-between");

        const span1 = document.createElement("span");
        classStyle && span1.classList.add(classStyle);
        span1.innerText = title;

        const span2 = document.createElement("span");
        classStyle && span2.classList.add(classStyle);
        span2.innerText = "R$ " + body;

        div.append(span1, span2);
        element.append(div);
    }

    const detailsList = document.createElement("div");
    detailsList.id = "details-list";
    detailsList.classList.add("d-flex", "flex-wrap", "flex-column", "align-content-center");

    itens(detailsList, "Total dos produtos", total.toFixed(2));
    itens(detailsList, "Frete", 15.00);

    const hr = document.createElement("hr");
    detailsList.append(hr);

    itens(detailsList, "Sub-Total", total + 15.00, "font-bold");

    const button = document.createElement("button");
    button.classList.add("btn", "btn-dark");
    button.onclick = () => sendMessage();
    button.innerText = "Finalizar a compra";

    if (!cartItems?.length) button.setAttribute("disabled", "true");

    detailsList.append(button);

    document.getElementById("cart-details").append(detailsList);
}

const sizesAppends = (element, itemId) => {
    const sizes = ["P", "M", "G", "GG"];
    sizes.map(value => {
        const formCheck = document.createElement("div");
        formCheck.classList.add("form-check");

        const input = document.createElement("input");
        input.id = itemId + "-" + value;
        input.classList.add("form-check-input");
        input.name = "size-" + itemId;
        input.type = "radio";
        input.onchange = (e) => changeSize(e, itemId);
        if (value === "M") input.checked = true;

        const label = document.createElement("label");
        label.classList.add("form-check-label");
        label.htmlFor = itemId + "-" + value;
        label.innerText = value;

        formCheck.append(input, label);
        element.append(formCheck);
    });
}

const removeItem = (itemId) => {
    document.getElementById(`product-${itemId}`).remove();

    const newProducts = [];
    cartItems.map(item => (item.id !== itemId) && newProducts.push(item));

    cartItems = newProducts;

    localStorage.setItem("cart-list", JSON.stringify(newProducts));

    setCount();
    renderDetailsList();
}

const changeSize = (e, itemId) => cartItems.map(item => item.id === itemId && (item.size = e.target.id.split("-")[1]));

const changeQnt = (e, itemId) => {
    cartItems.map(item => {
        if (item.id === itemId) {
            if (e.target.value > item.storage) e.target.value = item.storage;
            else if (e.target.value <= 0) e.target.value = 1;

            const totalPrice = item.price * e.target.value;
            document.getElementById(`price-${itemId}`).innerText = `R$ ${totalPrice.toFixed(2)}`;

            item.quantity = parseInt(e.target.value);
        }
    });

    renderDetailsList();
}

const sendMessage = () => {
    window.open(`https://wa.me/+5511946353943?text=teste`, '_blank');

    // localStorage.removeItem("cart-list");
    window.top.location = "/products";
}
