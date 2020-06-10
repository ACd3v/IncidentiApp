<?php
include_once __DIR__.'/classes/Connection.php';
include_once __DIR__ . '/classes/VeicoloInIncidente.php';

class VeicoloInIncidenteDAO {
    /***
     * Restituisce il VeicoloInIncidente con l'id specificato
     * @param int $idVeicoloInIncidente
     * @return VeicoloInIncidente|string
     */

    public static function getVeicoloInIncidente(int $idVeicoloInIncidente) {
        try {
            $conn = Connection::getConnection();
            $sql = "SELECT * FROM veicoliinincidenti WHERE idVeicoloInIncidente = :id";
            $stm = $conn->prepare($sql);
            $stm->bindParam(':id', $idVeicoloInIncidente, PDO::PARAM_INT);
            $stm->execute();

            if (!$riga = $stm->fetch(PDO::FETCH_ASSOC)) {
                die("Attenzione! VeicoloInIncidente inesistente");
            }

            $idVeicolo = $riga['idVeicolo'];
            $idIncidente = $riga['idIncidente'];

            $veicoloInIncidente = new VeicoloInIncidente($idVeicoloInIncidente, $idVeicolo, $idIncidente);

        } catch (PDOException $e) {
            throw $e;
        }
        return $veicoloInIncidente;
    }

    /***
     * Restituisce l'elenco delle veicoliinincidenti
     * @return VeicoloInIncidente|array:VeicoloInIncidente un array di oggetti VeicoloInIncidente
     */
    public static function getElencoVeicoliInIncidenti() {
        try {
            $conn = Connection::getConnection();
            $sql = "SELECT * FROM veicoliinincidenti";
            $stm = $conn->query($sql);
            $VveicoloInIncidente = array();

            while ($riga = $stm->fetch(PDO::FETCH_ASSOC)) {

                $idVeicoloInIncidente = $riga['idVeicoloInIncidente'];
                $idVeicolo = $riga['idVeicolo'];
                $idIncidente = $riga['idIncidente'];

                $veicoloInIncidente = new VeicoloInIncidente($idVeicoloInIncidente, $idVeicolo, $idIncidente);
                array_push($VveicoloInIncidente, $veicoloInIncidente);
            }

        } catch (PDOException $e) {
            throw $e;
        }
        return $VveicoloInIncidente;
    }

    /***
     * Aggiungi un oggetto VeicoloInIncidente passato come parametro
     * L'id del VeicoloInIncidente passato non importa perché non verrà utilizzato
     * @param VeicoloInIncidente $VeicoloInIncidente
     * @return string
     */
    public static function aggiungiVeicoloInIncidente(VeicoloInIncidente $veicoloInIncidente) {
        $idVeicolo = $veicoloInIncidente->getIdVeicolo();
        $idIncidente = $veicoloInIncidente->getIdIncidente();

        $sql = "INSERT INTO veicoliinincidenti(idVeicolo, idIncidente)
                VALUES (:idVeicolo, :idIncidente)";

        // Select per verificare se l'VeicoloInIncidente che si vuole inserire già esiste
        $sqlVer = "SELECT * FROM veicoliinincidenti WHERE idVeicolo = :idVeicolo AND idIncidente = :idIncidente";

        try {
            $conn = Connection::getConnection();
            $stm1 = $conn->prepare($sqlVer);
            $stm1->bindParam(':idVeicolo', $idVeicolo, PDO::PARAM_INT);
            $stm1->bindParam(':idIncidente', $idIncidente, PDO::PARAM_INT);
            $stm1->execute();

            //Fetch
            $riga = $stm1->fetch(PDO::FETCH_ASSOC);
            $idVeicoloVer = $riga['idVeicolo'];
            $idIncidenteVer = $riga['idIncidente'];

            if($idVeicoloVer != $idVeicolo && $idIncidenteVer != $idIncidente) {
                $stm = $conn->prepare($sql);
                $stm->bindParam(':idVeicolo', $idVeicolo, PDO::PARAM_INT);
                $stm->bindParam(':idIncidente', $idIncidente, PDO::PARAM_INT);
                $stm->execute();

                echo "Il VeicoloInIncidente è stato aggiunto con successo";
            } else {
                return "Attenzione! Il VeicoloInIncidente, non può essere aggiunto perché è già stato inserito!";
            }
        } catch (PDOException $e) {
            throw $e;
        }
    }

    /***
     * Aggiorna i campi di un oggetto VeicoloInIncidente passato come parametro
     * @param VeicoloInIncidente $VeicoloInIncidente
     * @return string
     */
    public static function aggiornaVeicoloInIncidente(VeicoloInIncidente $veicoloInIncidente) {
        $id = $veicoloInIncidente->getIdVeicoloInIncidente();
        $idVeicolo = $veicoloInIncidente->getIdVeicolo();
        $idIncidente = $veicoloInIncidente->getIdIncidente();

        try {
            $conn = Connection::getConnection();

            $sqlVer = "SELECT COUNT(*) FROM veicoliinincidenti WHERE idVeicoloInIncidente = :idVer";

            $stm1 = $conn->prepare($sqlVer);
            $stm1->bindParam(':idVer', $id, PDO::PARAM_INT);
            $stm1->execute();

            if ($stm1->fetchColumn() > 0) {

                $sql = "UPDATE veicoliinincidenti SET " .
                    "idVeicolo = :idVeicolo, " .
                    "idIncidente = :idIncidente " .
                    "WHERE idVeicoloInIncidente = :id";

                $stm = $conn->prepare($sql);
                $stm->bindParam(':idVeicolo', $idVeicolo, PDO::PARAM_INT);
                $stm->bindParam(':idIncidente', $idIncidente, PDO::PARAM_INT);
                $stm->bindParam(':id', $id, PDO::PARAM_INT);
                $stm->execute();

                return "Il VeicoloInIncidente, è stato aggiornato con successo!";

            } else {
                // Se l'VeicoloInIncidente non è stato inserito, arresto l'esecuzione e restituisco l'errore
                return "Attenzione! Il VeicoloInIncidente che stai cercando di aggiornare non esiste!";
            }
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public static function cancellaVeicoloInIncidente(int $id){
        $conn = Connection::getConnection();

        try {
            $sqlVer = "SELECT * FROM veicoliinincidenti WHERE idVeicoloInIncidente = :idVer";

            $stm = $conn->prepare($sqlVer);
            $stm->bindParam(':idVer', $id, PDO::PARAM_INT);
            $stm->execute();

            if (!$riga = $stm->fetch(PDO::FETCH_ASSOC)) {
                // Se l'VeicoloInIncidente non è stata inserita arresto l'esecuzione e restituisco l'errore
                return "Attenzione! Il VeicoloInIncidente che stai cercando di eliminare non esiste!";
            } else {
                $sql = "DELETE FROM veicoliinincidenti WHERE idVeicoloInIncidente = :id";

                // Se l'VeicoloInIncidente è stato inserita procedo ad eliminarla
                $stm1 = $conn->prepare($sql);
                $stm1->bindParam(':id', $id, PDO::PARAM_INT);
                $stm1->execute();

                return "Il VeicoloInIncidente, è stato cancellato con successo";
            }

        }   catch(PDOException $e){
            throw $e;
        }
    }
}