<?php 
    session_start();
    function controllaPassword($nome_utente, $password_utente){
        include '../connessione.php';

        $conn = new mysqli($hostname, $username, $password, $dbname);
        if ($conn->connect_error) {
            echo "Connessione fallita: " . die($conn->connect_error);
        }

        $password_criptata = password_hash($password_utente, PASSWORD_DEFAULT);
        $sql = "SELECT utente.id, utente.nome, utente.cognome, ruolo.id FROM utente INNER JOIN ruolo ON utente.id = ruolo.id INNER JOIN credenziali ON utente.id = credenziali.id_utente WHERE nome_utente = ? AND password_utente = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $nome_utente, $password_criptata);
        $stmt->execute();
        $result = $stmt->get_result();

        $conn->close();

        if ($result->num_rows > 0) {
            while($ut = $result->fetch_assoc()){
                $_SESSION["ID_UTENTE"] = $ut["utente.id"];
                $_SESSION["NOME_COGNOME"] = $ut["utente.nome"] . ' ' . $ut["utente.cognome"];
                $_SESSION["RUOLO"] = $ut["ruolo.id"];
                return true;
            }
        } else {
            return null;
        }
    }

?>