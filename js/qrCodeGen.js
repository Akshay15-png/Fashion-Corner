function generateQR() {
  // var upiId = document.getElementById('upiId').value;
  var amount = document.getElementById('amount').value;

  if (!amount) {
    alert('Something is wrong in qr code generation');
    return;
  }

  // Clear any existing QR code
  document.getElementById('qrCode').innerHTML = "";

  // Format UPI link with parameters for money transfer
  var qrText = 'upi://pay?pa=' + encodeURIComponent('akshaydaisuke@oksbi') + '&am=' + amount + '&cu=INR';

  // Generate QR code
  new QRCode(document.getElementById('qrCode'), {
    text: qrText,
    width: 400,
    height: 400,
    colorDark: "#000000",
    colorLight: "#ffffff",
    correctLevel: QRCode.CorrectLevel.H
  });
}
