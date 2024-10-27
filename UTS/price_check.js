function calculatePrice(event) {
    event.preventDefault();
    const weight = parseInt(document.getElementById("weight").value);
    const serviceCost = parseInt(document.getElementById("service").value);
    const typeCost = parseInt(document.getElementById("type").value);
    const membership = parseInt(document.getElementById("membership").value);

    let price = weight * serviceCost + weight * typeCost;
    if (membership === 1) {
        price *= 0.9; // Apply 10% discount
    }

    document.getElementById("totalPrice").innerText = `Total Price: ${Math.round(price)} IDR`;
}
