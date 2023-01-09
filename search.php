

<form method="POST" action="search.php">
<table>
	<tr>
                <td colspan="2">
                        <input type="submit" id="button1"  value="Show last 10 attacks" name="button1" style="margin: 0;border:2px solid blue; border-radius:10px; padding:5px; background-color:white; color:blue; text-align:center; font-size:12px; font-weight:bold; width:200px; cursor:pointer"/>
                </td>
        </tr>
</table>

</form>
<?php
		if(array_key_exists('button1',$_POST)){
		$conn = db_connect();
		$result = get_ticket_sql_number($conn);
		myprint_r($result);
	}


			
?>




</div>

</body>
</html>


