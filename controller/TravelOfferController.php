<?php
include(__DIR__ . '/../config.php');
include(__DIR__ . '/../Model/TravelOffer.php');

class TravelOfferController
{
    public function listOffre()
    {
        $sql = "SELECT * FROM traveloffer";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteOffer($id)
    {
        $sql = "DELETE FROM traveloffer WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    


}
