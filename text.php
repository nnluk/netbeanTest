<?PHP

$stock_num = '0043'; // Change the stock num

$result = file_get_contents("http://yuki.bmgdemo.com/stock/?route=call_stock_data&id=" . $stock_num);
$historical_quote = json_decode($result, true);

print_r($historical_quote);
