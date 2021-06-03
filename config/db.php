<?php

try {
	$conn = new mysqli('remotemysql.com', '46LiVaQ1Zg', 'Njv8VPOJVv','46LiVaQ1Zg');
} catch (Exception $e) {
	echo $e->getMessage();
}
