const toggleMainImg = (e) => {
    const newImg = e.src;

    e.src = document.getElementById("main-img").src;
    document.getElementById("main-img").src = newImg;
}

document.getElementById("add-cart").addEventListener("click", e => setItemOnLocalStorage(e));

document.getElementById("buy").addEventListener("click", e => setItemOnLocalStorage(e, true));

const setItemOnLocalStorage = async (e, buy = false) => {
    e.preventDefault();

    if (buy) e.target.setAttribute("disabled", true);

    const id = document.getElementById("id").value;

    let product = [];

    await axios.get(`/getById/${id}`).then(({data: {data}}) => product = data);

    const items = JSON.parse(localStorage.getItem("cart-list")) ?? [];

    items.push(product);

    localStorage.setItem("cart-list", JSON.stringify(items));

    setCount();

    if (buy) window.top.location = "/cart";

    const toast = mdb.Toast.getInstance(document.getElementById("toast"));
    toast.show();
}
