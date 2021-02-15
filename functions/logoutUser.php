<?php

include('../models/user.php');

echo json_encode(User::logoutUser());

?>
