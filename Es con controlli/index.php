<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> -->
    <title>php-oop-dipendenti</title>
    <!-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> -->
    <style>
        
        body {  
            background-color: black;
            color: white;
            margin: 0 50px;
        }
    </style>
</head>
<body>
        <!-- added -->
        <!-- GOAL: sulla base dell'esercizio di ieri (vedi correzione qui su slack) aggiungere i seguenti vincoli di integrita':
        - nomi e cognomi devono essere di >3 caratteri
        - i livelli di sicurezza devono essere [1;5] per i dipendenti e [6;10] per i boss
        - ral employee [10.000;100.000]
        - non puo' esistere boss senza dipendenti
        Durante la fase di test, utilizzare il costrutto try-catch per gestire l'errore e informare l'utente -->
        <h2>
        

            <?php 
                
                class Person {
                    private $name;
                    private $lastname;
                    private $dateOfBirth;
                    protected $securyLvl;
                    public function __construct($name, $lastname, $dateOfBirth, $securyLvl) {
                        $this -> setName($name);
                        $this -> setLastname($lastname);
                        $this -> setDateOfBirth($dateOfBirth);
                        $this -> setSecuryLvl($securyLvl);
                    }
                    public function getName() {
                        return $this -> name;
                    }
                    public function setName($name) {                       
                        if (strlen($name) <= 3) {
                            $e = new NameLength('name min. length:  3 chars');
                            throw $e;
                        }
                        $this -> name = $name;
                    }
                    public function getLastname() {
                        return $this -> lastname;
                    }
                    public function setLastname($lastname) {
                        if (strlen($lastname) <= 3) {
                            $e = new LastNameLength('lastname min. length:  3 chars');
                            throw $e;
                        }
                        $this -> lastname = $lastname;
                    }
                    public function getFullname() {
                        return $this -> getName() . ' ' . $this -> getLastname();
                    }
                    public function getDateOfBirth() {
                        return $this -> dateOfBirth;
                    }
                    public function setDateOfBirth($dateOfBirth) {
                        $this -> dateOfBirth = $dateOfBirth;
                    }
                    public function getSecuryLvl() {
                        return $this -> securyLvl;
                    }
                    public function setSecuryLvl($securyLvl) {
                        $this -> securyLvl = $securyLvl;
                    }
                    public function __toString() {
                        return 
                            'name: ' . $this -> getName() . '<br>'
                            . 'lastname: ' . $this -> getLastname() . '<br>'
                            . 'dateOfBirth: ' . $this -> getDateOfBirth() . '<br>'
                            . 'securyLvl: ' . $this -> getSecuryLvl() . '<br>';
                    }
                }


                // VERSIONE 1
                class Employee extends Person {
                    protected $ral;
                    private $mainTask;
                    private $idCode;
                    private $dateOfHiring;
                    public function __construct($name, $lastname, $dateOfBirth, $securyLvl,
                                                $ral, $mainTask, $idCode, $dateOfHiring) {
                        parent::__construct($name, $lastname, $dateOfBirth, $securyLvl);
                        $this -> setRal($ral);
                        $this -> setMainTask($mainTask);
                        $this -> setIdCode($idCode);
                        $this -> setDateOfHiring($dateOfHiring);
                    }

                    //METODS
                    public function getRal() {
                        return $this -> $ral;
                    }
                    public function setRal($ral) {
                        $this -> ral = $ral;
                    }
                    public function getMainTask() {
                        return $this -> $mainTask;
                    }
                    public function setMainTask($mainTask) {
                        $this -> mainTask = $mainTask;
                    }
                    public function getIdCode() {
                        return $this -> $idCode;
                    }
                    public function setIdCode($idCode) {
                        $this -> idCode = $idCode;
                    }
                    public function getDateOfHiring() {
                        return $this -> $dateOfHiring;
                    }
                    public function setDateOfHiring($dateOfHiring) {
                        $this -> dateOfHiring = $dateOfHiring;
                    }
                    //securyLvl
                    public function setSecuryLvl($securyLvl) {
                        if ($securyLvl < 1 || $securyLvl > 6) {
                            $e = new SecuryLevel('security level : from 1 to 5');
                            throw $e;
                        }
                        $this -> securyLvl = $securyLvl;
                    }
                    //toString
                    public function __toString() {
                        return parent::__toString() . '<br>'
                            . 'ral: ' . $this -> ral . '<br>'
                            . 'mainTask: ' . $this -> mainTask . '<br>'
                            . 'idCode: ' . $this -> idCode . '<br>'
                            . 'dateOfHiring: ' . $this -> dateOfHiring . '<br>';
                    }
                    
                }


                class Boss extends Employee {
                    private $profit;
                    private $vacancy;
                    private $sector;
                    private $employees;
                    public function __construct($name, $lastname, $dateOfBirth, $securyLvl,
                                                $ral, $mainTask, $idCode, $dateOfHiring,
                                                $profit, $vacancy, $sector, $employees = []) {
                        parent::__construct($name, $lastname, $dateOfBirth, $securyLvl,
                                            $ral, $mainTask, $idCode, $dateOfHiring);
                        $this -> setProfit($profit);
                        $this -> setVacancy($vacancy);
                        $this -> setSector($sector);
                        $this -> setEmployees($employees);
                    }

                    //METODS
                    public function getProfit() {
                        return $this -> profit;
                    }
                    public function setProfit($profit) {
                        $this -> profit = $profit;
                    }
                    public function getVacancy() {
                        return $this -> vacancy;
                    }
                    public function setVacancy($vacancy) {
                        $this -> vacancy = $vacancy;
                    }
                    public function getSector() {
                        return $this -> sector;
                    }
                    public function setSector($sector) {
                        $this -> sector = $sector;
                    }
                    public function getEmployees() {
                        return $this -> employees;
                    }
                    public function setEmployees($employees) {
                        $this -> employees = $employees;
                    }
                    //securyLvl
                    public function setSecuryLvl($securyLvl) {
                        if ($securyLvl < 6 || $securyLvl > 10) {
                            $e = new SecuryLevel('security level : from 1 to 5');
                            throw $e;
                        }
                        $this -> securyLvl = $securyLvl;
                    }
                    //check Ral value
                    public function checkRalValue($ral) {
                        if ($ral < 10.000 || $ral > 100.000) {
                            $e = new CheckRal('ERROR: WRONG RAL VALUE');
                            throw $e;
                        }
                        $this -> ral = $ral;
                    }

                    //toString
                    public function __toString() {
                        return parent::__toString() . '<br>'
                                . 'profit: ' . $this -> getProfit() . '<br>'
                                . 'vacancy: ' . $this -> getVacancy() . '<br>'
                                . 'sector: ' . $this -> getSector() . '<br>'
                                . 'employees:<br>' . $this -> getEmpsStr() . '<br>';
                    }

                    
                }

                //eccezioni
                class NameLength extends Exception {}
                class LastnameLength extends Exception {}

                class SecuryLevel extends Exception {}
                class CheckRal extends Exception {}
                





                //CONTROLLO NOME/COGNOME
                try {
                    $p1 = new Person(
                        'Federico',
                        'Barretta',
                        '19/03/2000',
                        'null',
                    );                    
                } catch (NameLength | LastNameLength $n) {
                    echo "ERROR: NAME/LASTNAME REQUIRES AT LEAST 4 CHARACTERS.<br>";                   
                }

                try {
                    $e1 = new Employee(
                        'Mario',
                        '(e)lastname',
                        '(e)dateOfBirth',
                        '1',
                        '(e)ral',
                        '(e)mainTask',
                        '(e)idCode',
                        '(e)dateOfHiring',
                    );
                    $b1 = new Boss(
                        'Piero',
                        '(b)lastname',
                        '(b)dateOfBirth',
                        '6',
                        '999',
                        '(b)mainTask',
                        '(b)idCode',
                        '(b)dateOfHiring',
                        '(b)profit', 
                        '(b)vacancy', 
                        '(b)sector', 
                        [
                            $e1,
                            $e1,
                            $e1,
                            $e1,
                        ]
                    );
                } catch (SecuryLevel $e) {
                    echo "ERROR: SECURITY LEVEL EMPLOYEE/BOSS WRONG.<br>";   
                } catch (CheckRal $b) {
                    echo "ERROR: WRONG RAL VALUE";
                }





                echo '<br>person1:<br>' . $p1 . '<br><br>';
                echo '<br>employee1:<br>' . $e1 . '<br><br>';
                echo '<br>boss1:<br>' . $b1 . '<br><br>';
                
            ?>



        </h2>
     


<script src="script.js"></script>

</body>
</html>


