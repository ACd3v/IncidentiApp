<?php
include_once __DIR__.'/classes/Connection.php';
include_once __DIR__.'/classes/Ruolo.php';
include_once __DIR__.'/classes/RuoloInfo.php';

class RuoloDAO {
    /***
     * Restituisce il Ruolo con l'id specificato
     * @param int $idRuolo
     * @return Ruolo|string
     */

    public static function getRuolo(int $idRuolo) {
        try {
            $conn = Connection::getConnection();
            $sql = "SELECT * FROM ruoli WHERE idRuolo = :id";
            $stm = $conn->prepare($sql);
            $stm->bindParam(':id', $idRuolo, PDO::PARAM_INT);
            $stm->execute();

            if (!$riga = $stm->fetch(PDO::FETCH_ASSOC)) {
                die("Attenzione! Ruolo inesistente");
            }

            $denominazione = $riga['denominazione'];
            $ferito = $riga['ferito'];
            $descrizione = $riga['descrizione'];
            $idPersona = $riga['idPersona'];
            $idIncidente = $riga['idIncidente'];

            $ruolo = new Ruolo($idRuolo, $denominazione, $ferito, $descrizione, $idPersona, $idIncidente);

        } catch (PDOException $e) {
            throw $e;
        }
        return $ruolo;
    }

    /***
     * Restituisce l'elenco dei ruoli
     * @return Ruolo|array:Ruolo un array di oggetti Ruolo
     */
    public static function getElencoRuoli() {
        try {
            $conn = Connection::getConnection();
            $sql = "SELECT * FROM ruoli";
            $stm = $conn->query($sql);
            $Vruolo = array();

            while ($riga = $stm->fetch(PDO::FETCH_ASSOC)) {

                $idRuolo = $riga['idRuolo'];
                $denominazione = $riga['denominazione'];
                $ferito = $riga['ferito'];
                $descrizione = $riga['descrizione'];
                $idPersona = $riga['idPersona'];
                $idIncidente = $riga['idIncidente'];

                $ruolo = new Ruolo($idRuolo, $denominazione, $ferito, $descrizione, $idPersona, $idIncidente);
                array_push($Vruolo, $ruolo);
            }

        } catch (PDOException $e) {
            throw $e;
        }
        return $Vruolo;
    }

    /***
     * Aggiungi un oggetto Ruolo passato come parametro
     * L'id del Ruolo passato non importa perché non verrà utilizzato
     * @param Ruolo $Ruolo
     * @return string
     */
    public static function aggiungiRuolo(Ruolo $ruolo) {
        $denominazione = $ruolo->getDenominazione();
        $ferito = $ruolo->getFerito();
        $descrizione = $ruolo->getDescrizione();
        $idPersona = $ruolo->getIdPersona();
        $idIncidente = $ruolo->getIdIncidente();

        $sql = "INSERT INTO ruoli(denominazione, ferito, descrizione, idPersona, idIncidente)
                VALUES (:denominazione, :ferito, :descrizione, :idPersona, :idIncidente)";

        // Select per verificare se il Ruolo che si vuole inserire già esiste
        $sqlVer = "SELECT * FROM ruoli WHERE denominazione = :denominazione";

        try {
            $conn = Connection::getConnection();
            $stm1 = $conn->prepare($sqlVer);
            $stm1->bindParam(':denominazione', $denominazione, PDO::PARAM_STR);
            $stm1->execute();

            //Fetch
            $riga = $stm1->fetch(PDO::FETCH_ASSOC);
            $denominazioneVer = $riga['denominazione'];

            if($denominazioneVer != $denominazione) {
                $stm = $conn->prepare($sql);
                $stm->bindParam(':denominazione', $denominazione, PDO::PARAM_STR);
                $stm->bindParam(':ferito', $ferito, PDO::PARAM_BOOL);
                $stm->bindParam(':descrizione', $descrizione, PDO::PARAM_STR);
                $stm->bindParam(':idPersona', $idPersona, PDO::PARAM_INT);
                $stm->bindParam(':idIncidente', $idIncidente, PDO::PARAM_INT);
                $stm->execute();

                echo "Il Ruolo $denominazione, aggiunto con successo";
            } else {
                return "Attenzione! Il Ruolo $denominazione, non può essere aggiunto perché è già stato inserito!";
            }
        } catch (PDOException $e) {
            throw $e;
        }
    }

    /***
     * Aggiorna i campi di un oggetto Ruolo passato come parametro
     * @param Ruolo $Ruolo
     * @return string
     */
    public static function aggiornaRuolo(Ruolo $ruolo) {
        $id = $ruolo->getIdRuolo();
        $denominazione = $ruolo->getDenominazione();
        $ferito = $ruolo->getFerito();
        $descrizione = $ruolo->getDescrizione();
        $idPersona = $ruolo->getIdPersona();
        $idIncidente = $ruolo->getidIncidente();

        try {
            $conn = Connection::getConnection();

            $sqlVer = "SELECT COUNT(*) FROM ruoli WHERE idRuolo = :idVer";

            $stm1 = $conn->prepare($sqlVer);
            $stm1->bindParam(':idVer', $id, PDO::PARAM_INT);
            $stm1->execute();

            // Mi assicuro che il ruolo che si vuole aggiornare sia presente nel db
            if ($stm1->fetchColumn() > 0) {

                $sql = "UPDATE ruoli SET " .
                    "denominazione = :denominazione, " .
                    "ferito = :ferito, " .
                    "descrizione = :descrizione, " .
                    "idPersona = :idPersona, " .
                    "idIncidente = :idIncidente " .
                    "WHERE idRuolo = :id";

                $stm = $conn->prepare($sql);
                $stm->bindParam(':denominazione', $denominazione, PDO::PARAM_STR);
                $stm->bindParam(':ferito', $ferito, PDO::PARAM_BOOL);
                $stm->bindParam(':descrizione', $descrizione, PDO::PARAM_STR);
                $stm->bindParam(':idPersona', $idPersona, PDO::PARAM_INT);
                $stm->bindParam(':idIncidente', $idIncidente, PDO::PARAM_INT);
                $stm->bindParam(':id', $id, PDO::PARAM_INT);
                $stm->execute();

                return "Il Ruolo $denominazione, è stato aggiornato con successo!";

            } else {
                // Se il Ruolo non è stato inserito, arresto l'esecuzione e restituisco l'errore
                return "Attenzione! Il Ruolo che stai cercando di aggiornare non esiste!";
            }
        } catch (PDOException $e) {
            throw $e;
        }
    }

    /***
     * Cancella il ruolo che corrisponde all'id passato come parametro
     * @param int $id
     * @return string
     */
    public static function cancellaRuolo(int $id){
        $conn = Connection::getConnection();

        try {
            $sqlVer = "SELECT * FROM ruoli WHERE idRuolo = :idVer";

            $stm = $conn->prepare($sqlVer);
            $stm->bindParam(':idVer', $id, PDO::PARAM_INT);
            $stm->execute();

            if (!$riga = $stm->fetch(PDO::FETCH_ASSOC)) {
                // Se il Ruolo non è stato inserito, arresto l'esecuzione e restituisco l'errore
                return "Attenzione! Il Ruolo che stai cercando di eliminare non esiste!";
            } else {
                $sql = "DELETE FROM ruoli WHERE idRuolo = :id";

                // Prelevo il denominazione del Ruolo per l'output
                $denominazione = $riga['denominazione'];

                // Se il Ruolo è stato inserito, procedo ad eliminarlo
                $stm1 = $conn->prepare($sql);
                $stm1->bindParam(':id', $id, PDO::PARAM_INT);
                $stm1->execute();

                return "Il Ruolo $denominazione, è stato cancellato con successo";
            }

        }   catch(PDOException $e){
            throw $e;
        }
    }

    public static function getElencoRuoliInfo(){
        try {
            $conn = Connection::getConnection();
            $sql = "SELECT p.nome, p.cognome, r.denominazione, i.descrizione FROM ruoli r, persone p, incidenti i WHERE r.idPersona = p.idPersona AND r.idIncidente = i.idIncidente";
            $stm = $conn->query($sql);
            $VruoloInfo = array();

            while ($riga = $stm->fetch(PDO::FETCH_ASSOC)) {
                $personaNome = $riga['nome'];
                $personaCognome = $riga['cognome'];
                $ruoloDenominazione = $riga['denominazione'];
                $incidenteDescrizione = $riga['descrizione'];

                $ruoloInfo = New RuoloInfo($personaNome, $personaCognome, $ruoloDenominazione, $incidenteDescrizione);

                array_push($VruoloInfo, $ruoloInfo);
            }

        } catch (PDOException $e) {
            throw $e;
        }
        return $VruoloInfo;
    }
}

