<?php
include '../../controller/TravelOfferController.php';
$travelOfferC = new TravelOfferController();
$travelOfferC->deleteOffer($_GET["id"]);
header('Location:offerList.php');
