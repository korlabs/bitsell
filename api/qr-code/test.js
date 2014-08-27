(function() {

  // Form elements.
  var IMAGE   = document.getElementById('image');
  var INPUT   = document.getElementById('input');
  var FORM    = document.getElementById('result');
  var ADDRESS = document.getElementById('address');
  var AMOUNT  = document.getElementById('amount');

  /**
   * QR Code callback function.
   *
   * @param {String} data
   * @return {Boolean}
   */
  function qrcodeCallback(data) {
    var result = parseQRData(data);

    console.info(data);

    if (data.indexOf('error') === 0) {
      return qrcodeErrorHandler('could not decode QR code', data);
    }
    if (result === false) {
      return qrcodeErrorHandler('invalid bitcoin address', data);
    }
    return qrcodeSuccessHandler(result);
  }

  /**
   * Parse bitcoin data from decoded string.
   *
   * @param {String} data
   * @return {Boolean|Object}
   */
  function parseQRData(data) {
    var match = data.match(/^bitcoin:([13][a-zA-Z0-9]{26,33})(\?.+)?$/);
    var result;
    var params = {};

    if (match === null || match[1] === undefined) {
      return false;
    }
    if (match[2] !== undefined) {
      params = queryString.parse(match[2]);
    }

    return {
      addr: match[1],
      amount: params.amount ? parseFloat(params.amount) : undefined,
      label: params.label || undefined
    };
  }

  /**
   * Event Handler for file input changes.
   *
   * @param {Event} e
   */
  function inputChangeHandler(e) {
    var reader = new FileReader();
    var files  = e.target.files;

    reader.onload = readerLoadHandler;
    reader.readAsDataURL(files[0]);
    FORM.reset();
  }

  /**
   * Event Handler for file reader load event.
   *
   * @param {Event} e
   */
  function readerLoadHandler(e) {
    var res = e.target.result;
    IMAGE.src = res;
    qrcode.decode(res);
  }

  /**
   * Callback for sucessful scans.
   *
   * @param {Object} res
   * @return {Boolean}
   */
  function qrcodeSuccessHandler(res) {
    console.log('result', res);
    ADDRESS.value = res.addr;
    AMOUNT.value  = res.amount || '';
    return true;
  }

  /**
   * Callack for failed scans.
   *
   * @param {String} err
   * @param {String} data
   * @return {Boolean}
   */
  function qrcodeErrorHandler(err, data) {
    var msg;
    console.warn(err);

    msg = 'Error: ' + err;
    if (data !== null) {
      msg += "\n\nResult:\n" + data;
    }

    alert(msg);
    return false;
  }

  // Register qrcode callback.
  qrcode.callback = qrcodeCallback;

  // Register file change event handler.
  INPUT.addEventListener('change', inputChangeHandler);

}).call(this);