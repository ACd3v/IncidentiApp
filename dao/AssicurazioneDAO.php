<?php
include_once __DIR__.'/classes/Connection.php';
include_once __DIR__.'/classes/Assicurazione.php';

class AssicurazioneDAO {
    /***
     * Restituisce l'Assicurazione con l'id specificato
     * @param int $idAssicurazione
     * @return Assicurazione|string
     */

    public static function getAssicurazione(int $idAssicurazione) {
        try {
            $conn = Connection::getConnection();
            $sql = "SELECT * FROM assicurazioni WHERE idAssicurazione = :id";
            $stm = $conn->prepare($sql);
            $stm->bindParam(':id', $idAssicurazione, PDO::PARAM_INT);
            $stm->execute();

            if (!$riga = $stm->fetch(PDO::FETCH_ASSOC)) {
                return "Attenzione! Assicurazione inesistente";
            }

            $denominazione = $riga['denominazione'];
            $validita = $riga['validita'];
            $indirizzo = $riga['indirizzo'];
            $telefono = $riga['telefono'];
            $email = $riga['email'];

            $assicurazione = new Assicurazione($idAssicurazione, $denominazione, $validita, $indirizzo, $telefono, $email);

        } catch (PDOException $e) {
            throw $e;
        }
        return $assicurazione;
    }

    /***
     * Restituisce l'elenco delle assicurazioni
     * @return Assicurazione|array:Assicurazione un array di oggetti Assicurazione
     */
    public static function getElencoAssicurazioni() {
        try {
            $conn = Connection::getConnection();
            $sql = "SELECT * FROM assicurazioni";
            $stm = $conn->query($sql);
            $Vassicurazione = array();

            while ($riga = $stm->fetch(PDO::FETCH_ASSOC)) {

                $idAssicurazione= $riga['idAssicurazione'];
                $denominazione = $riga['denominazione'];
                $validita = $riga['validita'];
                $indirizzo = $riga['indirizzo'];
                $telefono = $riga['telefono'];
                $email = $riga['email'];

                $assicurazione = new Assicurazione($idAssicurazione, $denominazione, $validita, $indirizzo, $telefono, $email);
                array_push($Vassicurazione, $assicurazione);
            }

        } catch (PDOException $e) {
            throw $e;
        }
        return $Vassicurazione;
    }

    /***
     * Aggiungi un oggetto assicurazione passato come parametro
     * L'id del assicurazione passato non importa perché non verrà utilizzato
     * @param Assicurazione $assicurazione
     * @return string
     */
    public static function aggiungiAssicurazione(Assicurazione $assicurazione) {
        $denominazione = $assicurazione->getDenominazione();
        $validita = $assicurazione->getValidita();
        $indirizzo = $assicurazione->getIndirizzo();
        $telefono = $assicurazione->getTelefono();
        $email = $assicurazione->getEmail();

        $sql = "INSERT INTO assicurazioni(denominazione, validita, indirizzo, telefono, email)
                VALUES (:denominazione, :validita, :indirizzo, :telefono, :email)";

        // Select per verificare se l'assicurazione che si vuole inserire già esiste
        $sqlVer = "SELECT * FROM assicurazioni WHERE denominazione=:denominazione";

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
            $stm->bindParam(':validita', $validita, PDO::PARAM_BOOL);
            $stm->bindParam(':indirizzo', $indirizzo, PDO::PARAM_STR);
            $stm->bindParam(':telefono', $telefono, PDO::PARAM_STR);
            $stm->bindParam(':email', $email, PDO::PARAM_STR);
            $stm->execute();

            echo "L'Assicurazione $denominazione, aggiunta con successo";
            } else {
                return "Attenzione! L'Assicurazione $denominazione, non può essere aggiunta perché è già stato inserita!";
            }
        } catch (PDOException $e) {
            throw $e;
        }
    }

    /***
     * Aggiorna i campi di un oggetto assicurazione passato come parametro
     * @param Assicurazione $assicurazione
     * @return string
     */
    public static function aggiornaAssicurazione(Assicurazione $assicurazione){
        $id = $assicurazione->getIdAssicurazione();
        $denominazione = $assicurazione->getDenominazione();
        $validita = $assicurazione->getValidita();
        $indirizzo = $assicurazione->getIndirizzo();
        $telefono = $assicurazione->getTelefono();
        $email = $assicurazione->getEmail();

        try {
            $conn = Connection::getConnection();

            $sqlVer = "SELECT COUNT(*) FROM assicurazioni WHERE idAssicurazione = :idVer";

            $stm1 = $conn->prepare($sqlVer);
            $stm1->bindParam(':idVer', $id, PDO::PARAM_INT);
            $stm1->execute();

            if ($stm1->fetchColumn() > 0) {

                $sql = "UPDATE assicurazioni SET " .
                    "denominazione = :denominazione, " .
                    "validita = :validita, " .
                    "indirizzo = :indirizzo, " .
                    "telefono = :telefono, " .
                    "email = :email " .
                    "WHERE idAssicurazione = :id";

                $stm = $conn->prepare($sql);
                $stm->bindParam(':denominazione', $denominazione, PDO::PARAM_STR);
                $stm->bindParam(':validita', $validita, PDO::PARAM_BOOL);
                $stm->bindParam(':indirizzo', $indirizzo, PDO::PARAM_STR);
                $stm->bindParam(':telefono', $telefono, PDO::PARAM_STR);
                $stm->bindParam(':email', $email, PDO::PARAM_STR);
                $stm->bindParam(':id', $id, PDO::PARAM_INT);
                $stm->execute();

                return "L'assicurazione $denominazione, è stata aggiornata con successo!";

            } else {
                // Se l'assicurazione non è stato inserita, arresto l'esecuzione e restituisco l'errore
                return "Attenzione! l'assicurazione che stai cercando di aggiornare non esiste!";
            }
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public static function cancellaAssicurazione(int $id){
        $conn = Connection::getConnection();

        try {
            $sqlVer = "SELECT * FROM assicurazioni WHERE idAssicurazione = :idVer";

            $stm = $conn->prepare($sqlVer);
            $stm->bindParam(':idVer', $id, PDO::PARAM_INT);
            $stm->execute();

            if (!$riga = $stm->fetch(PDO::FETCH_ASSOC)) {
                // Se l'Assicurazione non è stata inserita arresto l'esecuzione e restituisco l'errore
                return "Attenzione! L'assicurazione che stai cercando di eliminare non esiste!";
            } else {
                $sql = "DELETE FROM assicurazioni WHERE idAssicurazione = :id";

                // Prelevo la denominazione dell'Assicurazione per l'output
                $denominazione = $riga['denominazione'];

                // Se l'Assicurazione è stato inserita procedo ad eliminarla
                $stm1 = $conn->prepare($sql);
                $stm1->bindParam(':id', $id, PDO::PARAM_INT);
                $stm1->execute();

                return "L'assicurazione con id = $id e denominazione = $denominazione, è stato cancellata con successo";
            }

        }   catch(PDOException $e){
            throw $e;
        }
    }
}