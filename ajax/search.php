<style type="text/css">
li{
	text-decoration: none;
}
a{
	text-decoration: none;
}
.sugestion
{
	border: 2px #66afe9 solid;
	width: 320px;
	border-radius: 5px;
	padding: 10px;
}
</style>
<?
if(isset($_REQUEST['act']) && $_REQUEST['act'] =='autoSuggestUser' && isset($_REQUEST['queryString'])) {
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'kurukshetra';

$connect = mysql_connect($db_host, $db_user ,$db_password);
$db = mysql_select_db($db_name,$connect);
if($db){
$string = '';
$queryString = $_REQUEST['queryString'];
$query = "SELECT * FROM items WHERE item_name like'%" .$queryString . "%' ORDER BY item_name";
$resource = mysql_query($query);

if($resource && mysql_num_rows($resource) > 0) {

$string.='<div class="sugestion">';
while($result = mysql_fetch_object($resource))
{
$string.= '<p onClick="fillId(\''.addslashes($result->id).'\');fill(\''.addslashes($result->item_name).'\');"><a href="#">'.$result->item_name.'</a></p>';
}


} else {
$string.= '<p>No Record found</p>';
}
$string.='</div>';
echo $string;
exit;

}
exit;
}
?>