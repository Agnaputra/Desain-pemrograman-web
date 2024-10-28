function calculatePrice() {
    let weight = parseInt(document.getElementById('weight').value);
    let servicePrice = parseInt(document.getElementById('service').value);
    let typeFee = parseInt(document.getElementById('type').value);
    let discountPercent = parseInt(document.getElementById('discount').value);

    // Calculate total price
    let basePrice = weight * servicePrice;
    let additionalFee = weight * typeFee;
    let totalPrice = basePrice + additionalFee;

    // Apply discount
    let discountAmount = (totalPrice * discountPercent) / 100;
    let finalPrice = totalPrice - discountAmount;

    // Display results
    document.getElementById('result').innerHTML = `
        <p>Total price: ${totalPrice}</p>
        <p>Total discount: ${discountAmount}</p>
        <p>Total payment: ${finalPrice}</p>
    `;
}
