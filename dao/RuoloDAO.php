<?php
include_once __DIR__.'/classes/Connection.php';
include_once __DIR__.'/classes/Ruolo.php';

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

            $nome = $riga['nome'];
            $descrizione = $riga['descrizione'];
            $idPersona = $riga['idPersona'];
            $idIncidente = $riga['idIncidente'];

            $ruolo = new Ruolo($idRuolo, $nome, $descrizione, $idPersona, $idIncidente);

        } catch (PDOException $e) {
            throw $e;
        }
        return $ruolo;
    }

    /***
     * Restituisce l'elenco delle ruoli
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
                $nome = $riga['nome'];
                $descrizione = $riga['descrizione'];
                $idPersona = $riga['idPersona'];
                $idIncidente = $riga['idIncidente'];

                $ruolo = new Ruolo($idRuolo, $nome, $descrizione, $idPersona, $idIncidente);
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
        $nome = $ruolo->getNome();
        $descrizione = $ruolo->getDescrizione();
        $idPersona = $ruolo->getIdPersona();
        $idIncidente = $ruolo->getIdIncidente();

        $sql = "INSERT INTO ruoli(nome, descrizione, idPersona, idIncidente)
                VALUES (:nome, :descrizione, :idPersona, :idIncidente)";

        // Select per verificare se l'Ruolo che si vuole inserire già esiste
        $sqlVer = "SELECT * FROM ruoli WHERE nome = :nome";

        try {
            $conn = Connection::getConnection();
            $stm1 = $conn->prepare($sqlVer);
            $stm1->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stm1->execute();

            //Fetch
            $riga = $stm1->fetch(PDO::FETCH_ASSOC);
            $nomeVer = $riga['nome'];

            if($nomeVer != $nome) {
                $stm = $conn->prepare($sql);
                $stm->bindParam(':nome', $nome, PDO::PARAM_STR);
                $stm->bindParam(':descrizione', $descrizione, PDO::PARAM_STR);
                $stm->bindParam(':idPersona', $idPersona, PDO::PARAM_INT);
                $stm->bindParam(':idIncidente', $idIncidente, PDO::PARAM_INT);
                $stm->execute();

                echo "Il Ruolo $nome, aggiunta con successo";
            } else {
                return "Attenzione! Il Ruolo $nome, non può essere aggiunto perché è già stato inserito!";
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
        $nome = $ruolo->getNome();
        $descrizione = $ruolo->getDescrizione();
        $idPersona = $ruolo->getIdPersona();
        $idIncidente = $ruolo->getidIncidente();

        try {
            $conn = Connection::getConnection();

            $sqlVer = "SELECT COUNT(*) FROM ruoli WHERE idRuolo = :idVer";

            $stm1 = $conn->prepare($sqlVer);
            $stm1->bindParam(':idVer', $id, PDO::PARAM_INT);
            $stm1->execute();

            if ($stm1->fetchColumn() > 0) {

                $sql = "UPDATE ruoli SET " .
                    "nome = :nome, " .
                    "descrizione = :descrizione, " .
                    "idPersona = :idPersona, " .
                    "idIncidente = :idIncidente " .
                    "WHERE idRuolo = :id";

                $stm = $conn->prepare($sql);
                $stm->bindParam(':nome', $nome, PDO::PARAM_STR);
                $stm->bindParam(':descrizione', $descrizione, PDO::PARAM_STR);
                $stm->bindParam(':idPersona', $idPersona, PDO::PARAM_INT);
                $stm->bindParam(':idIncidente', $idIncidente, PDO::PARAM_INT);
                $stm->bindParam(':id', $id, PDO::PARAM_INT);
                $stm->execute();

                return "Il Ruolo $nome, è stata aggiornato con successo!";

            } else {
                // Se l'Ruolo non è stato inserito, arresto l'esecuzione e restituisco l'errore
                return "Attenzione! Il Ruolo che stai cercando di aggiornare non esiste!";
            }
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public static function cancellaRuolo(int $id){
        $conn = Connection::getConnection();

        try {
            $sqlVer = "SELECT * FROM ruoli WHERE idRuolo = :idVer";

            $stm = $conn->prepare($sqlVer);
            $stm->bindParam(':idVer', $id, PDO::PARAM_INT);
            $stm->execute();

            if (!$riga = $stm->fetch(PDO::FETCH_ASSOC)) {
                // Se l'Ruolo non è stata inserita arresto l'esecuzione e restituisco l'errore
                return "Attenzione! Il Ruolo che stai cercando di eliminare non esiste!";
            } else {
                $sql = "DELETE FROM ruoli WHERE idRuolo = :id";

                // Prelevo il nome dell'Ruolo per l'output
                $nome = $riga['nome'];

                // Se l'Ruolo è stato inserita procedo ad eliminarla
                $stm1 = $conn->prepare($sql);
                $stm1->bindParam(':id', $id, PDO::PARAM_INT);
                $stm1->execute();

                return "Il Ruolo $nome, è stato cancellato con successo";
            }

        }   catch(PDOException $e){
            throw $e;
        }
    }
}