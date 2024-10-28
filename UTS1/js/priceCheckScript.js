$(document).ready(function () {
  $("#priceForm").on("submit", function (event) {
    event.preventDefault();

    const weight = parseInt($("#weight").val());
    const serviceType = $("#serviceType").val();
    const serviceSpeed = $("#serviceSpeed").val();
    const membership = $("#membership").val();

    let pricePerKg;
    if (serviceType === "dry") {
      pricePerKg = 1000;
    } else if (serviceType === "washIron") {
      pricePerKg = 1200;
    } else {
      pricePerKg = 900;
    }

    const basePrice = pricePerKg * weight;
    let additionalCharge = 0;
    if (serviceSpeed === "express") {
      additionalCharge = 200 * weight;
    }

    const totalPrice = basePrice + additionalCharge;
    let discount = 0;
    if (membership === "member") {
      discount = totalPrice * 0.1;
    }

    const totalPayment = totalPrice - discount;

    $("#totalPrice").text(`Total Price: Rp ${totalPrice}`);
    $("#totalDiscount").text(`Total Discount: Rp ${discount}`);
    $("#totalPayment").text(`Total Payment: Rp ${totalPayment}`);
    $("#resultCard").show();
  });
});
