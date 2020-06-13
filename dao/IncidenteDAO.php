<?php
include_once __DIR__.'/classes/Connection.php';
include_once __DIR__.'/classes/Incidente.php';

class IncidenteDAO {
    /***
     * Restituisce il Incidente con l'id specificato
     * @param int $idIncidente
     * @return Incidente|string
     */

    public static function getIncidente(int $idIncidente) {
        try {
            $conn = Connection::getConnection();
            $sql = "SELECT * FROM incidenti WHERE idIncidente = :id";
            $stm = $conn->prepare($sql);
            $stm->bindParam(':id', $idIncidente, PDO::PARAM_INT);
            $stm->execute();

            if (!$riga = $stm->fetch(PDO::FETCH_ASSOC)) {
                return "Attenzione! Incidente inesistente";
            }

            $descrizione = $riga['descrizione'];
            $longitudine = $riga['longitudine'];
            $latitudine = $riga['latitudine'];
            $data = $riga['data'];
            $ora = $riga['ora'];
            $pathFoto = $riga['pathFoto'];

            $incidente = new Incidente($idIncidente, $descrizione, $longitudine, $latitudine, $data, $ora, $pathFoto);

        } catch (PDOException $e) {
            throw $e;
        }
        return $incidente;
    }

    /***
     * Restituisce l'elenco delle incidenti
     * @return Incidente|array:Incidente un array di oggetti Incidente
     */
    public static function getElencoIncidenti() {
        try {
            $conn = Connection::getConnection();
            $sql = "SELECT * FROM incidenti";
            $stm = $conn->query($sql);
            $Vincidente = array();

            while ($riga = $stm->fetch(PDO::FETCH_ASSOC)) {

                $idIncidente = $riga['idIncidente'];
                $descrizione = $riga['descrizione'];
                $longitudine = $riga['longitudine'];
                $latitudine = $riga['latitudine'];
                $data = $riga['data'];
                $ora = $riga['ora'];
                $pathFoto = $riga['pathFoto'];

                $incidente = new Incidente($idIncidente, $descrizione, $longitudine, $latitudine, $data, $ora, $pathFoto);
                array_push($Vincidente, $incidente);
            }

        } catch (PDOException $e) {
            throw $e;
        }
        return $Vincidente;
    }

    /***
     * Aggiungi un oggetto Incidente passato come parametro
     * L'id del Incidente passato non importa perché non verrà utilizzato
     * @param Incidente $Incidente
     * @return string
     */
    public static function aggiungiIncidente(Incidente $incidente) {
        $descrizione = $incidente->getDescrizione();
        $longitudine = $incidente->getLongitudine();
        $latitudine = $incidente->getLatitudine();
        $data = $incidente->getData();
        $ora = $incidente->getOra();
        $pathFoto = $incidente->getPathFoto();

        $sql = "INSERT INTO incidenti(descrizione, longitudine, latitudine, data, ora , pathFoto)
                VALUES (:descrizione, :longitudine, :latitudine, :data, :ora , :pathFoto)";

        // Select per verificare se l'Incidente che si vuole inserire già esiste
        $sqlVer = "SELECT * FROM incidenti WHERE descrizione = :descrizione";

        try {
            $conn = Connection::getConnection();
            $stm1 = $conn->prepare($sqlVer);
            $stm1->bindParam(':descrizione', $descrizione, PDO::PARAM_STR);
            $stm1->execute();

            //Fetch
            $riga = $stm1->fetch(PDO::FETCH_ASSOC);
            $descrizioneVer = $riga['descrizione'];

            if($descrizioneVer != $descrizione) {
                $stm = $conn->prepare($sql);
                $stm->bindParam(':descrizione', $descrizione, PDO::PARAM_STR);
                $stm->bindParam(':longitudine', $longitudine, PDO::PARAM_STR);
                $stm->bindParam(':latitudine', $latitudine, PDO::PARAM_STR);
                $stm->bindParam(':data', $data, PDO::PARAM_STR);
                $stm->bindParam(':ora', $ora, PDO::PARAM_STR);
                $stm->bindParam(':pathFoto', $pathFoto, PDO::PARAM_STR);
                $stm->execute();

                echo "L'Incidente $descrizione, aggiunta con successo";
            } else {
                return "Attenzione! L'Incidente $descrizione, non può essere aggiunto perché è già stato inserito!";
            }
        } catch (PDOException $e) {
            throw $e;
        }
    }

    /***
     * Aggiorna i campi di un oggetto Incidente passato come parametro
     * @param Incidente $Incidente
     * @return string
     */
    public static function aggiornaIncidente(Incidente $incidente){
        $id = $incidente->getIdIncidente();
        $descrizione = $incidente->getDescrizione();
        $longitudine = $incidente->getLongitudine();
        $latitudine = $incidente->getLatitudine();
        $data = $incidente->getData();
        $ora = $incidente->getOra();
        $pathFoto = $incidente->getPathFoto();

        try {
            $conn = Connection::getConnection();

            $sqlVer = "SELECT COUNT(*) FROM incidenti WHERE idIncidente = :idVer";

            $stm1 = $conn->prepare($sqlVer);
            $stm1->bindParam(':idVer', $id, PDO::PARAM_INT);
            $stm1->execute();

            if ($stm1->fetchColumn() > 0) {

                $sql = "UPDATE incidenti SET " .
                    "descrizione = :descrizione, " .
                    "longitudine = :longitudine, " .
                    "latitudine = :latitudine, " .
                    "data = :data, " .
                    "ora = :ora, " .
                    "pathFoto = :pathFoto " .
                    "WHERE idIncidente = :id";

                $stm = $conn->prepare($sql);
                $stm->bindParam(':descrizione', $descrizione, PDO::PARAM_STR);
                $stm->bindParam(':longitudine', $longitudine, PDO::PARAM_STR);
                $stm->bindParam(':latitudine', $latitudine, PDO::PARAM_STR);
                $stm->bindParam(':data', $data, PDO::PARAM_STR);
                $stm->bindParam(':ora', $ora, PDO::PARAM_STR);
                $stm->bindParam(':pathFoto', $pathFoto, PDO::PARAM_STR);
                $stm->bindParam(':id', $id, PDO::PARAM_INT);
                $stm->execute();

                return "L'Incidente $descrizione, è stata aggiornato con successo!";

            } else {
                // Se l'Incidente non è stato inserito, arresto l'esecuzione e restituisco l'errore
                return "Attenzione! L'Incidente che stai cercando di aggiornare non esiste!";
            }
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public static function cancellaIncidente(int $id){
        $conn = Connection::getConnection();

        try {
            $sqlVer = "SELECT * FROM incidenti WHERE idIncidente = :idVer";

            $stm = $conn->prepare($sqlVer);
            $stm->bindParam(':idVer', $id, PDO::PARAM_INT);
            $stm->execute();

            if (!$riga = $stm->fetch(PDO::FETCH_ASSOC)) {
                // Se l'Incidente non è stata inserita arresto l'esecuzione e restituisco l'errore
                return "Attenzione! L'Incidente che stai cercando di eliminare non esiste!";
            } else {
                $sql = "DELETE FROM incidenti WHERE idIncidente = :id";

                // Prelevo la descrizione dell'Incidente per l'output
                $descrizione = $riga['descrizione'];

                // Se l'Incidente è stato inserita procedo ad eliminarla
                $stm1 = $conn->prepare($sql);
                $stm1->bindParam(':id', $id, PDO::PARAM_INT);
                $stm1->execute();

                return "L'Incidente $descrizione, è stato cancellato con successo";
            }

        }   catch(PDOException $e){
            throw $e;
        }
    }

    public static function totIncidenti(){
        $conn = Connection::getConnection();

        try {
            $sql = "SELECT COUNT(*) FROM incidenti";

            $stm1 = $conn->prepare($sql);
            $stm1->execute();
            $number_of_rows = $stm1->fetchColumn();

            return $number_of_rows;
        }   catch(PDOException $e){
            throw $e;
        }
    }
}