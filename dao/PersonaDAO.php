<?php
include_once __DIR__.'/classes/Connection.php';
include_once __DIR__.'/classes/Persona.php';

class PersonaDAO {

    /***
     * Restituisce la Persona con l'id specificato
     * @param int $idPersona
     * @return Persona|string
     */

    public static function getPersona(int $idPersona) {
        try {
            $conn = Connection::getConnection();
            $sql = "SELECT * FROM persone WHERE idPersona = :id";
            $stm = $conn->prepare($sql);
            $stm->bindParam(':id', $idPersona, PDO::PARAM_INT);
            $stm->execute();

            if (!$riga = $stm->fetch(PDO::FETCH_ASSOC)) {
                return "Attenzione! Persona inesistente";
            }

            $nome = $riga['nome'];
            $cognome = $riga['cognome'];
            $dataNascita = $riga['dataNascita'];
            $codFiscale = $riga['codFiscale'];
            $indirizzo = $riga['indirizzo'];
            $cap = $riga['cap'];
            $stato = $riga['stato'];
            $telefono = $riga['telefono'];
            $numPatente = $riga['numPatente'];
            $catPatente = $riga['catPatente'];
            $ferito = $riga['ferito'];

            $persona = new Persona($idPersona, $nome, $cognome, $dataNascita, $codFiscale, $indirizzo, $cap, $stato, $telefono, $numPatente, $catPatente, $ferito);

        } catch (PDOException $e) {
            throw $e;
        }
        return $persona;
    }

    /***
     * Restituisce l'elenco delle persone
     * @return Persona|array:Persona un array di oggetti Persona
     */
    public static function getElencoPersone() {
        try {
            $conn = Connection::getConnection();
            $sql = "SELECT * FROM persone";
            $stm = $conn->query($sql);
            $Vpersona = array();

            while ($riga = $stm->fetch(PDO::FETCH_ASSOC)) {

                $idPersona= $riga['idPersona'];
                $nome = $riga['nome'];
                $cognome = $riga['cognome'];
                $dataNascita = $riga['dataNascita'];
                $codFiscale = $riga['codFiscale'];
                $indirizzo = $riga['indirizzo'];
                $cap = $riga['cap'];
                $stato = $riga['stato'];
                $telefono = $riga['telefono'];
                $numPatente = $riga['numPatente'];
                $catPatente = $riga['catPatente'];
                $ferito = $riga['ferito'];

                $persona = new Persona($idPersona, $nome, $cognome, $dataNascita, $codFiscale, $indirizzo, $cap, $stato, $telefono, $numPatente, $catPatente, $ferito);
                array_push($Vpersona, $persona);
            }

        } catch (PDOException $e) {
            throw $e;
        }
        return $Vpersona;
    }

    /***
     * Aggiungi un oggetto persona passato come parametro
     * L'id del persona passato non importa perché non verrà utilizzato
     * @param Persona $persona
     * @return string
     */
    public static function aggiungiPersona(Persona $persona) {
        $nome = $persona->getNome();
        $cognome = $persona->getCognome();
        $dataNascita = $persona->getDataNascita();
        $codFiscale = $persona->getCodFiscale();
        $indirizzo = $persona->getIndirizzo();
        $cap = $persona->getCap();
        $stato = $persona->getStato();
        $telefono = $persona->getTelefono();
        $numPatente = $persona->getNumPatente();
        $catPatente = $persona->getCatPatente();
        $ferito = $persona->getFerito();


        $sql = "INSERT INTO persone(nome, cognome, dataNascita, codFiscale, indirizzo, cap, stato, telefono, numPatente, catPatente, ferito)
                VALUES (:nome, :cognome, :dataNascita, :codFiscale, :indirizzo, :cap, :stato, :telefono, :numPatente, :catPatente, :ferito)";

        // Select per verificare se l'persona che si vuole inserire già esiste
        $sqlVer = "SELECT * FROM persone WHERE codFiscale = :codFiscale";

        try {
            $conn = Connection::getConnection();
            $stm1 = $conn->prepare($sqlVer);
            $stm1->bindParam(':codFiscale', $codFiscale, PDO::PARAM_STR);
            $stm1->execute();

            //Fetch
            $riga = $stm1->fetch(PDO::FETCH_ASSOC);
            $nomeVer = $riga['nome'];

            if($nomeVer != $nome) {
                $stm = $conn->prepare($sql);
                $stm->bindParam(':nome', $nome, PDO::PARAM_STR);
                $stm->bindParam(':cognome', $cognome, PDO::PARAM_STR);
                $stm->bindParam(':dataNascita', $dataNascita, PDO::PARAM_STR);
                $stm->bindParam(':codFiscale', $codFiscale, PDO::PARAM_STR);
                $stm->bindParam(':indirizzo', $indirizzo, PDO::PARAM_STR);
                $stm->bindParam(':cap', $cap, PDO::PARAM_STR);
                $stm->bindParam(':stato', $stato, PDO::PARAM_STR);
                $stm->bindParam(':telefono', $telefono, PDO::PARAM_STR);
                $stm->bindParam(':numPatente', $numPatente, PDO::PARAM_STR);
                $stm->bindParam(':catPatente', $catPatente, PDO::PARAM_STR_CHAR);
                $stm->bindParam(':ferito', $ferito, PDO::PARAM_BOOL);
                $stm->execute();

                echo "La Persona $nome, aggiunta con successo";
            } else {
                return "Attenzione! La Persona $nome, non può essere aggiunta perché è già stato inserita!";
            }
        } catch (PDOException $e) {
            throw $e;
        }
    }

    /***
     * Aggiorna i campi di un oggetto persona passato come parametro
     * @param Persona $persona
     * @return string
     */
    public static function aggiornaPersona(Persona $persona){
        $id = $persona->getIdPersona();
        $nome = $persona->getNome();
        $cognome = $persona->getCognome();
        $dataNascita = $persona->getDataNascita();
        $codFiscale = $persona->getCodFiscale();
        $indirizzo = $persona->getIndirizzo();
        $cap = $persona->getCap();
        $stato = $persona->getStato();
        $telefono = $persona->getTelefono();
        $numPatente = $persona->getNumPatente();
        $catPatente = $persona->getCatPatente();
        $ferito = $persona->getFerito();

        try {
            $conn = Connection::getConnection();

            $sqlVer = "SELECT COUNT(*) FROM persone WHERE idPersona = :idVer";

            $stm1 = $conn->prepare($sqlVer);
            $stm1->bindParam(':idVer', $id, PDO::PARAM_INT);
            $stm1->execute();

            if ($stm1->fetchColumn() > 0) {

                $sql = "UPDATE persone SET " .
                    "nome = :nome, " .
                    "cognome = :cognome, " .
                    "dataNascita = :dataNascita, " .
                    "codFiscale = :codFiscale, " .
                    "indirizzo = :indirizzo, " .
                    "cap = :cap, " .
                    "stato = :stato, " .
                    "telefono = :telefono, " .
                    "numPatente = :numPatente, " .
                    "catPatente = :catPatente, " .
                    "ferito = :ferito " .
                    "WHERE idPersona = :id";

                $stm = $conn->prepare($sql);
                $stm->bindParam(':nome', $nome, PDO::PARAM_STR);
                $stm->bindParam(':cognome', $cognome, PDO::PARAM_STR);
                $stm->bindParam(':dataNascita', $dataNascita, PDO::PARAM_STR);
                $stm->bindParam(':codFiscale', $codFiscale, PDO::PARAM_STR);
                $stm->bindParam(':indirizzo', $indirizzo, PDO::PARAM_STR);
                $stm->bindParam(':cap', $cap, PDO::PARAM_STR);
                $stm->bindParam(':stato', $stato, PDO::PARAM_STR);
                $stm->bindParam(':telefono', $telefono, PDO::PARAM_STR);
                $stm->bindParam(':numPatente', $numPatente, PDO::PARAM_STR);
                $stm->bindParam(':catPatente', $catPatente, PDO::PARAM_STR_CHAR);
                $stm->bindParam(':ferito', $ferito, PDO::PARAM_BOOL);
                $stm->bindParam(':id', $id, PDO::PARAM_INT);
                $stm->execute();

                return "La persona $nome, è stata aggiornata con successo!";

            } else {
                // Se l'persona non è stato inserita, arresto l'esecuzione e restituisco l'errore
                return "Attenzione! la persona che stai cercando di aggiornare non esiste!";
            }
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public static function cancellaPersona(int $id){
        $conn = Connection::getConnection();

        try {
            $sqlVer = "SELECT * FROM persone WHERE idPersona = :idVer";

            $stm = $conn->prepare($sqlVer);
            $stm->bindParam(':idVer', $id, PDO::PARAM_INT);
            $stm->execute();

            if (!$riga = $stm->fetch(PDO::FETCH_ASSOC)) {
                // Se l'Persona non è stata inserita arresto l'esecuzione e restituisco l'errore
                return "Attenzione! La persona che stai cercando di eliminare non esiste!";
            } else {
                $sql = "DELETE FROM persone WHERE idPersona = :id";

                // Prelevo la nome dell'Persona per l'output
                $nome = $riga['nome'];

                // Se l'Persona è stato inserita procedo ad eliminarla
                $stm1 = $conn->prepare($sql);
                $stm1->bindParam(':id', $id, PDO::PARAM_INT);
                $stm1->execute();

                return "La persona con id = $id e nome = $nome, è stato cancellata con successo";
            }

        }   catch(PDOException $e){
            throw $e;
        }
    }
}