
<?php
class Conexao {
    private $host = 'sql110.epizy.com';
    private $db_name = 'epiz_31812085_todo_list';
    private $user = 'epiz_31812085';
    private $pass = 'aMfOubRMzNo9';

    public function conectar() {
        try {

            $conexao = new PDO(
                "mysql:host=$this->host;dbname=$this->db_name",
                "$this->user",
                "$this->pass"
            );

            return $conexao;

        } catch (PDOException $e) {
            echo '<p>' . $e->getMessage() . '</p>';
        }
    }
}

?>