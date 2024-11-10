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

    function addOffer($offer)
    {   var_dump($offer);
        $sql = "INSERT INTO traveloffer  
        VALUES (NULL, :title,:destination, :departure_date,:return_date, :price, :disponible, :category)";
        $db = config::getConnexion();
        try {
            
            $query = $db->prepare($sql);
            $query->execute([
                'title' => $offer->getTitle(),
                'destination' => $offer->getDestination(),
                'departure_date' => $offer->getDepartureDate()->format('Y-m-d'), 
                'return_date' => $offer->getReturnDate()->format('Y-m-d'),
                'price' => $offer->getPrice(),
                'disponible' => $offer->isDisponible() ? 1 : 0, 
                'category' => $offer->getCategory()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateOffer($offer, $id)
{
    var_dump($offer);
    try {
        $db = config::getConnexion();

        $query = $db->prepare(
            'UPDATE traveloffer SET 
                title = :title,
                destination = :destination,
                departure_date = :departure_date,
                return_date = :return_date,
                price = :price,
                disponible = :disponible,
                category = :category
            WHERE id = :id'
        );

        $query->execute([
            'id' => $id,
            'title' => $offer->getTitle(),
            'destination' => $offer->getDestination(),
            'departure_date' => $offer->getDepartureDate()->format('Y-m-d'), 
            'return_date' => $offer->getReturnDate()->format('Y-m-d'),
            'price' => $offer->getPrice(),
            'disponible' => $offer->isDisponible() ? 1 : 0, 
            'category' => $offer->getCategory()
        ]);

        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); 
    }
}


    function showOffer($id)
    {
        $sql = "SELECT * from traveloffer where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $offer = $query->fetch();
            return $offer;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
