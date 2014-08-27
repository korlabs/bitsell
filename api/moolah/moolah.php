<?php
namespace Payments\Moolah;

class Tx {
    public $endpoint = 'https://api.moolah.io/v2';
    protected $_apiKey;
    protected $_apiSecret;

    public function __construct($apiKey, $apiSecret = false)
    {
        $this->_apiKey = $apiKey;
        $this->_apiSecret = $apiSecret;
    }

    public function createTransaction($coin, $currency, $amount, $product, $ipn = false, $ipnExtra = false)
    {
        if($coin == '' || !isset($coin) || $coin === false) { return false; }
        if($currency == '' || !isset($currency) || $currency === false) { return false; }
        if($amount == '' || !isset($amount) || $amount === false) { return false; }
        if($product == '' || !isset($product) || $product === false) { return false; }
        if($ipn !== false && $this->_apiSecret === false) { return false; }
        if(!$this->isValidCoin($coin)) { return false; }
        if(!$this->isValidCurrency($currency)) { return false; }
        if(floatval(number_format($amount, 8, '.', '')) <= floatval(0)) { return false; }

        $action = '/private/merchant/create';

        $payload = array(
            'coin' => $coin,
            'currency' => $currency,
            'amount' => floatval(number_format($amount, 8, '.', '')),
            'product' => urlencode($product)
        );

        if($ipn !== false) {
            $payload['ipn'] = $ipn;
        }

        if($ipnExtra !== false) {
            $payload['ipnExtra'] = $ipnExtra;
        }

        $payload['apiKey'] = $this->_apiKey;

        if($this->_apiSecret !== false) { $payload['apiSecret'] = $this->_apiSecret; }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->endpoint . $action);
        curl_setopt($ch, CURLOPT_POST, count($payload));
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $result = curl_exec($ch);
        $obj = json_decode($result, true);

        if($obj['status'] == true) {
            /*
             * status ( success | failure )
             * guid ( A unique identifier for this transaction. Used for querying status. )
             * address ( Address to send coins to. )
             * url ( A URL to a hosted payment page to direct the user to. )
             * coin ( The coin associated with this transaction. )
             * amount ( How much does the user have to pay, in the coin above? )
             * timestamp ( UNIX timestamp of when this transaction was created. )
             */

            return $obj;
        } else {
            return false;
        }
    }

    public function queryTransaction($guid)
    {
        $action = '/private/merchant/status';

        $payload = array(
            'guid' => $guid
        );

        $payload['apiKey'] = $this->_apiKey;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->endpoint . $action);
        curl_setopt($ch, CURLOPT_POST, count($payload));
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $result = curl_exec($ch);
        $obj = json_decode($result, true);

        if($obj['status'] == true) {
            /*
             * Example Response
             *
                {
                    "status": "success",
                    "transaction": {
                        "tx": {
                            "amount": "26651.62068965",
                            "coin": "dogecoin",
                            "guid": "692-6c-e5fa17a37-4baa72bf7c5-78d88d6",
                            "status": "cancelled",
                            "tx": "-1"
                        }
                    }
                }
             */

            return $obj;
        } else {
            return false;
        }
    }

    public function getValidCoins()
    {
        $coins = array(
            'bitcoin',
            'blackcoin',
            'darkcoin',
            'digibyte',
            'digitalcoin',
            'dogecoin',
            'einsteinium',
            'litecoin',
            'maxcoin',
            'mintcoin',
            'myriadcoin',
            'nautiluscoin',
            'peercoin',
            'quarkcoin',
            'razorcoin',
            'vericoin',
            'vertcoin',
            'zetacoin',
        );

        return $coins;
    }

    public function isValidCoin($coin)
    {
        $coins = $this->getValidCoins();

        if(!in_array($coin, $coins)) {
            return false;
        } else {
            return true;
        }
    }

    public function getValidCurrencies()
    {
        $currencies = array(
            'AUD',
            'CAD',
            'CHF',
            'CNY',
            'DKK',
            'EUR',
            'GBP',
            'HKD',
            'JPY',
            'KRW',
            'NOK',
            'SEK',
            'SGD',
            'USD',
            'ZAR',
        );

        return $currencies;
    }

    public function isValidCurrency($currency)
    {
        $currencies = $this->getValidCurrencies();

        if(!in_array(strtoupper($currency), $currencies)) {
            return false;
        } else {
            return true;
        }
    }

}
