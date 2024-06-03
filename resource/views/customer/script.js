document.addEventListener("DOMContentLoaded", () => {
    const menuItemsContainer = document.getElementById("menu-items");
    const orderList = document.getElementById("order-list");
    const totalMenu = document.getElementById("total-menu");
    const subtotal = document.getElementById("subtotal");
    const totalPayment = document.getElementById("total-payment");
    let orders = {};

    // Fetch menu items from JSON
    fetch('data.json')
        .then(response => response.json())
        .then(data => {
            displayMenuItems(data.menuItems);
        });

    function displayMenuItems(items) {
        items.forEach(item => {
            const menuItem = document.createElement("div");
            menuItem.className = "menu-item";
            menuItem.innerHTML = `
                <img src="${item.image}" alt="${item.name}">
                <h3>${item.name}</h3>
                <p>${item.description}</p>
                <p>Rp. ${item.price.toLocaleString()}</p>
                <button class="add-to-order" data-name="${item.name}" data-price="${item.price}">Tambah</button>
            `;
            menuItemsContainer.appendChild(menuItem);
        });

        document.querySelectorAll(".add-to-order").forEach(button => {
            button.addEventListener("click", () => {
                const name = button.getAttribute("data-name");
                const price = parseInt(button.getAttribute("data-price"));

                if (!orders[name]) {
                    orders[name] = {
                        name: name,
                        price: price,
                        quantity: 0
                    };
                }

                orders[name].quantity++;
                updateOrderList();
            });
        });
    }

    function updateOrderList() {
        orderList.innerHTML = '';
        let totalItems = 0;
        let subtotalAmount = 0;

        for (let key in orders) {
            const orderItem = orders[key];
            totalItems += orderItem.quantity;
            subtotalAmount += orderItem.quantity * orderItem.price;

            const orderListItem = document.createElement("li");
            orderListItem.innerHTML = `
                <span>${orderItem.name} (${orderItem.quantity})</span>
                <span>Rp. ${(orderItem.quantity * orderItem.price).toLocaleString()}</span>
            `;

            const addButton = document.createElement("button");
            addButton.textContent = "+";
            addButton.addEventListener("click", () => {
                orders[orderItem.name].quantity++;
                updateOrderList();
            });

            const subtractButton = document.createElement("button");
            subtractButton.textContent = "-";
            subtractButton.addEventListener("click", () => {
                orders[orderItem.name].quantity--;
                if (orders[orderItem.name].quantity === 0) {
                    delete orders[orderItem.name];
                }
                updateOrderList();
            });

            orderListItem.appendChild(addButton);
            orderListItem.appendChild(subtractButton);
            orderList.appendChild(orderListItem);
        }

        totalMenu.textContent = totalItems;
        subtotal.textContent = subtotalAmount.toLocaleString();
        totalPayment.textContent = subtotalAmount.toLocaleString();
    }

    document.querySelector(".order-button").addEventListener("click", () => {
        alert("Pesanan Anda telah dikonfirmasi!");
        orders = {};
        updateOrderList();
    });

    document.querySelector(".cancel-button").addEventListener("click", () => {
        orders = {};
        updateOrderList();
    });
});

