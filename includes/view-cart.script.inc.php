<script>
  function updateCartPrices(obj, objNo) {
      quantity = extractNum(obj.value);
      var itemPrice = extractNum($('#item-price-'+objNo).text()); 
      itemSubtotal = quantity * itemPrice;
      $('#cart-subtotal-'+objNo).val("$" + itemSubtotal);
      var Subtotal = getSubtotal();
      $('#summary-subtotal').text("$" + Subtotal);
      var tax = 0.05 * Subtotal;
      $('#summary-tax').text("$" + tax);
      var shippingCost = 10;
      var grandTotal = Subtotal + shippingCost + tax;
      $('#summary-total').text("$"+grandTotal);
  }

  function getSubtotal() {
      var tableRows = $('table tr').length;
      var summaryRows = 4;
      var headRow = 1;
      var itemsInCart = tableRows - summaryRows - headRow;
      var itemSubtotal = 0;
      for (i=1; i<=itemsInCart; i++) {
           itemSubtotal += extractNum($('#cart-subtotal-'+ i).val());
      }
      return itemSubtotal;
  }

  function extractNum(str) {
        var n = str.indexOf('$');
        str = str.slice(n+1); 
        return Number(str);
    }
</script>