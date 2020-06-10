<?php
include_once __DIR__.'/classes/Connection.php';
include_once __DIR__.'/classes/Veicolo.php';

class VeicoloDAO {
    /***
     * Restituisce la Veicolo con l'id specificato
     * @param int $idVeicolo
     * @return Veicolo|string
     */

    public static function getVeicolo(int $idVeicolo) {
        try {
            $conn = Connection::getConnection();
            $sql = "SELECT * FROM veicoli WHERE idVeicolo = :id";
            $stm = $conn->prepare($sql);
            $stm->bindParam(':id', $idVeicolo, PDO::PARAM_INT);
            $stm->execute();

            if (!$riga = $stm->fetch(PDO::FETCH_ASSOC)) {
                return "Attenzione! Veicolo inesistente";
            }

            $marca = $riga['marca'];
            $tipo = $riga['tipo'];
            $targa = $riga['targa'];
            $idAssicurazione = $riga['idAssicurazione'];
            $idPersona = $riga['idPersona'];

            $veicolo = new Veicolo($idVeicolo, $marca, $tipo, $targa, $idAssicurazione, $idPersona);

        } catch (PDOException $e) {
            throw $e;
        }
        return $veicolo;
    }

    /***
     * Restituisce l'elenco delle veicoli
     * @return Veicolo|array:Veicolo un array di oggetti Veicolo
     */
    public static function getElencoVeicoli() {
        try {
            $conn = Connection::getConnection();
            $sql = "SELECT * FROM veicoli";
            $stm = $conn->query($sql);
            $Vveicolo = array();

            while ($riga = $stm->fetch(PDO::FETCH_ASSOC)) {

                $idVeicolo= $riga['idVeicolo'];
                $marca = $riga['marca'];
                $tipo = $riga['tipo'];
                $targa = $riga['targa'];
                $idAssicurazione = $riga['idAssicurazione'];
                $idPersona = $riga['idPersona'];

                $veicolo = new Veicolo($idVeicolo, $marca, $tipo, $targa, $idAssicurazione, $idPersona);
                array_push($Vveicolo, $veicolo);
            }

        } catch (PDOException $e) {
            throw $e;
        }
        return $Vveicolo;
    }

    /***
     * Aggiungi un oggetto veicolo passato come parametro
     * L'id del veicolo passato non importa perché non verrà utilizzato
     * @param Veicolo $veicolo
     * @return string
     */
    public static function aggiungiVeicolo(Veicolo $veicolo) {
        $idVeicolo = $veicolo->getIdVeicolo();
        $marca = $veicolo->getMarca();
        $tipo = $veicolo->getTipo();
        $targa = $veicolo->getTarga();
        $idAssicurazione = $veicolo->getIdAssicurazione();
        $idPersona = $veicolo->getIdPersona();

        $sql = "INSERT INTO veicoli(marca, tipo, targa, idAssicurazione, idPersona)
                VALUES (:marca, :tipo, :targa, :idAssicurazione, :idPersona)";

        // Select per verificare se l'veicolo che si vuole inserire già esiste
        $sqlVer = "SELECT * FROM veicoli WHERE targa = :targa";

        try {
            $conn = Connection::getConnection();
            $stm1 = $conn->prepare($sqlVer);
            $stm1->bindParam(':targa', $targa, PDO::PARAM_STR);
            $stm1->execute();

            //Fetch
            $riga = $stm1->fetch(PDO::FETCH_ASSOC);
            $targaVer = $riga['targa'];

            if($targaVer != $targa) {
                $stm = $conn->prepare($sql);
                $stm->bindParam(':marca', $marca, PDO::PARAM_STR);
                $stm->bindParam(':tipo', $tipo, PDO::PARAM_STR);
                $stm->bindParam(':targa', $targa, PDO::PARAM_STR);
                $stm->bindParam(':idAssicurazione', $idAssicurazione, PDO::PARAM_INT);
                $stm->bindParam(':idPersona', $idPersona, PDO::PARAM_INT);
                $stm->execute();

                echo "$marca, $tipo con targa:$targa, aggiunto con successo";
            } else {
                return "Attenzione! $marca, $tipo con targa:$targa, non può essere aggiunto perché è già stato inserito!";
            }
        } catch (PDOException $e) {
            throw $e;
        }
    }

    /***
     * Aggiorna i campi di un oggetto veicolo passato come parametro
     * @param Veicolo $veicolo
     * @return string
     */
    public static function aggiornaVeicolo(Veicolo $veicolo){
        $id = $veicolo->getIdVeicolo();
        $marca = $veicolo->getMarca();
        $tipo = $veicolo->getTipo();
        $targa = $veicolo->getTarga();
        $idAssicurazione = $veicolo->getIdAssicurazione();
        $idVeicolo = $veicolo->getIdVeicolo();

        try {
            $conn = Connection::getConnection();

            $sqlVer = "SELECT COUNT(*) FROM veicoli WHERE idVeicolo = :idVer";

            $stm1 = $conn->prepare($sqlVer);
            $stm1->bindParam(':idVer', $id, PDO::PARAM_INT);
            $stm1->execute();

            if ($stm1->fetchColumn() > 0) {

                $sql = "UPDATE veicoli SET " .
                    "marca = :marca, " .
                    "tipo = :tipo, " .
                    "targa = :targa, " .
                    "idAssicurazione = :idAssicurazione, " .
                    "idVeicolo = :idVeicolo " .
                    "WHERE idVeicolo = :id";

                $stm = $conn->prepare($sql);
                $stm->bindParam(':marca', $marca, PDO::PARAM_STR);
                $stm->bindParam(':tipo', $tipo, PDO::PARAM_STR);
                $stm->bindParam(':targa', $targa, PDO::PARAM_STR);
                $stm->bindParam(':idAssicurazione', $idAssicurazione, PDO::PARAM_STR);
                $stm->bindParam(':idVeicolo', $idVeicolo, PDO::PARAM_STR);
                $stm->bindParam(':id', $id, PDO::PARAM_INT);
                $stm->execute();

                return "La $marca, $tipo con targa:$targa, è stata aggiornata con successo!";

            } else {
                // Se l'veicolo non è stato inserito, arresto l'esecuzione e restituisco l'errore
                return "Attenzione! il veicolo che stai cercando di aggiornare non esiste!";
            }
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public static function cancellaVeicolo(int $id){
        $conn = Connection::getConnection();

        try {
            $sqlVer = "SELECT * FROM veicoli WHERE idVeicolo = :idVer";

            $stm = $conn->prepare($sqlVer);
            $stm->bindParam(':idVer', $id, PDO::PARAM_INT);
            $stm->execute();

            if (!$riga = $stm->fetch(PDO::FETCH_ASSOC)) {
                // Se l'Veicolo non è stata inserita arresto l'esecuzione e restituisco l'errore
                return "Attenzione! Il veicolo che stai cercando di eliminare non esiste!";
            } else {
                $sql = "DELETE FROM veicoli WHERE idVeicolo = :id";

                // Prelevo la nome dell'Veicolo per l'output
                $marca = $riga['marca'];
                $tipo = $riga['tipo'];
                $targa = $riga['targa'];

                // Se l'Veicolo è stato inserita procedo ad eliminarla
                $stm1 = $conn->prepare($sql);
                $stm1->bindParam(':id', $id, PDO::PARAM_INT);
                $stm1->execute();

                return "$marca,$tipo con id = $id e targa = $targa, è stato cancellato con successo";
            }

        }   catch(PDOException $e){
            throw $e;
        }
    }
}
