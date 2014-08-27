# Cryptsy PHP API


### Public Methods
Public methods do not require the use of an api key and can be accessed via the GET method. 

General Market Data (All Markets): (OLD METHOD) 

http://pubapi.cryptsy.com/api.php?method=marketdata 

General Market Data (All Markets): (NEW METHOD) 

http://pubapi.cryptsy.com/api.php?method=marketdatav2 

General Market Data (Single Market): 

http://pubapi.cryptsy.com/api.php?method=singlemarketdata&marketid={MARKET ID} 

General Orderbook Data (All Markets): 

http://pubapi.cryptsy.com/api.php?method=orderdata 

General Orderbook Data (Single Market): 

http://pubapi.cryptsy.com/api.php?method=singleorderdata&marketid={MARKET ID} 


### Authenticated Methods 
Authenticated methods require the use of an api key and can only be accessed via the POST method. 

URL - The URL you will be posting to is: https://api.cryptsy.com/api (notice it does NOT have the '.php' at the end) 

Authorization is performed by sending the following variables into the request header: 

Key — Public API key. An example API key: 5a8808b25e3f59d8818d3fbc0ce993fbb82dcf90 

Sign — ALL POST data (param=val&param1=val1) signed by a secret key according to HMAC-SHA512 method. Your secret key and public keys can be generated from your account settings page. 

An additional security element must be passed into the post: 

nonce - All requests must also include a special nonce POST parameter with incrementing integer. The integer must always be greater than the previous requests nonce value. 


Other Variables 

method - The method from the list below which you are accessing. 

General Return Values 

success - Either a 1 or a 0. 1 Represents sucessful call, 0 Represents unsuccessful 
error - If unsuccessful, this will be the error message 
return - If successful, this will be the data returned 


### Method List 

##### Method: getinfo 

Inputs: n/a 

Outputs: 

balances_available	Array of currencies and the balances availalbe for each
balances_hold	Array of currencies and the amounts currently on hold for open orders
servertimestamp	Current server timestamp
servertimezone	Current timezone for the server
serverdatetime	Current date/time on the server
openordercount	Count of open orders on your account


##### Method: getmarkets 

Inputs: n/a 

Outputs: Array of Active Markets 

marketid	Integer value representing a market
label	Name for this market, for example: AMC/BTC
primary_currency_code	Primary currency code, for example: AMC
primary_currency_name	Primary currency name, for example: AmericanCoin
secondary_currency_code	Secondary currency code, for example: BTC
secondary_currency_name	Secondary currency name, for example: BitCoin
current_volume	24 hour trading volume in this market
last_trade	Last trade price for this market
high_trade	24 hour highest trade price in this market
low_trade	24 hour lowest trade price in this market
created	Datetime (EST) the market was created


##### Method: getwalletstatus 

Inputs: n/a 

Outputs: Array of Wallet Statuses 

currencyid	Integer value representing a currency
name	Name for this currency, for example: Bitcoin
code	Currency code, for example: BTC
blockcount	Blockcount of currency hot wallet as of lastupdate time
difficulty	Difficulty of currency hot wallet as of lastupdate time
version	Version of currency hotwallet as of lastupdate time
peercount	Connected peers of currency hot wallet as of lastupdate time
hashrate	Network hashrate of currency hot wallet as of lastupdate time
gitrepo	Git Repo URL for this currency
withdrawalfee	Fee charged for withdrawals of this currency
lastupdate	Datetime (EST) the hot wallet information was last updated


##### Method: mytransactions 

Inputs: n/a 

Outputs: Array of Deposits and Withdrawals on your account 

currency	Name of currency account
timestamp	The timestamp the activity posted
datetime	The datetime the activity posted
timezone	Server timezone
type	Type of activity. (Deposit / Withdrawal)
address	Address to which the deposit posted or Withdrawal was sent
amount	Amount of transaction (Not including any fees)
fee	Fee (If any) Charged for this Transaction (Generally only on Withdrawals)
trxid	Network Transaction ID (If available)


##### Method: markettrades 

Inputs:

marketid	Market ID for which you are querying


Outputs: Array of last 1000 Trades for this Market, in Date Decending Order 

tradeid	A unique ID for the trade
datetime	Server datetime trade occurred
tradeprice	The price the trade occurred at
quantity	Quantity traded
total	Total value of trade (tradeprice * quantity)
initiate_ordertype	The type of order which initiated this trade


##### Method: marketorders 

Inputs:

marketid	Market ID for which you are querying


Outputs: 2 Arrays. First array is sellorders listing current open sell orders ordered price ascending. Second array is buyorders listing current open buy orders ordered price descending. 

sellprice	If a sell order, price which order is selling at
buyprice	If a buy order, price the order is buying at
quantity	Quantity on order
total	Total value of order (price * quantity)


##### Method: mytrades 

Inputs:

marketid	Market ID for which you are querying
limit	(optional) Limit the number of results. Default: 200


Outputs: Array your Trades for this Market, in Date Decending Order 

tradeid	An integer identifier for this trade
tradetype	Type of trade (Buy/Sell)
datetime	Server datetime trade occurred
tradeprice	The price the trade occurred at
quantity	Quantity traded
total	Total value of trade (tradeprice * quantity) - Does not include fees
fee	Fee Charged for this Trade
initiate_ordertype	The type of order which initiated this trade
order_id	Original order id this trade was executed against


##### Method: allmytrades 

Inputs: 

startdate	(optional) Starting date for query (format: yyyy-mm-dd)
enddate	(optional) Ending date for query (format: yyyy-mm-dd)


Outputs: Array your Trades for all Markets, in Date Decending Order 

tradeid	An integer identifier for this trade
tradetype	Type of trade (Buy/Sell)
datetime	Server datetime trade occurred
marketid	The market in which the trade occurred
tradeprice	The price the trade occurred at
quantity	Quantity traded
total	Total value of trade (tradeprice * quantity) - Does not include fees
fee	Fee Charged for this Trade
initiate_ordertype	The type of order which initiated this trade
order_id	Original order id this trade was executed against


##### Method: myorders 

Inputs:

marketid	Market ID for which you are querying


Outputs: Array of your orders for this market listing your current open sell and buy orders. 

orderid	Order ID for this order
created	Datetime the order was created
ordertype	Type of order (Buy/Sell)
price	The price per unit for this order
quantity	Quantity remaining for this order
total	Total value of order (price * quantity)
orig_quantity	Original Total Order Quantity


##### Method: depth 

Inputs:

marketid	Market ID for which you are querying


Outputs: Array of buy and sell orders on the market representing market depth. 

Output Format is:
array(
  'sell'=>array(
    array(price,quantity), 
    array(price,quantity),
    ....
  ), 
  'buy'=>array(
    array(price,quantity), 
    array(price,quantity),
    ....
  )
)


##### Method: allmyorders 

Inputs: n/a 

Outputs: Array of all open orders for your account. 

orderid	Order ID for this order
marketid	The Market ID this order was created for
created	Datetime the order was created
ordertype	Type of order (Buy/Sell)
price	The price per unit for this order
quantity	Quantity remaining for this order
total	Total value of order (price * quantity)
orig_quantity	Original Total Order Quantity


##### Method: createorder 

Inputs:

marketid	Market ID for which you are creating an order for
ordertype	Order type you are creating (Buy/Sell)
quantity	Amount of units you are buying/selling in this order
price	Price per unit you are buying/selling at


Outputs: 

orderid	If successful, the Order ID for the order which was created


##### Method: cancelorder 

Inputs:

orderid	Order ID for which you would like to cancel


Outputs: n/a. If successful, it will return a success code. 

##### Method: cancelmarketorders 

Inputs:

marketid	Market ID for which you would like to cancel all open orders


Outputs: 

return	Array for return information on each order cancelled


##### Method: cancelallorders 

Inputs: N/A 

Outputs: 

return	Array for return information on each order cancelled


##### Method: calculatefees 

Inputs:

ordertype	Order type you are calculating for (Buy/Sell)
quantity	Amount of units you are buying/selling
price	Price per unit you are buying/selling at


Outputs: 

fee	The that would be charged for provided inputs
net	The net total with fees


##### Method: generatenewaddress 

Inputs: (either currencyid OR currencycode required - you do not have to supply both)

currencyid	Currency ID for the coin you want to generate a new address for (ie. 3 = BitCoin)
currencycode	Currency Code for the coin you want to generate a new address for (ie. BTC = BitCoin)


Outputs: 

address	The new generated address


##### Method: mytransfers 

Inputs: n/a 

Outputs: Array of all transfers into/out of your account sorted by requested datetime descending. 

currency	Currency being transfered
request_timestamp	Datetime the transfer was requested/initiated
processed	Indicator if transfer has been processed (1) or not (0)
processed_timestamp	Datetime of processed transfer
from	Username sending transfer
to	Username receiving transfer
quantity	Quantity being transfered
direction	Indicates if transfer is incoming or outgoing (in/out)


##### Method: makewithdrawal 

Inputs: 

address	Pre-approved Address for which you are withdrawing to (Set up these addresses on Settings page)
amount	Amount you are withdrawing. Supports up to 8 decimal places.


Outputs: 

Either successful or error. If error, gives reason for error.
